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
</script>
</head>
 <body>
    <div id='con'></div>
<div style="float:left;" id='replayDiv'>
	<textarea cols=40 rows=5 type='text' ></textarea></br>
	<span style="float:left;">点击用户名回复</span><span style="float:right;"><input type='button' value="发送" onclick="huifu()"></span>
</div>
 </body>
</html>
