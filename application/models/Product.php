<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Model
{
function __construct()
{
	
	
$this->proTable="product";
$this->custTable="customers";
$this->ordTable="orders";
$this->ordItemsTable="order_item";
}
function get_rows($id='')
{
	
	$this->db->select("*");
	$this->db->from($this->proTable);
	$this->db->where('status','1');
	
	if($id)
	{
		$this->db->where('id',$id);
		$query=$this->db->get();
		$result=$query->row_array();
		
	}
	else
	{
		$this->db->order_by("name","asc");
		$query=$this->db->get();
		$result=$query->result_array();
		
		
	}
	
	
	return $result;
	
	
	
}
 function insertCustomer($custData)
 {
	 if(!array_key_exists("created",$custData))
	 {
		 
		$custData['created']=date("Y-m-d h:i:s"); 
	 }
	  if(!array_key_exists("modified",$custData))
	 {
		 
		$custData['modified']=date("Y-m-d h:i:s"); 
	 }
	 
	 $insert=$this->db->insert($this->custTable,$custData);
	 
	 if($insert)
		 return $this->db->insert_id();//give the value of pk of inserted data it can be writen ID,Id
	 else
		return false;
	 
 }
 function insert_Order($ordData)
 {
		 if(!array_key_exists("created",$ordData))
	 {
		 
		$ordData['created']=date("Y-m-d h:i:s"); 
	 }
	  if(!array_key_exists("modified",$ordData))
	 {
		 
		$ordData['modified']=date("Y-m-d h:i:s"); 
	 }

    $insert=$this->db->insert($this->ordTable,$ordData);
	
	if($insert)
		 return $this->db->insert_id();
	 else
		return false;
	 
 }
 
  function insertOrderItem($data=array())
  {
	  $insert=$this->db->insert_batch($this->ordItemsTable,$data);
	  
	  if($insert)
		 return $this->db->insert_id();
	 else
		return false;
	  
	  
  }








}











?>