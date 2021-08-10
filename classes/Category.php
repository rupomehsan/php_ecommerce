
<?php

$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');



?>

<?php 

class Category{

	private $db;
	private $fm;

 public function __construct(){


		$this->db = new Database();
		$this->fm = new Format();

 }


 public function catInsert($catName){

   	$catName = $this->fm->validation($catName);

   	$catName = mysqli_real_escape_string($this->db->link, $catName);
  

   	if (empty($catName)) {
   		
   		$msg ="<span style='color:red;font-size:16px;'>category name must not be empty!!! </span>";
   		return $msg;
   	}else{
   		$query = "insert into tbl_catagory (catName) values ('$catName')";
   	    $catinsert = $this->db->insert($query);
   	    if ($catinsert) {
   	    	$msg = "<span style='color:green;font-size:16px;'>category insert successfuly </span>";
   		     return $msg;
   	    }else{
   	    	$msg = "<span style='color:red;font-size:16px;'>category insert not successfuly </span>";
   		     return $msg;
   	    }

   	}
  }

public function getAllcat(){

	$query = "select * from  tbl_catagory order by catid desc ";
	$result = $this->db->select($query);
	return $result;

}

public function getCatById($id){

	$query = "select * from  tbl_catagory where catid='$id' ";
	$result = $this->db->select($query);
	return $result;

}

public function catUpdate($catName,$id){


	$catName = $this->fm->validation($catName);

   	$catName = mysqli_real_escape_string($this->db->link, $catName);
   	$id = mysqli_real_escape_string($this->db->link, $id);

   	if (empty($catName)) {
   		$msg = "<span style='color:red;font-size:16px;'>category name must not be empty!!! </span>";
   		return $msg;
   	}else{

	   	$query = "update tbl_catagory set 
             
             catname ='$catName'
             where catid ='$id' ";
		$update_row = $this->db->update($query);
		if ($update_row) {

			$msg = "<span style='color:green;font-size:16px;'>category insert successfuly </span>";
   		     return $msg;
			
		}else{
			$msg = "<span style='color:red;font-size:16px;'>category insert not successfuly </span>";
   		     return $msg;
		}
		
   	}

	

}



public function delcatbyid($id){
	$id = mysqli_real_escape_string($this->db->link, $id);
	$query = "delete  from  tbl_catagory where catid='$id' ";
	$result = $this->db->delete($query);
	if ($result) {

			$msg = "<span style='color:green;font-size:16px;'>category delete successfuly </span>";
   		     return $msg;
			
		}else{
			$msg = "<span style='color:red;font-size:16px;'>category delete not successfuly </span>";
   		     return $msg;
		}

   }









}

?>