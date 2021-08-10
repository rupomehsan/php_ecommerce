
<?php

$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');
?>



<?php 

class Product{

	private $db;
	private $fm;

 public function __construct(){


		$this->db = new Database();
		$this->fm = new Format();

 }

public function productInsert($data,$file){

   	 $productname = $this->fm->validation($data['productname']);
      $catid = $this->fm->validation($data['catid']);
      $brandid = $this->fm->validation($data['brandid']);
      $body = $this->fm->validation($data['body']);
      $price = $this->fm->validation($data['price']);
      $type = $this->fm->validation($data['type']);

    $productname = mysqli_real_escape_string($this->db->link, $data['productname']);
      $catid = mysqli_real_escape_string($this->db->link, $data['catid']);
      $body = mysqli_real_escape_string($this->db->link, $data['body']);
      $brandid = mysqli_real_escape_string($this->db->link, $data['brandid']);
      $price = mysqli_real_escape_string($this->db->link, $data['price']);
      $type = mysqli_real_escape_string($this->db->link, $data['type']);
  


          $permited  = array('jpg', 'jpeg', 'png', 'gif');
          $file_name = $file['image']['name'];
          $file_size = $file['image']['size'];
          $file_temp = $file['image']['tmp_name'];

          $div = explode('.', $file_name);
          $file_ext = strtolower(end($div));
          $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
          $uploaded_image = "uploads/".$unique_image;

          if ($productname =="" || $catid =="" || $body =="" || $brandid =="" || $price =="" || $type == "" || $file_name=="") {
            
           $msg = "<span style='color:red;font-size:16px;'>field  must not be empty!!! </span>";
              return $msg;

                   } elseif ($file_size >1048567) {
                 
                  $msg = "<span style='color:red;font-size:16px;'>Image Size should be less then 1MB! </span>";

                    return $msg;

                 } elseif (in_array($file_ext, $permited) === false) {
                  $msg = "<span style='color:red;font-size:16px;'>You can upload only:-"
                  .implode(', ', $permited)." </span>";
                  
                    return $msg;
                  

              }else{

               move_uploaded_file($file_temp, $uploaded_image);
               $query ="insert into tbl_product (productname,catid,brandid,body,price,image,type) 

               value ('$productname','$catid','$brandid','$body','$price','$uploaded_image','$type');

               ";
               $insert_row = $this->db->insert($query);
                  if ($insert_row) {

                     $msg = "<span style='color:green;font-size:16px;'>Product insert successfuly </span>";
                          return $msg;
                     
                  }else{
                     $msg = "<span style='color:red;font-size:16px;'>Product insert not successfuly </span>";
                          return $msg;
                  }


             }







  }


public function getAllproduct(){

	$query = "select   tbl_product.*, tbl_catagory.catname, tbl_brand.brandname

    from tbl_product 
    inner join tbl_catagory
    on tbl_product.catid = tbl_catagory.catid

    inner join tbl_brand
    on tbl_product.brandid = tbl_brand.brandid



    order by tbl_product.productid desc ";

	$result = $this->db->select($query);
	return $result;

   /*aliasis query
    $query = "select p.*, c.catname, b.brandname

    from tbl_product as p,tbl_catagory as c, tbl_brand as b
    where p.catid = c.catid and p.brandid= b.brandid

    order by p.productid desc ";*/

}

public function getprobyid($id){

	$query = "select * from  tbl_product where productid='$id' ";
	$result = $this->db->select($query);
	return $result;

}

public function productUpdate($data,$file,$id){


	    $productname = $this->fm->validation($data['productname']);
      $catid = $this->fm->validation($data['catid']);
      $brandid = $this->fm->validation($data['brandid']);
      $body = $this->fm->validation($data['body']);
      $price = $this->fm->validation($data['price']);
      $type = $this->fm->validation($data['type']);

      $productname = mysqli_real_escape_string($this->db->link, $data['productname']);
      $catid = mysqli_real_escape_string($this->db->link, $data['catid']);
      $body = mysqli_real_escape_string($this->db->link, $data['body']);
      $brandid = mysqli_real_escape_string($this->db->link, $data['brandid']);
      $price = mysqli_real_escape_string($this->db->link, $data['price']);
      $type = mysqli_real_escape_string($this->db->link, $data['type']);
  


          $permited  = array('jpg', 'jpeg', 'png', 'gif');
          $file_name = $file['image']['name'];
          $file_size = $file['image']['size'];
          $file_temp = $file['image']['tmp_name'];

          $div = explode('.', $file_name);
          $file_ext = strtolower(end($div));
          $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
          $uploaded_image = "uploads/".$unique_image;

          if ($productname =="" || $catid =="" || $body =="" || $brandid =="" || $price =="" || $type == "" ) {
            
           $msg = "<span style='color:red;font-size:16px;'>field  must not be empty!!! </span>";
              return $msg;

                   }else{

                     if (!empty($file_name)) {
                   

                  if ($file_size >1048567) {
                 
                  $msg = "<span style='color:red;font-size:16px;'>Image Size should be less then 1MB! </span>";

                    return $msg;

                 } elseif (in_array($file_ext, $permited) === false) {
                  $msg = "<span style='color:red;font-size:16px;'>You can upload only:-"
                  .implode(', ', $permited)." </span>";
                  
                    return $msg;
                  

              }else{

               move_uploaded_file($file_temp, $uploaded_image);
                $query ="update tbl_product 
                 
                 set 
                productname = '$productname',
                catid = '$catid',
                brandid = '$brandid',
                body = '$body',
                price = '$price',
                image = '$uploaded_image',
                type = '$type'

                where productid = '$id';

                ";

               $update_row = $this->db->update($query);
                  if ($update_row) {

                     $msg = "<span style='color:green;font-size:16px;'>Product update successfuly </span>";
                          return $msg;
                     
                  }else{
                     $msg = "<span style='color:red;font-size:16px;'>Product update not successfuly </span>";
                          return $msg;
                  }


             }
          }else{

             $query ="update tbl_product 
                 
                 set 
                productname = '$productname',
                catid = '$catid',
                brandid = '$brandid',
                body = '$body',
                price = '$price',
               
                type = '$type'

                where productid = '$id';

                ";

               $update_row = $this->db->update($query);
                  if ($update_row) {

                     $msg = "<span style='color:green;font-size:16px;'>Product update successfuly </span>";
                          return $msg;
                     
                  }else{
                     $msg = "<span style='color:red;font-size:16px;'>Product update not successfuly </span>";
                          return $msg;
                  }



      }


	    }

    }


public function delprobyid($id){
	$id = mysqli_real_escape_string($this->db->link, $id);
   $query = "select * from  tbl_product where productid='$id' ";
	
	$getdata = $this->db->select($query);
	if ($getdata) {

			while ($delImg= $getdata->fetch_assoc()) {

            $dellink = $delImg['image'];
            unlink($dellink);
        
		 }

     }

      $query = "delete  from  tbl_product where productid='$id' ";
      $result = $this->db->delete($query);
      if ($result) {

            $msg = "<span style='color:green;font-size:16px;'>product delete successfuly </span>";
                 return $msg;
            
         }else{
            $msg = "<span style='color:red;font-size:16px;'>product delete not successfuly </span>";
                 return $msg;
         }




   }


public function getfeatureproduct(){
  $query = "select   tbl_product.*, tbl_catagory.catname

            from tbl_product 
            inner join tbl_catagory
            on tbl_product.catid = tbl_catagory.catid
            where type='0' order by productid desc limit 6 ";

  $result = $this->db->select($query);
  return $result;

}
public function getnewproduct(){
  $query = "select * from  tbl_product where type='1' order by productid desc limit 5 ";
  $result = $this->db->select($query);
  return $result;

}





public function getsingleproduct($id){

   $query = "select p.*, c.catname, b.brandname

    from tbl_product as p,tbl_catagory as c, tbl_brand as b
    where p.catid = c.catid and p.brandid= b.brandid and p.productid='$id' ";

  $result = $this->db->select($query);
  return $result;



}


public function  latestfromiphone(){

$query = "select * from  tbl_product where brandid='3' order by productid desc limit 1 ";
  $result = $this->db->select($query);
  return $result;



}

public function  latestfromsamsung(){

$query = "select * from  tbl_product where brandid='1' order by productid desc limit 1 ";
  $result = $this->db->select($query);
  return $result;



}
public function  latestfromacer(){

$query = "select * from  tbl_product where brandid='4' order by productid desc limit 1 ";
  $result = $this->db->select($query);
  return $result;



}
public function  latestfromcanon(){

$query = "select * from  tbl_product where brandid='2' order by productid desc limit 1 ";
  $result = $this->db->select($query);
  return $result;



}



public function productbycat($id){

  $id = mysqli_real_escape_string($this->db->link, $id);
  $query = "select * from  tbl_product where catid='$id' ";
  $result = $this->db->select($query);
  return $result;
  
}


public function insertcomparedata($productid,$cmrid){



$productid = mysqli_real_escape_string($this->db->link, $productid);
$cmrid = mysqli_real_escape_string($this->db->link, $cmrid);
$cquery ="select * from tbl_compare where cmrid = '$cmrid' and productid = '$productid'";
 $check = $this->db->select($cquery);
    if ($check) {
     $msg = "<span style='color:red;font-size:16px;'>product already Added!</span>";
                 return $msg;
    }

  $query ="select * from tbl_product where productid = '$productid' ";
   

    $result = $this->db->select($query)->fetch_assoc();
    if ($result) {
       
        
        $productid= $result['productid'];
        $productname= $result['productname'];
        $price= $result['price'];
        $image= $result['image'];


           $query = "insert into tbl_compare (cmrid,productid,productname,price,image) values ('$cmrid','$productid','$productname','$price','$image')";

          
           $insert = $this->db->insert($query);
           if ($insert) {

            $msg = "<span style='color:green;font-size:16px;'>Added to cmpare  </span>";
                 return $msg;
            
         }else{
            $msg = "<span style='color:red;font-size:16px;'> not Added to cmpare </span>";
                 return $msg;
         }

        }

      }


public function getcomparedata($cmrid){


  $query = "select * from tbl_compare where cmrid = '$cmrid'";

  $result = $this->db->select($query);
  return $result;
}



public function delcomparedata($cmrid){

  $query = "delete  from  tbl_compare where cmrid='$cmrid' ";
      $deldata = $this->db->delete($query);
    


}


public function savewishlistdata($id,$cmrid){

   $cquery ="select * from tbl_wlist where cmrid = '$cmrid' and productid = $id ";
    $check = $this->db->select($cquery);
    if ($check) {
     $msg = "<span style='color:red;font-size:16px;'>product already Added!</span>";
                 return $msg;
    }

    $pquery ="select * from tbl_product where productid = '$id'";
    $result = $this->db->select($pquery)->fetch_assoc();
    if ($result) {
    
        
        $productid= $result['productid'];
        $productname= $result['productname'];
        $price= $result['price'];
        $image= $result['image'];


           $query = "insert into tbl_wlist (cmrid,productid,productname,price,image) values ('$cmrid','$productid','$productname','$price','$image')";
           $catinsert = $this->db->insert($query);

           if ($catinsert) {

            $msg = "<span style='color:green;font-size:16px;'>Save to wist list  </span>";
                 return $msg;
            
         }else{
            $msg = "<span style='color:red;font-size:16px;'> not Save to wist list </span>";
                 return $msg;
         }

             
          }

}



public function chekwislistdata($cmrid){


  $query = "select * from tbl_wlist where cmrid = '$cmrid' order by id desc";
  $result = $this->db->select($query);
  return $result;
}


public function delwishlist($cmrid,$productid){

  $query = "delete  from  tbl_wlist where cmrid='$cmrid' and productid = '$productid' ";
  $deldata = $this->db->delete($query);
}

public function getcatagoryproduct1(){

  $query = "select   tbl_product.*, tbl_catagory.catname 

    from tbl_product 
    inner join tbl_catagory
    on tbl_product.catid = tbl_catagory.catid

    where tbl_product.catid ='1'
    order by tbl_product.productid desc limit 1";
  $result = $this->db->select($query);
  return $result;

}
public function getcatagoryproduct2(){

   $query = "select   tbl_product.*, tbl_catagory.catname 

    from tbl_product 
    inner join tbl_catagory
    on tbl_product.catid = tbl_catagory.catid

    where tbl_product.catid ='2'
    order by tbl_product.productid desc limit 1";
  $result = $this->db->select($query);
  return $result;

}
public function getcatagoryproduct3(){

   $query = "select   tbl_product.*, tbl_catagory.catname 

    from tbl_product 
    inner join tbl_catagory
    on tbl_product.catid = tbl_catagory.catid

    where tbl_product.catid ='3'
    order by tbl_product.productid desc limit 1";
  $result = $this->db->select($query);
  return $result;

}
public function getcatagoryproduct4(){

   $query = "select   tbl_product.*, tbl_catagory.catname 

    from tbl_product 
    inner join tbl_catagory
    on tbl_product.catid = tbl_catagory.catid

    where tbl_product.catid ='4'
    order by tbl_product.productid desc limit 1";
  $result = $this->db->select($query);
  return $result;

}

public function getreltadedata($id){
  $query="select * from tbl_product where productid='$id' order by rand() limit 4";
  $relatedpost=$this->db->select($query);
}



public function getsearchresult($search){

  $query="select   tbl_product.*, tbl_catagory.catname

          from tbl_product 
          inner join tbl_catagory
          on tbl_product.catid = tbl_catagory.catid

          WHERE (tbl_product.productname LIKE '%$search%' OR tbl_product.body LIKE '%$search%') ";

  $relatedpoduct=$this->db->select($query);
  return $relatedpoduct;

}










}
?>