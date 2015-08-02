
function getXMLHttpRequest(){
  var xmlHttpRequest=null;
   if(window.XMLHttpRequest){
    xmlHttpRequest=new XMLHttpRequest();
  if(xmlHttpRequest.overrideMimeType){  
            xmlHttpRequest.overrideMimeType("text/xml");  
        } 
		
    }else if(window.Active){

     var activeName=["MSXML2.XMLHTTP","Microsoft.XMLHTTP"];  
        for(var i=0;i<activeName.length;i++){  
            try{  
                xmlHttpRequest=new ActiveXObject(activeName[i]);  
                break;  
            }catch(e){  
                         
            }  
        }  
    }  
      
    if(xmlHttpRequest == undefined || xmlHttpRequest == null){  
        alert("xmlHttpRequest对象创建失败！！");  
    }else{  
        this.xmlHttpRequest=xmlHttpRequest;  
    }  
      
	  return xmlHttpRequest;
}

function $(id){
 return document.getElementById(id);
}
