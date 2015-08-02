<?php 


 require_once('MessageService.class.php');
  $mesSer=new MessageService();
 var_dump( $mesSer->getMessage("张三","admin"));
 echo myconv('张三');
 
?>