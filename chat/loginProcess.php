<?php
 $loginUser;
 if(isset($_GET['loginUser'])){
   $loginUser=$_GET['loginUser'];
  }
  if($loginUser==null){
   echo "�������û���";exit;
  }
  $password=$_GET['password'];
 if($password=='admin'){
    session_start();
	$_SESSION['loginUser']=$loginUser;
    var_dump($_SESSION);
	header("location:friends.php");
 }else{
    echo "�Ƿ��û�".$loginUser;
 }
?>