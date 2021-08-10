<?php

$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');



?>



<?php 

class Brand{

	private $db;
	private $fm;

 public function __construct(){


		$this->db = new Database();
		$this->fm = new Format();

 }

public function barandInsert($brandName){

   	$brandName = $this->fm->validation($brandName);

   	$brandName = mysqli_real_escape_string($this->db->link, $brandName);
  

   	if (empty($brandName)) {
   		
   		$msg ="<span style='color:red;font-size:16px;'>Brand name must not be empty!!! </span>";
   		return $msg;
   	}else{
   		$query = "insert into tbl_brand (brandname) values ('$brandName')";
   	    $catinsert = $this->db->insert($query);
   	    if ($catinsert) {
   	    	$msg = "<span style='color:green;font-size:16px;'>Brand insert successfuly </span>";
   		     return $msg;
   	    }else{
   	    	$msg = "<span style='color:red;font-size:16px;'>Brand insert not successfuly </span>";
   		     return $msg;
   	    }

   	}
  }


public function getAllbrand(){

	$query = "select * from  tbl_brand order by brandid desc ";
	$result = $this->db->select($query);
	return $result;

}

public function getbrandById($id){

	$query = "select * from  tbl_brand where brandid='$id' ";
	$result = $this->db->select($query);
	return $result;

}

public function brandUpdate($brandName,$id){


	$brandName = $this->fm->validation($brandName);

   	$brandName = mysqli_real_escape_string($this->db->link, $brandName);
   	$id = mysqli_real_escape_string($this->db->link, $id);

   	if (empty($brandName)) {
   		$msg = "<span style='color:red;font-size:16px;'>Brnad name must not be empty!!! </span>";
   		return $msg;
   	}else{

	   	$query = "update tbl_brand set 
             
             brandname ='$brandName'
             where brandid ='$id' ";
		$update_row = $this->db->update($query);
		if ($update_row) {

			$msg = "<span style='color:green;font-size:16px;'>Brnad insert successfuly </span>";
   		     return $msg;
			
		}else{
			$msg = "<span style='color:red;font-size:16px;'>Brnad insert not successfuly </span>";
   		     return $msg;
		}
		
   	}

	

}



public function delbrandbyid($id){
	$id = mysqli_real_escape_string($this->db->link, $id);
	$query = "delete  from  tbl_brand where brandid='$id' ";
	$result = $this->db->delete($query);
	if ($result) {

			$msg = "<span style='color:green;font-size:16px;'>Brand delete successfuly </span>";
   		     return $msg;
			
		}else{
			$msg = "<span style='color:red;font-size:16px;'>Brand delete not successfuly </span>";
   		     return $msg;
		}

}





}
?>