<?php
defined('BASEPATH') OR exit('No direct script access allowed');

 class CheckOut extends CI_Controller{
	 
	 function __construct()
	 {
		 parent::__construct();
		 $this->load->library("form_validation");
		 $this->load->helper("form");
		 $this->load->library("cart");
		 $this->load->model("Product");
		 $this->controller='checkout';//give folder name
		 
	 }
   function index()
   {
	   if($this->cart->total_items()<=0)
	   {
		   
		   redirect ("Products");
	   }
	   else
	   {
		   $data['cartItems']=$this->cart->contents();
		   $this->load->view("checkout/index",$data);
	   }
	 
   }
   
    function send_order($custData)
	{
		
		 $insert=$this->Product->insertCustomer($custData);
		 
		 if($insert)
		 {
			 $order=$this->placeOrder($insert);
			 if($order)
			 {
				 
				$this->session->set_userdata('success_msg','Order Placed Successfully');
				$customer["cust"]=$custData;
				$customer["cust"]["id"]=$order;//we can add attribut/column in array like this(id)
				
				$this->load->view($this->controller.'/orderSuccess',$customer);
				$this->cart->destroy();
				
              		
		     }
			 else
			 {
				$data['error_msg']='Order Submission failed Please Try again!'; 
				 
			 }
		 }
		
	}

		 public function validate()
		 {
			  if($this->cart->total_items()<=0)
	   {
		   
		   redirect ("Products");
	   }
		
		 $this->form_validation->set_rules('name','Name','required');
		 $this->form_validation->set_rules('email','Email','required|valid_email');
		 $this->form_validation->set_rules('phone','Phone','required');
		 $this->form_validation->set_rules('address','Address','required');
		 
		 $custData= array(
		  'name' =>strip_tags($this->input->post('name')),
		 'email'=>strip_tags($this->input->post('email')),
		 'phone'=>strip_tags($this->input->post('phone')),
		 'address'=>strip_tags($this->input->post('address'))
		 );
		 if($this->form_validation->run()==true)
		 {
		$this->send_order($custData);
		 }
		 else
		 {
			 $data['cartItems']=$this->cart->contents();
			 $this->load->view($this->controller.'/index',$data);//folder k ander index.php
		  
		 }
		 
			 
		 
		 }




		 
   
      function placeOrder($custId)
   {
	   $ordData=array(
	   'customerId'=>$custId,
	   'grand_total'=>$this->cart->total()
	   );
	   $insertOrder=$this->Product->insert_Order($ordData);
	   if($insertOrder)
	   {
		   $cartItems=$this->cart->contents();
		   $ordItemData=array();
		   $i=0;
		   
		   foreach($cartItems as $item)//assign array from cart_contents to cart_items//cart_contents k zeor obj ka data cart_items k zeor obj agia
		   {
			$ordItemData[$i]['order_id']=$insertOrder;
			$ordItemData[$i]['product_id']=$item['id'];
			$ordItemData[$i]['quantity']=$item['qty'];
			$ordItemData[$i]['subtotal']=$item['subtotal'];
			$i++;
           			   
			}
			if(!empty($ordItemData))
			{
				$insertOrderItem=$this->Product->insertOrderItem($ordItemData);
				
				if($insertOrderItem)
				{
					
					
					return $insertOrder;
				
				}
			}
		   
		   
		   
	   }
	   return false;
   }


 }
 
	

?>