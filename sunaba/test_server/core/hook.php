<?php

function control_hook ($action, $hookname, $func = "" /* FIXME: デフォルト引数に関数はできない? */){

  static $hooks = Array();

  switch($action){

    case "add":

      $hooks[$hookname][uniqid()] = $func;
      return;

    case "call":

      foreach($hooks[$hookname] as $func){
        $result = $func($_POST);
      }

      return $result;
  }
}


function add_hook ($hookname, $func){

  control_hook("add", $hookname, $func);
  return;
}


function call_hook ($hookname){

  return control_hook("call", $hookname);
}
