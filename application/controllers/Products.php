<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller
{
	
	public function __construct()
	{
		parent:: __construct();
		
		$this->load->library("cart");
		$this->load->model("Product");
		
	}
	
  public function index()
	{
		$data=array();
		
		$data['products']=$this->Product->get_rows();
		
		$this->load->view("products/Index",$data);
		
	}
public function addToCart($id)
	{
		
		$product=$this->Product->get_rows($id);
		
		$data=array(
		
		'id'=>$product["id"],
		'qty'=>1,//add qty 1 for every single add_cart
		'price'=>$product['Price'],
		'name'=>$product['name'],
		'image'=>$product['image']
		);
		
		$this->cart->insert($data);//$product or $data dono insert ho skty hn $product ma tmam attributes thy lkn hma kam chahya tha is lya data array bnae
		
		
		redirect('cart/');
		
		
	}
	
  }

?>