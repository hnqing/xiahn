<?php 


 require_once('MessageService.class.php');
  $mesSer=new MessageService();
 var_dump( $mesSer->getMessage("����","admin"));
 echo myconv('����');
 
?>