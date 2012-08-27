<?php

define("DIR_SEP",        DIRECTORY_SEPARATOR);
define("BASE_DIR",       getcwd()   . DIR_SEP);
define("PLUGINS_DIR",    BASE_DIR . "plugins"  . DIR_SEP);
define("PROJECTS_DIR",   BASE_DIR . "projects" . DIR_SEP);
define("SKIN_DIR",       BASE_DIR . "skin"     . DIR_SEP);

/* ユーザからの入力データのチェック用の正規表現 */
define("VLD_PROJ_NAME", "/[a-zA-Z0-9_]+/");
