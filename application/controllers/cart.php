<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class cart extends CI_Controller
{
	
	public function __construct()
	{
		parent:: __construct();
		
		$this->load->library("cart");
		$this->load->model("Product");
		
	}

   function index()
   {
	   
	   $data=array();//declare empty array
	   
	   $data['cartItems']=$this->cart->contents();//add key and value in array
	   
	 
	   $this->load->view('cart/index',$data);
	   
	  
   }
   function updateItemQty()
   {
	   $update=0;
	   
	  $id=$this->input->get('rowid');
      $qty=$this->input->get('qty');
     
    if(!empty($id) && !empty($qty))
	{

     $data=array(
	 'rowid'=>$id,
	 'qty'=>$qty
	 
	 );

    $update=$this->cart->update($data);
	}
	   
	 if($update)
	 {
         echo "ok";
	 } 
	 else
		 echo "err";
   }

 function removeItem($id)
 {
	$this->cart->remove($id);
   
   redirect('cart/');   
	 
 }












}













?>