<?php
  
interface Protocol{ 
 function conn($url);
 function get();
 function post($body);
 function close();
 }
 class Http implements Protocol{
     const VERSION='HTTP/1.1';
	 const CRLF="\r\n";
	 protected $response='';
	 protected $line=array();
	 protected $header=array();
	 protected $body=array();
	 protected $url=array();
	 protected $fh=null;
	 protected $errno='';
	 protected $errstr='';
	 protected $timeout=3;
	 function __construct($url){
	   $this->conn($url);
	   $this->setHeader('Host: '.$this->url['host']);
       $this->setHeader("Connection:close");
	 }
	protected function setLine($method){
		$this->line[0]=$method.' '.$this->url['path'];
		if(!isSet($this->url['query'])){
		  $this->line[0].='?'.$this->url['query'];
        }
		$this->line[0].=' '.Http::VERSION;
	 }
	 public function setHeader($headLine){
	  $this->header[]=$headLine;
	 }
	 public function setBody(){

     }
	 public function conn($url){
	   $this->url=parse_url($url);
	   if(!isSet($this->url['port'])){
          $this->url['port']='80';
	   }
	   $this->fh=fsockopen($this->url['host'],$this->url['port'],$this->errno,
		     $this->errstr,$this->timeout);
	 }
	 public function get(){
       $this->setLine("GET");
	   $this->request();
	   return $this->response;
	 }
     public function post($body=array()){
	   $this->setLine("POST");
	   $this->setHeader("Content-type: application/x-www-form-urlencoded");
	   //post要设置主体信息
	   $this->setBody($body);
	   //计算数据长度
	   $this->setHeader("Content-length: ".strlen($this->body[0]));
	   $this->request();
	   return $this->reponse;
	 }

	 public function request(){
	   $res=array_merge($this->line,$this->header,array(''),
		    $this->body,array(''));
	   echo $req=implode(self::CRLF,$res)."\r\n";
	   fwrite($this->fh,$req);
	   while(!feof($this->fh)){
           $this->response.=fread($this->fh,1024);
		}
    	   $this->close();
	  }
	  //关闭资源
     public function close(){
       fclose($this->$fh);
     }
  }

?>