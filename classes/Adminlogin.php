<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Session.php');
Session::checkLogin();
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');

?>









<?php 
class Adminlogin{
	
	private $db;
	private $fm;




	public function __construct(){


		$this->db = new Database();
		$this->fm = new Format();

	}

   public function adminLogin($adminUser,$adminPass){

   	$adminUser = $this->fm->validation($adminUser);
   	$adminPass = $this->fm->validation($adminPass);


   	$adminUser = mysqli_real_escape_string($this->db->link, $adminUser);
   	$adminPass = mysqli_real_escape_string($this->db->link, $adminPass);


   	if (empty($adminUser) || empty($adminPass)) {
   		
   		$loginmsg = "Username or Password must not be empty!!!";
   		return $loginmsg;
   	}else{

   		$query = "select * from tbl_admin where adminUser ='$adminUser' AND adminPass= '$adminPass' ";

   		$result = $this->db->select($query);
   		if ($result != false) {
   			
   			$value = $result->fetch_assoc();
   			Session::set("adminlogin", true);
   			Session::set("adminId", $value['adminId']);
   			Session::set("adminUser", $value['adminUser']);
   			Session::set("adminName", $value['adminName']);
            Session::set("role", $value['role']);
   			echo "<script>window.location = 'dashbord.php';</script>";
   			
   		}else{

   			$loginmsg = "Username or Password  not match!!!";
   			return $loginmsg;
   		}
   	}

   }


   public function recoverpass($email){

      $email = $this->fm->validation($email);
      
      $email = mysqli_real_escape_string($this->db->link,$email);


        if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
         
         echo "<span style='color:red;font-size:18px;'>invelid email</span>";

         }else{


        $mailquery= "select * from tbl_admin where adminEmail ='$email' limit 1 ";
        $mailchechk = $this->db->select($mailquery);
        if ($mailchechk != false) {
       
         while  ($value  = $mailchechk->fetch_assoc()) {

            $userid = $value['adminId'];
            $username = $value['adminName'];
            }

           $text = substr($email,0,3);
           $rand = rand(10000,99999);
           $newpass = "$text$rand";
           $password = md5($newpass);
            $query ="update tbl_admin 
            set


            adminPass='$password'

            where adminId='$userid' " ;
               
            $updated_row = $this->db->update($query);
            $to = "$email";
            $from = "mdrupomehsan@abarth.websitewelcome.com";
            $headers = 'From: $from\n';
            $headers .= 'MIME-Version: 1.0';
            $headers .= 'Content-type: text/html; charset=iso-8859-1';
            $subject = "your password";
            $message = "your username is ".$username."and password is ".$newpass."please visit website with login";

            $sendmail =mail($to,$subject,$message,$headers);

                if ($updated_row) {
                echo "<span style='color:green;font-size:18px;'>please check your email for new password..</span>";
                }else {
                 echo "<span style='color:red;font-size:18px;'>Email not send</span>";
                }


         
          } else{
            echo "<span style='color:red;font-size:18px;'>email not exist !!</span>";
           }

          }


      }














	
}


?>