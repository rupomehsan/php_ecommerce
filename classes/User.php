<?php

$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');



?>


<?php 

class User{

	private $db;
	private $fm;

	 public function __construct(){


			$this->db = new Database();
			$this->fm = new Format();

	 }


	 public function getcontact(){
           
           $query= "select * from tbl_contact where status ='0' ";
           $getdata= $this->db->select($query);
           return $getdata;
	}

  public function getseencontactid(){
           
           $query= "select * from tbl_contact where status ='1' ";
           $getdata= $this->db->select($query);
           return $getdata;
  }
    public function deleteseenid($delid){
           
           $query= "delete from tbl_contact where id ='$delid' ";
           $getdata= $this->db->delete($query);
           return $getdata;
  }
    public function getusermsgbyid($id){
           
           $query= "select * from tbl_contact where id ='$id' ";
           $getdata= $this->db->select($query);
           return $getdata;
  }

  

  public function insertcontact($data){

      $name = $this->fm->validation($data['name']);
      $email = $this->fm->validation($data['email']);
      $phone = $this->fm->validation($data['phone']);
      $massage = $this->fm->validation($data['massage']);
      

      $name = mysqli_real_escape_string($this->db->link, $data['name']);
      $email = mysqli_real_escape_string($this->db->link, $data['email']);
      $phone = mysqli_real_escape_string($this->db->link, $data['phone']);
      $massage = mysqli_real_escape_string($this->db->link, $data['massage']);

       if ($name =="" || $email =="" || $phone =="" || $massage =="") {
          
         $msg = "<span style='color:red;font-size:16px;'>Field  must not be empty!!! </span>";
            return $msg;

             }
         else{

              
               $query ="insert into tbl_contact (firstname,email,phone,body) 

               value ('$name','$email','$phone','$massage');

               ";
               $insert_row = $this->db->insert($query);
                  if ($insert_row) {

                     $msg = "<span style='color:green;font-size:16px;'>Massage successfuly send</span>";
                          return $msg;
                     
                  }else{
                     $msg = "<span style='color:red;font-size:16px;'>Massage not successfuly send</span>";
                          return $msg;
                  }



           }

        }



        public function updateseenid($seenid){

           $query = "update tbl_contact set status = '1' where id = '$seenid'";
           $result = $this->db->update($query);
           if ($result) {

                     $msg = "<span style='color:green;font-size:16px;'>Massage successfuly send to seenbox </span>";
                          return $msg;
                     
                  }else{
                     $msg = "<span style='color:red;font-size:16px;'>Massage not successfuly send</span>";
                          return $msg;
                  }
              
           }



      public function sendusermalbyid($id,$data){

        $to      = $this->fm->validation($data['toEmail']);
        $from    =$this->fm->validation($data['fromEmail']);
        $subject = $this->fm->validation($data['subject']);
        $message = $this->fm->validation($data['body']);

        $sendmail = mail($to,$subject,$message,$from);
        if ($sendmail) {
            echo "<span style='color:green;font-size:18px;'>Message successfully send</span>";
            }else {
             echo "<span style='color:red;font-size:18px;'>Message not successfully send</span>";
            }


      }

      public function sliderinserdtdata($data,$file) {

      $titleone = $this->fm->validation($data['titleone']);
      $titletwo = $this->fm->validation($data['titletwo']);
      $titlethree = $this->fm->validation($data['titlethree']);
     
      

      $titleone = mysqli_real_escape_string($this->db->link, $data['titleone']);
      $titletwo = mysqli_real_escape_string($this->db->link, $data['titletwo']);
      $titlethree = mysqli_real_escape_string($this->db->link, $data['titlethree']);
      


      $permited  = array('jpg', 'jpeg', 'png', 'gif');
      $file_name = $file['image']['name'];
      $file_size = $file['image']['size'];
      $file_temp = $file['image']['tmp_name'];

      $div = explode('.', $file_name);
      $file_ext = strtolower(end($div));
      $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
      $uploaded_image = "uploads/".$unique_image;

        if ($titleone =="" || $titletwo =="" || $uploaded_image =="" ) {
        
            $msg = "<span style='color:red;font-size:16px;'>Field  must not be empty!!! </span>";
            return $msg;

               }elseif ($file_size >1048567) {
                     
                      $msg = "<span style='color:red;font-size:16px;'>Image Size should be less then 1MB! </span>";

                        return $msg;

                     } elseif (in_array($file_ext, $permited) === false) {
                      $msg = "<span style='color:red;font-size:16px;'>You can upload only:-"
                      .implode(', ', $permited)." </span>";
                      
                        return $msg;
                         }


         else{

         move_uploaded_file($file_temp, $uploaded_image);
         $query ="insert into tbl_slider (titleone,titletwo,titlethree,image) 

         value ('$titleone','$titletwo','$titlethree','$uploaded_image') ";
         $insert_row = $this->db->insert($query);
            if ($insert_row) {

               $msg = "<span style='color:green;font-size:16px;'> insert successfuly </span>";
                    return $msg;
               
            }else{
               $msg = "<span style='color:red;font-size:16px;'> insert not successfuly </span>";
                    return $msg;
            }


       }

      }

