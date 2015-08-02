<?php 
  session_start();
  $sender=$_SESSION['loginUser'];
  $getter=$_GET['username'];
  
?>
<html>
    <head>
	  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <title>chatroom</title>
	  <script src='ajax.js'> </script>
	  <script type="text/javascript">
	   window.resizeTo(300,500);
	   window.setInterval('getMessage()',5000);

  function getMessage(){
  var xmlhttp=getXMLHttpRequest();
   if(xmlhttp){
      var url='getMessageController.php';
	  var getter="<?php echo $sender ?>";
	  var sender="<?php echo $getter ?>";
      var data="sender="+sender+"&getter="+getter;
	  xmlhttp.open("POST",url,true);
      xmlhttp.setRequestHeader("content-type","application/x-www-form-urlencoded");
	  xmlhttp.onreadystatechange=function(){
	  if(this.readyState==4){
	      if(this.status==200){
		     var res=this.responseXML; 
			 var cons=res.getElementsByTagName('con');
			 var sendTime=res.getElementsByTagName('sendTime');
			 if(cons.length!=0){
			  for(var i=0;i<cons.length;i++){
			      var con= cons[i].childNodes[0].nodeValue;
				  var time= sendTime[i].childNodes[0].nodeValue;
				  $('cons').value+=sender+"对"+getter+"说:"+con+
				  " "+time.toLocaleString()+"\r\n";
 			  }
			}
		  }
	    }
	  }
     xmlhttp.send(data);
    }
   }
 function sendMessage(){ 
   var xmlhttp=getXMLHttpRequest();
	if(xmlhttp){
    var url="mesController.php";
	var sender="<?php echo $sender ?>";
	var getter="<?php echo $getter ?>";
	var data="mes="+$('mes').value+"&sender="+sender+"&getter="+getter;
		     xmlhttp.open("POST",url,true);
			 xmlhttp.setRequestHeader("content-type","application/x-www-form-urlencoded");
			 xmlhttp.onreadystatechange=function(){
		if(xmlhttp.readyState==4){
		if(xmlhttp.status==200){
			 $('cons').value+=sender+"对"+getter+"说:"
			 +$('mes').value+"\r\n";
			  }
			}
		  }
		   xmlhttp.send(data);
         } 
	  }
  	  </script>
     </head>
  <body align='center'>
 	<h2>聊天室（<font color='red'><?php echo $sender?></font>与<font color='red'><?php echo $getter ?></font>聊天中）</h2>
	 <textarea id='cons' cols='50' rows='20'></textarea></br>
	 <input type='text' id='mes' size='49' maxlength='60'/>
     <input type='button' value='发送' onclick='sendMessage()'>
   </body>
  </html>

