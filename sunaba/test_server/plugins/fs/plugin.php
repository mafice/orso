<?php


add_api("get_file_list", function(){

  function rglob ($dir){

    $files = Array();

    foreach(glob($dir . DIR_SEP . "*") as $file){

      if(is_dir($file))
        $files   = array_merge($files, rglob($file));
      else
        $files[] = $file;
    }

    return $files;
  }


  $proj_name = get_request("proj_name");


  $files = Array();

  /* glob */
  if($glob = get_request("glob", "", true)){

    // FIXME: globを再実装するとかしてファイルパスの途中の**(再帰的)に対応する
    if($glob == "**"){

      // スラッシュがくっついているからsubstrで取り除く
      $files_dir = substr(get_proj_dirpath($proj_name, ""), 0, -1);

      foreach(rglob($files_dir) as $file){

        $files[] = str_replace($files_dir, "", $file);
      }
    }

  }

  return $files;
});


add_api("create_file", function(){

  $path = get_proj_dirpath(get_request("proj_name"), get_request("path"));

  if(!file_put_contents($path, ""))
    raise_error("Could not create a file. ({$path})");

  if(!chmod($path, 0644))
    raise_error("could not chmod. ($path, 0606)");

  return Array();
});


add_api("create_dir", function(){

  $path = get_proj_dirpath(get_request("proj_name"), get_request("path"));

  if(!mkdir($path))
    raise_error("Could not create a directory. ({$path})");

  if(!chmod($path, 0755))
    raise_error("could not chmod. ($path, 0606)");

  return Array();
});


add_api("read_file", function(){

  $path = get_proj_dirpath(get_request("proj_name"), get_request("path"));

  $data = file_get_contents($path);
  if(!file_get_contents($path))
    raise_error("Could not read file. ({$path})");

  return Array("data" => $data);
});


add_api("write_file", function(){

  $path = get_proj_dirpath(get_request("proj_name"), get_request("path"));
  $data = get_request("data");

  if(!file_put_contents($path, $data))
    raise_error("Could not write file.");

  return Array();
});


add_api("copy_file", function(){

  $dest = get_proj_dirpath(get_request("proj_name"), get_request("dest_path"));
  $src  = get_proj_dirpath(get_request("proj_name"), get_request("src_path"));

  if(!copy($src, $dest))
    raise_error("Could not copy file. (from {$src} to {$dest})");

  return Array();
});


add_api("move_file", function(){

  $dest = get_proj_dirpath(get_request("proj_name"), get_request("dest_path"));
  $src  = get_proj_dirpath(get_request("proj_name"), get_request("src_path"));

  if(!rename($src, $dest))
    raise_error("Could not move file. (from {$src} to {$dest})");

  return Array();
});


add_api("delete_file", function(){

  /* rm -rf */
  function rmrf($dir){

    if(is_file($dir) && !unlink($dir))
      raise_error("could not delete file: {$dir}");

    foreach(glob($dir . DIR_SEP . "*") as $file){

      if(is_file($file)  && !unlink($file)){
        raise_error("could not delete file: {$file}");

      // ディレクトリが空ならrmdirする
      }else if(is_dir($file) && count(glob($file . DIR_SEP . "*")) == 0 && !rmdir($file)){
        raise_error("could not delete directory: {$file}");

      }else{

        rmrf($file);
      }
    }

    if(is_dir($dir) && count(glob($dir . DIR_SEP . "*")) == 0 && !rmdir($dir))
      raise_error("could not delete directory: {$dir}");
  }


  $path = get_proj_dirpath(get_request("proj_name"), get_request("path"));

  rmrf($path);

  return Array();
});
