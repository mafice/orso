<?php

require_once "lib/spyc/spyc.php";

require_once "config.php";
require_once "core/error.php";
require_once "core/request.php";
require_once "core/hook.php";
require_once "core/api.php";

// 全てのプラグインの初期化
foreach(glob(PLUGINS_DIR . "*" . DIR_SEP . "plugin.php") as $f){

  require_once $f;
}



/*------------------------------------------
 *  APIの呼び出し
 *---------------------------------------- */

if(isset($_POST["plugin_name"])){

  if(!array_key_exists("plugin_name", $_POST))
    raise_error("Specify a plugin.");

  $plugin_name = basename($_POST["plugin_name"]);
  $api_name    = $_POST["api_name"];

  if(!file_exists(PLUGINS_DIR . $plugin_name . DIR_SEP . "plugin.php"))
    raise_error("Unknown plugin.");

  $result = call_api($plugin_name, $api_name);
  $result["result"] = true;
  print json_encode($result);
  exit();
}


/*------------------------------------------
 *  スキンの表示
 *---------------------------------------- */

require_once SKIN_DIR . "skin.php";