       public  function getallslider() {
      
  
           $query= "select * from tbl_slider ";
           $getdata= $this->db->select($query);
           return $getdata;

      }
      
      public function getsliderbyid($id){
         $query= "select * from tbl_slider where sliderid='$id' ";
         $getdata= $this->db->select($query);
         return $getdata;

      }

      public function sliderupdatebyid($id,$data,$file){

            $titleone = $this->fm->validation($data['titleone']);
            $titletwo = $this->fm->validation($data['titletwo']);
            $titlethree = $this->fm->validation($data['titlethree']);
           
            

            $titleone = mysqli_real_escape_string($this->db->link, $data['titleone']);
            $titletwo = mysqli_real_escape_string($this->db->link, $data['titletwo']);
            $titlethree = mysqli_real_escape_string($this->db->link, $data['titlethree']);
            


            $permited  = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $file['image']['name'];
            $file_size = $file['image']['size'];
            $file_temp = $file['image']['tmp_name'];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_image = "uploads/".$unique_image;

              if ($titleone =="" || $titletwo =="" || $uploaded_image =="" ) {
              
                  $msg = "<span style='color:red;font-size:16px;'>Field  must not be empty!!! </span>";
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
                $query ="update tbl_slider 
                 
                set 
                titleone = '$titleone',
                titletwo = '$titletwo',
                titlethree = '$titlethree',
                image = '$uploaded_image'

                where sliderid = '$id';

                ";

               $update_row = $this->db->update($query);
                  if ($update_row) {

                     $msg = "<span style='color:green;font-size:16px;'>Slider update successfuly </span>";
                          return $msg;
                     
                  }else{
                     $msg = "<span style='color:red;font-size:16px;'>Slider update not successfuly </span>";
                          return $msg;
                  }


             }
          }else{

              $query ="update tbl_slider 
                 
                set 
                titleone = '$titleone',
                titletwo = '$titletwo',
                titlethree = '$titlethree'

                where sliderid = '$id';

                ";

               $update_row = $this->db->update($query);
                  if ($update_row) {

                     $msg = "<span style='color:green;font-size:16px;'>Slider update successfuly </span>";
                          return $msg;
                     
                  }else{
                     $msg = "<span style='color:red;font-size:16px;'>Slider update not successfuly </span>";
                          return $msg;
                  }



         }


      }


      }

      public function deltesliderdata($id){

        $query= "delete from tbl_slider where sliderid ='$id' ";
        $getdata= $this->db->delete($query);
           return $getdata;

      }


      public function checkpassword($old_pass){

       $password=md5($old_pass);
       $query="SELECT adminPass FROM tbl_admin WHERE adminPass='$password'";
       $getdata= $this->db->select($query);
       return $getdata;
      

    }



    public function updateuserpass($data){

      $old_pass=$data['oldpass'];
      $new_pass=$data['newpass'];
      $chk_pass=$this->checkpassword($old_pass);
         if ($old_pass=="" or $new_pass=="") {
        $msg="field must be not empty";
        return $msg;
       }

        if ($chk_pass==false) {
             $msg="old passwor is not exist";
             return $msg;
        }

        // if (strlen($new_pass) < 5) {
              
        //        $msg="password is too short";
        //        return $msg;
        //    }   


        $password=md5($new_pass);
        $query="UPDATE tbl_admin set adminPass='$password' ";
        $update_row = $this->db->update($query);
        if ($update_row) {

           $msg = "<span style='color:green;font-size:16px;'>password update successfuly </span>";
                return $msg;
           
        }else{
           $msg = "<span style='color:red;font-size:16px;'>password update not successfuly </span>";
                return $msg;
        }


      }


      public function UserInsert($data){

        $username = $this->fm->validation($data['username']);
        $password = $this->fm->validation(md5($data['password']));
        $role     = $this->fm->validation($data['role']);
        $email    = $this->fm->validation($data['email']);


        $username = mysqli_real_escape_string($this->db->link,$username);
        $password = mysqli_real_escape_string($this->db->link,$password);
        $role = mysqli_real_escape_string($this->db->link,$role);
        $email = mysqli_real_escape_string($this->db->link,$email);

        if (empty($username) || empty($password) ||  empty($role) ||  empty($email)) {
            echo "<span style='color:red;font-size:16px;'>Field must not be empty..</span>";
        }

        $mailquery= "select * from tbl_admin where adminEmail ='$email' limit 1 ";
        $mailchechk = $this->db->select($mailquery);
        if ($mailchechk != false) {

           echo "<span style='color:red;font-size:16px;'>eamil already exist</span>"; 
       
        } else{

            $query= " INSERT INTO tbl_admin (adminUser,adminPass,role,adminEmail) VALUES ('$username','$password','$role','$email')";
            $catinsert= $this->db->insert($query);
            if ($catinsert) {
                
                echo "<span style='color:green;font-size:18px;'> User create  successfully</span>";
            }else{

               echo "<span style='color:red;font-size:18px;'> User not create  successfully</span>";
             }
           }
         }

      

      public function getalluser(){

         $query= "select * from tbl_admin order by adminId desc ";
         $getuser = $this->db->select($query);
         return $getuser;

      }

      public function deluserbyid($id){

      $delquery = " delete from tbl_admin where adminId='$id' ";
      $deldata =$this->db->delete($delquery);
      if ($deldata) {

       echo "<span style='color:green;font-size:18px;'>data delete success</span>";
     }else{
     echo "<span style='color:red;font-size:18px;'>data not delete success</span>";
      }

    }


    public function updatewebdoc($data,$file){
      $title = $this->fm->validation($data['title']);
      $slogan = $this->fm->validation($data['slogan']);
      $phone = $this->fm->validation($data['phone']);
      $email = $this->fm->validation($data['email']);
      $address = $this->fm->validation($data['address']);

     

      $title = mysqli_real_escape_string($this->db->link, $data['title']);
      $slogan = mysqli_real_escape_string($this->db->link, $data['slogan']);
      $phone = mysqli_real_escape_string($this->db->link, $data['phone']);
      $email = mysqli_real_escape_string($this->db->link, $data['email']);
      $address = mysqli_real_escape_string($this->db->link, $data['address']);
 


      $permited  = array('jpg', 'jpeg', 'png', 'gif');
      $file_name = $file['image']['name'];
      $file_size = $file['image']['size'];
      $file_temp = $file['image']['tmp_name'];

      $div = explode('.', $file_name);
      $file_ext = strtolower(end($div));
      $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
      $uploaded_image = "uploads/".$unique_image;

      if ($title =="" || $slogan =="" || $phone =="" || $email =="" || $address =="") {
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
                    $query ="update tbl_title_slogan 
                 
                    set 
                    web_title = '$title',
                    web_slogan = '$slogan',
                    phone = '$phone',
                    address = '$address',
                    email = '$email',
                    web_logo = '$uploaded_image'     

                    where id = '1';

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

              $query ="update tbl_title_slogan 
             
                set 
                web_title = '$title',
                web_slogan = '$slogan',
                phone = '$phone',
                address = '$address',
                email = '$email'
               

                where id = '1';

                ";

               $update_row = $this->db->update($query);
                  if ($update_row) {

                     $msg = "<span style='color:green;font-size:16px;'> update successfuly </span>";
                          return $msg;
                     
                  }else{
                     $msg = "<span style='color:red;font-size:16px;'> update not successfuly </span>";
                          return $msg;
                  }



            }


        }


            
        


    }

    public function getwebdocument(){

       $query= "select * from tbl_title_slogan where id = '1' ";
       $getuser = $this->db->select($query);
       return $getuser;


    }

   public function getsocialdata(){

       $query= "select * from tbl_social where id = '1' ";
       $getuser = $this->db->select($query);
       return $getuser;


    }

    public function updatesocial($data){

      $facebook = $this->fm->validation($data['facebook']);
      $twitter = $this->fm->validation($data['twitter']);
      $youtube = $this->fm->validation($data['youtube']);
     

     

      $facebook = mysqli_real_escape_string($this->db->link, $data['facebook']);
      $twitter = mysqli_real_escape_string($this->db->link, $data['twitter']);
      $youtube = mysqli_real_escape_string($this->db->link, $data['youtube']);

       if ($facebook =="" || $twitter =="" || $youtube =="" ) {

       $msg = "<span style='color:red;font-size:16px;'>field  must not be empty!!! </span>";
              return $msg;

              }else{

              $query ="update tbl_social 
             
                set 
                fb = '$facebook',
                tw = '$twitter',
                yt = '$youtube'

                where id = '1' ";

                 $update_row = $this->db->update($query);
                  if ($update_row) {

                     $msg = "<span style='color:green;font-size:16px;'> update successfuly </span>";
                          return $msg;
                     
                  }else{
                     $msg = "<span style='color:red;font-size:16px;'> update not successfuly </span>";
                          return $msg;
                  }



            }

     

     }
    

   
     
     


     

        


}