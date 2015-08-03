<?php
 require_once('SqlHelper.class.php');
 $kefu=$_COOKIE["KEFU"];
 set_time_limit(0);
 $i=0;
 $sqlHelper=new SqlHelper();
 while(true){
  echo $i++."</br>";
  $sql="select * from mes where getter='$kefu' and state=0 limit 1";
  $res=$sqlHelper->execute_dql2($sql);
  if(empty($res)){break;}else{
   $sql="update mes set state=1 where id=".$res[0]['id'];
   $sqlHelper->execute_dql($sql);
  }
  $msg=json_encode($res[0]);
  echo "<script type='text/javascript'>";
  echo "parent.window.comet($msg);";
  echo "</script>";
  ob_flush();
  flush();
  sleep(1);
 }

?>