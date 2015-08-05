<?php
  
interface Protocol{ 
 function conn($url);
 function get();
 function post();
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
	 function __construct($url){
	   $this->conn($url);
	   $this->setHeader('Host: '.$this->url['host']);
	 }
	protected function setLine($method){
		$this->line[0]=$method.' '.$this->url['path'];
		if(!isSet($this->url['query'])){
		  $this->line[0].='?'.$this->url['query'];
        }
		$this->line[0].=' '.Http::VERSION;
	 }
	 protected function setHeader($headLine){
	  $this->header[]=$headLine;
	 }
	 protected function setBody(){

     }
	 public function conn($url){
	   $this->url=parse_url($url);
	   if(!isSet($this->url['port'])){
          $this->url['port']='80';
	   }
	   $this->fh=fsockopen($this->url['host'],$this->url['port']);
	 }
	 public function get(){
       $this->setLine("GET");
	   $this->request();
	   return $this->response;
	 }
     public function post(){
	   $this->setLine("POST");
	   $this->request();
	   return $this->reponse;
	 }

	 public function request(){
	   $res=array_merge($this->line,$this->header,array(''),$this->body,array(''));
	   print_r($res);
	   $res=implode(self::CRLF,$res);
	   var_dump($res);
	   fwrite($this->fh,$res);
	   while(!feof($this->fh)){
          $this->response.=fread($this->fh,1024);
		  ob_flush();
		  flush();
	   }
       $this->close();
	  }
     public function close(){
      
     }
  }
 
?>