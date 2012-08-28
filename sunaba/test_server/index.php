<?php

require_once "lib/spyc/spyc.php";

require_once "config.php";
require_once "core/error.php";
require_once "core/path.php";
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

if(isset($_POST["api_name"])){

  $api_name = get_request("api_name", VLD_API_NAME);

  $result   = call_api($api_name);
  $result["result"] = true;
  print json_encode($result);
  exit();
}


/*------------------------------------------
 *  スキンの表示
 *---------------------------------------- */

require_once SKIN_DIR . "skin.php";
