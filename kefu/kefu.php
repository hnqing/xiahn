<?php 
setCookie("KEFU","admin");
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<title>客服</title>
<script src='http://apps.bdimg.com/libs/jquery/2.1.4/jquery.js'></script>
<style type='text/css'>
  #con{
    width:300px;height:320px;border:1px solid grey;background:pink;
}
</style >
<script type="text/javascript">


function comet(obj){
  console.log(obj);
  var msg="<a onclick=getCus('"+obj.sender+"')>"+"<font color='red' size=6 >"+obj.sender+"</font></a>"+'对你说:'; 
  msg+="<font color='green' size=5 >"+obj.content+'</br>';
  var con=$('#con').html();
  con+=msg;
   $('#con').html(con);
}
function getCus(cus){
  $('#replayDiv span:first').html(cus);
}
function huifu(){
  var span=$("#replayDiv span:first");
  if(span.html()=='点击用户名回复' || span.html()==''){
      alert('请选择一个客户再回复！');return;
  }
  var msg=document.getElementsByTagName("textarea")[0].value;
  $.post('sendMsg.php',msg,function(res){
  console.log(res);
  var con=$('#con').html();
  con+='你对'+"<font color='red' size=5 >"+span.html()+"</font>"+'说:'+msg+'</br>';
  $('#con').html(con);
  });
  
}
</script>
</head>
 <body>
    <div id='con'></div>
<div style="float:left;" id='replayDiv'>
	<textarea cols=40 rows=5 type='text' ></textarea></br>
	<span style="float:left;">点击用户名回复</span><span style="float:right;"><input type='button' value="发送" onclick="huifu()"></span>
</div>
<iframe src="cometbyiframe.php" style="">76986</iframe>
 </body>
</html>
