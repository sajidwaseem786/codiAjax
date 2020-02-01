<?php 
class testm extends CI_Model{
	
	function __construct(){
		
		
		
	}
	
	function testfun()
	{
		
 
   
		$result=$this->db->empty_table("test");
		if($result)
			echo "dell";
		else
			echo "not dell";
		exit;
		return $result;
	}
	
	
	











}

?>