<?php


function get_request ($key, $vld_exp = "", $optional = false){

  if(!$optional && !array_key_exists($key, $_POST))
    raise_error("Not enough request parameters. (\$_POST['{$key}'])");

  if($vld_exp != "" && !preg_match($vld_exp, $_POST[$key]))
    raise_error("Invalid request parameter. (\$_POST['{$key}'])");

  return (isset($_POST[$key]))? $_POST[$key] : "";
}
