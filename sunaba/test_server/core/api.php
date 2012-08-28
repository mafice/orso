<?php


function add_api ($api_name, $func){

  add_hook("call_api/{$api_name}", $func);
  return;
}


function call_api ($api_name){

  return call_hook("call_api/{$api_name}");
}
