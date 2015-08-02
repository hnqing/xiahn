<?php
  require_once("MessageService.class.php");
  $mes=$_POST['mes'];
  $sender=$_POST['sender'];
  $getter=$_POST['getter'];
  
  $ms=new MessageService();
  $ms->addMessage($sender,$getter,$mes);
  //file_put_contents("d:/phpStudy/www/chat/log.txt",$mes.'-'.$sender.'-'.$getter."\r\n",FILE_APPEND);
?>