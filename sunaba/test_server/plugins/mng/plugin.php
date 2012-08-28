<?php

$plugin_name = "mng";


add_api("create_proj", function(){

  $proj_name = get_request("proj_name", VLD_PROJ_NAME);
  $name      = get_request("name");
  $desc      = get_request("desc");


  $proj_dir = PROJECTS_DIR . DIR_SEP . $proj_name;

  if(file_exists($proj_dir))
    raise_error("A Project with the name {$proj_name} already exists.");

  // proj_dir/
  if(!mkdir($proj_dir))
    raise_error("could not create a project directory. Check the permission of the projects directory.");

  // proj_dir/files
  if(!mkdir($proj_dir . DIR_SEP . "files"))
    raise_error("could not create a directory.");

  // proj_dir/project.yaml
  $proj_conf = Array(
                      "name" => $name,
                      "desc" => $desc,
                    );

  if(!file_put_contents($proj_dir . DIR_SEP . "project.yaml", Spyc::YAMLDump($proj_conf)))
    raise_error("could not create project.yaml.");

  // proj_dir/activities.rss
  $activities = simplexml_load_string( <<< 'HDOC'
<?xml version="1.0" encoding="UTF-8"?>
<rss version="2.0">
  <channel>
  </channel>
</rss>
HDOC
  );

  if(!$activities->asXML($proj_dir . DIR_SEP . "activities.rss"))
  raise_error("could not create activities.rss.");

  return Array();
});


add_api("delete_proj", function(){

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


  $proj_name = get_request("proj_name", VLD_PROJ_NAME);
  rmrf(PROJECTS_DIR . $proj_name);

  return Array();
});


add_api("get_proj_list", function(){

  $list = Array();
  $i    = 0;

  foreach(glob(PROJECTS_DIR . DIR_SEP . "*") as $proj_dir){

    $list[$i]              = spyc_load_file($proj_dir . DIR_SEP . "project.yaml");
    $list[$i]["proj_name"] = basename($proj_dir);
    $i++;
  }

  return $list;
});
