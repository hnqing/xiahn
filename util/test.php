<?php
include_once('./http.class.php');
$http=new Http('http://www.yqbdt.com/forum.php?mod=viewthread&tid=86824');
//var_dump($http);
echo $http->get();

?>