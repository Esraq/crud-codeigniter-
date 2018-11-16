<?php


  class Main_model extends CI_Model{
  
  
   function test_main(){
   
      echo "model class";
	  $this->load->model("main_model");
	  
   }
function insert_data($data){
	
	$this->load->database();
	$this->db->insert("tbl_user", $data);
	
}
function fetch_data(){
	
	
	$query=$this->db->get("tbl_user");
	
	return $query;
}
 function delete_data($first_name){
	 
	   $this->load->database();
	   $this->db->where("first_name", $first_name);
	   $this->db->delete("tbl_user");
	 
 }
  
  }
  
  ?>