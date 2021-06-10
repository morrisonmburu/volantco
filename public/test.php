<?php 

  $data = '0703 640124';

  $phone1 =  str_replace(' ', '', $data);
  $phone2 = ltrim($phone1, 0);

  $phone = "+254".$phone2;

  var_dump($phone);
 ?>