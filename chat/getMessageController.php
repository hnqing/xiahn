<?php 
  header("content-type: text/xml;charset=utf-8");
  header("Cache-Control: no-cache");
  require_once("MessageService.class.php");
  $sender=$_POST['sender'];
  $getter=$_POST['getter'];
  $mesSer=new MessageService();
  $mesXML=$mesSer->getMessage($getter,$sender);
  //file_put_contents("d:/phpStudy/www/chat/log.txt",$sender.$getter."\r\n",FILE_APPEND);
  echo $mesXML;
?>