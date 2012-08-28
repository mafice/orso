<?php


function parse_proj_path ($proj_name, $path){

  $dirs = explode("/", $path);

  $path = "";

  foreach($dirs as $dir){

    switch($dir){

      case "": case ".":                                break;
      // 最後のディレクトリ名とスラッシュを取り除く
      case "..": $path  = preg_replace("/\/.+$/u", ""); break;
      default:   $path .= DIR_SEP . $dir;               break;
    }
  }

  $realpath = realpath(PROJECTS_DIR) . DIR_SEP . $proj_name . DIR_SEP .
                                       "files" . DIR_SEP    . $path;
  return $realpath;
}


function get_proj_dirpath ($proj_name, $path){

  if(!file_exists(PROJECTS_DIR . $proj_name))
    raise_error("Project not found. ({$proj_name})");

  $realpath = parse_proj_path($proj_name, $path);

  return $realpath;
}
