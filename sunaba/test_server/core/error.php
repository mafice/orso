<?php

function raise_error ($errmsg){

  print json_encode(Array("result" => false, "errmsg" => $errmsg));
  exit();
}
