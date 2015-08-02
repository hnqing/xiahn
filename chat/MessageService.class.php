
<?php 
 require_once('SqlHelper.class.php');
 function myconv($str){
 return iconv("gbk","utf8",$str);
 }
 class MessageService{

  

 function addMessage($sender,$getter,$con){
	
   $sql="insert into mes(sender,getter,content,sendTime) values( '$sender','$getter','$con',now())"; 
  
   $sqlHelper=new SqlHelper();
   $res=$sqlHelper->execute_dml($sql);
  file_put_contents("d:/phpStudy/www/chat/log.txt",$sql."--$res"."\r\n",FILE_APPEND);
    $sqlHelper->close_connect();

     }

 function getMessage($getter,$sender){    	 
    $sql="select * from mes where getter='$getter' and sender='$sender' and state=0";
 	$mesXML="<meses>";
	$sqlHelper=new SqlHelper();
	$mesList=$sqlHelper->execute_dql2($sql);
	if(count($mesList)!=0){
	for($i=0;$i<count($mesList);$i++){
		$row=$mesList[$i];
        $mesXML.="<id>{$row['id']}</id><sender>{$row['sender']}</sender><getter>{$row['getter']}</getter><con>{$row['content']}</con><sendTime>{$row['sendTime']}</sendTime>";
	 }
	$sql="update mes set state=1 where getter='$getter' and sender='$sender'";
	$res=$sqlHelper->execute_dml($sql);
	}
    $mesXML.="</meses>";
  	$sqlHelper->close_connect();
	return $mesXML;  
   }

 

 }
?>