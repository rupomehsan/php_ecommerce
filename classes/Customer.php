<?php

$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');



?>


<?php 

class Customer{

	private $db;
	private $fm;

	 public function __construct(){


			$this->db = new Database();
			$this->fm = new Format();

	 }



public function customerregtrasion($data){

	  $name = $this->fm->validation($data['name']);
      $city = $this->fm->validation($data['city']);
      $zip = $this->fm->validation($data['zip']);
      $email = $this->fm->validation($data['email']);
      $address = $this->fm->validation($data['address']);
      $country = $this->fm->validation($data['country']);
      $phone = $this->fm->validation($data['phone']);
      $password = $this->fm->validation($data['password']);


      $name = mysqli_real_escape_string($this->db->link, $data['name']);
      $city = mysqli_real_escape_string($this->db->link, $data['city']);
      $zip = mysqli_real_escape_string($this->db->link, $data['zip']);
      $email = mysqli_real_escape_string($this->db->link, $data['email']);
      $address = mysqli_real_escape_string($this->db->link, $data['address']);
      $country = mysqli_real_escape_string($this->db->link, $data['country']);
      $phone = mysqli_real_escape_string($this->db->link, $data['phone']);
      $password = mysqli_real_escape_string($this->db->link, md5($data['password']));

	  if ($name =="" || $city =="" || $zip =="" || $email =="" || $address =="" || $country == "" || $phone=="phone" || $password=="password") {
            
           $msg = "<span style='color:red;font-size:16px;'>field  must not be empty!!! </span>";
              return $msg;

           }

	       $mailquery = "select * from tbl_customer where email = '$email' limit 1";
	       $mailchk =$this->db->select($mailquery);
	       if ($mailchk != false) {
	         $msg = "<span style='color:red;font-size:16px;'>mail already exist  </span>";
	              return $msg;
	       
	       }else{

               $query ="insert into tbl_customer (name,address,city,country,zip,phone,email,password) 

               value ('$name','$address','$city','$country','$zip','$phone','$email','$password')";
               $insert_row = $this->db->insert($query);
                  if ($insert_row) {

                     $msg = "<span style='color:green;font-size:16px;'>Registrasion  success </span>";
                          return $msg;
                     
                  }else{
                     $msg = "<span style='color:red;font-size:16px;'>Registrasion  not success </span>";
                          return $msg;
                  }


             }
	 


           }


	public function customerlogin($data){

		$email = $this->fm->validation($data['email']);
		$password = $this->fm->validation($data['password']);

		$email = mysqli_real_escape_string($this->db->link, $data['email']);
        $password = mysqli_real_escape_string($this->db->link, md5($data['password']));
        if ($email =="" || $password=="password") {
            
           $msg = "<span style='color:red;font-size:16px;'>field  must not be empty!!! </span>";
              return $msg;

           }
            $query = "select * from tbl_customer where email = '$email' and password='$password'";
            $result = $this->db->select($query);
             if ($result != false) {
	            
	            $value = $result->fetch_assoc();
	            Session::set("cuslogin",true);
	            Session::set("cmrid",$value['id']);
	             Session::set("cmrname",$value['name']);
	           
                 echo "<script>window.location = 'cart.php';</script>";


	       
	                }else{
                     $msg = "<span style='color:red;font-size:16px;'>Email or password  not match </span>";
                          return $msg;
                  }


	}



public function getcustomerdata($id){

	$query = "select * from tbl_customer where id = '$id'";
     $result = $this->db->select($query);
     return $result;


}


public function customerupdate($data,$cmrid){

      $name = $this->fm->validation($data['name']);
      $city = $this->fm->validation($data['city']);
      $zip = $this->fm->validation($data['zip']);
      $email = $this->fm->validation($data['email']);
      $address = $this->fm->validation($data['address']);
      $country = $this->fm->validation($data['country']);
      $phone = $this->fm->validation($data['phone']);
     


      $name = mysqli_real_escape_string($this->db->link, $data['name']);
      $city = mysqli_real_escape_string($this->db->link, $data['city']);
      $zip = mysqli_real_escape_string($this->db->link, $data['zip']);
      $email = mysqli_real_escape_string($this->db->link, $data['email']);
      $address = mysqli_real_escape_string($this->db->link, $data['address']);
      $country = mysqli_real_escape_string($this->db->link, $data['country']);
      $phone = mysqli_real_escape_string($this->db->link, $data['phone']);
     

	  if ($name =="" || $city =="" || $zip =="" || $email =="" || $address =="" || $country == "" || $phone=="phone" ) {
            
           $msg = "<span style='color:red;font-size:16px;'>field  must not be empty!!! </span>";
              return $msg;

           }else{

				   	$query = "update tbl_customer set 
			             
			             name='$name',
			             address='$address',
			             city='$city',
			             country='$country',
			             zip='$zip',
			             phone='$phone',
			             email='$email'
			             

			             where id ='$cmrid' ";

					$update_row = $this->db->update($query);
					if ($update_row) {

						$msg = "<span style='color:green;font-size:16px;'>Customer data update  successfuly </span>";
			   		     return $msg;
						
					}else{
						$msg = "<span style='color:red;font-size:16px;'>Customer data update not successfully </span>";
			   		     return $msg;
					}
					
			   	}
	 

}














}