<?php 

  class testc extends CI_Controller{
	  
	function __construct(){
    
	parent::__construct();
	$this->load->model("testm");
     }
 
   function index()
   {
      $data["test_key"]=$this->testm->testfun();
       $this->load->view("testview",$data);
   }   
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  










  }

?>