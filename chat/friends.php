 
 <html>
    <head>
      <title>list</title>
	  <script type="text/javascript">
          function myopen(obj){ 
		    window.open("chatroom.php?username="+encodeURI(obj.innerHTML),"_blank");
		  }
		  function mychange(val,obj){
            if(val=='over'){
			 obj.style.color='red';
			}
			if(val=='out'){
             obj.style.color='';
            }
		  }
	  </script>
	 </head>
  <body>
  <div style="width:200px;height:500px;background:pink;">
     <h1>�����б� <h1>
     <ul>
       <li onclick="myopen(this)" onmouseover="mychange('over',this)" onmouseout="mychange('out',this)">����</li>
	   <li onclick="myopen(this)" onmouseover="mychange('over',this)" onmouseout="mychange('out',this)">�ν�</li>
       <li onclick="myopen(this)" onmouseover="mychange('over',this)" onmouseout="mychange('out',this)">jeery</li>
	   <li onclick="myopen(this)" onmouseover="mychange('over',this)" onmouseout="mychange('out',this)">admin</li>
	   <li onclick="myopen(this)" onmouseover="mychange('over',this)" onmouseout="mychange('out',this)">tom</li>
	 </ul>
 </div>
  </body>
  </html>

