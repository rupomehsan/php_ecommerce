<?php

$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');



?>


<?php 

class Cart{

	private $db;
	private $fm;

	 public function __construct(){


			$this->db = new Database();
			$this->fm = new Format();

	 }


	 public function addtocard($quantity,$id){

	 	     $quantity = $this->fm->validation($quantity);
	 	     $id        = $this->fm->validation($id);
         $quantity  = mysqli_real_escape_string($this->db->link, $quantity);
         $productid = mysqli_real_escape_string($this->db->link, $id);
         $sid       = session_id();

         $squery    =" select * from tbl_product where productid = '$productid'";
         $result    = $this->db->select($squery)->fetch_assoc();
         $productname = $result['productname'];
         $price     = $result['price'];
         $image     = $result['image'];

         $chquery = "select * from tbl_card where productid = '$productid' and sid = '$sid'";
         $getpro = $this->db->select($chquery);
         if ($getpro) {
         	$msg = "product already added !";
         	return $msg;
         }else{

         $query = "insert into tbl_card (sid,productid,productname,price,quantity,image) values ('$sid','$productid','$productname','$price','$quantity','$image')";

   	     $catinsert = $this->db->insert($query);
   	     if ($catinsert) {

   	       echo "<script>window.location = 'cart.php';</script>";

   	     }else{
   	      echo "<script>window.location = '404.php';</script>";
   	     }

       }





         /*
         echo "<pre>";
         print_r($result);
         echo "</pre>";
         */

	 }


    public function getcardproduct(){

    	$sid= session_id();
    	$query = "select * from tbl_card where sid = '$sid'";
    	$result = $this->db->select($query);
    	return $result;



    }


public function updatecardquantty($cardid,$quantity){

     $cardid    = $this->fm->validation($cardid);
      $quantity = $this->fm->validation($quantity);

      $cardid    = mysqli_real_escape_string($this->db->link, $cardid);
      $quantity  = mysqli_real_escape_string($this->db->link, $quantity);

      $query ="update tbl_card 
       
       set 
      quantity = '$quantity'
     

      where cardid = '$cardid';

      ";

     $update_row = $this->db->update($query);
        if ($update_row) {

         echo "<script>window.location = 'cart.php';</script>";
           
        }else{
           $msg = "<span style='color:red;font-size:16px;'>quantity update not successfuly </span>";
                return $msg;
        }

   }



  public function delproductbycard($deltid){

      $deltid = mysqli_real_escape_string($this->db->link, $deltid);
      $query = "delete  from  tbl_card where cardid='$deltid' ";
      $result = $this->db->delete($query);
      if ($result) {

            $msg = "<span style='color:green;font-size:16px;'>product delete successfuly </span>";
                 return $msg;
            
         }else{
            $msg = "<span style='color:red;font-size:16px;'>product delete not successfuly </span>";
                 return $msg;
         }



  }

  


public function checkcardtable(){

$sid= session_id();
$query = "select * from tbl_card where sid = '$sid'";
$result = $this->db->select($query);
return $result;


}


public function delcustomercard(){


  $sid= session_id();
  $query = "delete from tbl_card where sid = '$sid'";
  $result = $this->db->delete($query);
  return $result;

}

public function insertorder($cmrid){

    $sid= session_id();
    $query ="select * from tbl_card where sid = '$sid'";
    $getpro = $this->db->select($query);
    if ($getpro) {
        while($result= $getpro->fetch_assoc()){
        
        $productid= $result['productid'];
        $productname= $result['productname'];
        $quantity= $result['quantity'];
        $price= $result['price'] * $quantity;
        $image= $result['image'];


           $query = "insert into tbl_order (cmrid,productid,productname,price,quantity,image) values ('$cmrid','$productid','$productname','$price','$quantity','$image')";
           $catinsert = $this->db->insert($query);
             }
          }

    }


public function payableamount($cmrid){

  $query = "select price from tbl_order where cmrid = '$cmrid' and date = now() ";
  $result = $this->db->select($query);
  return $result;


}

public function getorderproduct($cmrid){

  $query = "select * from tbl_order where cmrid = '$cmrid' order by date desc ";
  $result = $this->db->select($query);
  return $result;


}

public function checkorder($cmrid){

$query = "select * from tbl_order where cmrid = '$cmrid'";
$result = $this->db->select($query);
return $result;

}

public function getallorderproduct(){

$query = "select * from tbl_order order by date desc";
$result = $this->db->select($query);
return $result;


}

public function productshifted($id,$date,$price){


    $id    = mysqli_real_escape_string($this->db->link,$id);
    $date    = mysqli_real_escape_string($this->db->link,$date);
    $price    = mysqli_real_escape_string($this->db->link,$price);

    $query = "update tbl_order set 
             
             status = '1'
             where cmrid='$id' and date='$date' and price ='$price' ";



    $update_row = $this->db->update($query);



     
    if ($update_row) {

      $msg = "<span style='color:green;font-size:16px;'>update successfuly </span>";
           return $msg;
      
    }else{
      $msg = "<span style='color:red;font-size:16px;'>update  not successfuly </span>";
           return $msg;
    }

}

public function delproductshifted($id,$time,$price){

    $id    = mysqli_real_escape_string($this->db->link,$id);
    $time    = mysqli_real_escape_string($this->db->link,$time);
    $price    = mysqli_real_escape_string($this->db->link,$price);

      $query = "delete  from  tbl_order where cmrid='$id' and date='$time' and price ='$price' ";
      $result = $this->db->delete($query);
      if ($result) {

            $msg = "<span style='color:green;font-size:16px;'>order delete successfuly </span>";
                 return $msg;
            
         }else{
            $msg = "<span style='color:red;font-size:16px;'>order delete not successfuly </span>";
                 return $msg;
         }
}


public function confrmproductshifted($id,$time,$price){


    $id    = mysqli_real_escape_string($this->db->link,$id);
    $time    = mysqli_real_escape_string($this->db->link,$time);
    $price    = mysqli_real_escape_string($this->db->link,$price);
     $query = "update tbl_order set 
             
             status = '2'
             where cmrid='$id' and date='$time' and price ='$price' ";



    $update_row = $this->db->update($query);



     
    if ($update_row) {

      $msg = "<span style='color:green;font-size:16px;'>update successfuly </span>";
           return $msg;
      
    }else{
      $msg = "<span style='color:red;font-size:16px;'>update  not successfuly </span>";
           return $msg;
    }


}






}