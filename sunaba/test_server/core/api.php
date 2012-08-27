<?php


function add_api ($plugin_name, $api_name, $func){

  add_hook("call_api/{$plugin_name}/{$api_name}", $func);
  return;
}


function call_api ($plugin_name, $api_name){

  return call_hook("call_api/{$plugin_name}/{$api_name}");
}
