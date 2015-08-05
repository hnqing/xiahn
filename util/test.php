<?php
include_once('./http.class.php');
$http=new Http('http://localhost/util/test.php?user=zhangsan');
var_dump($http);
echo $http->get();

?>