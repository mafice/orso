

function create_file (){

  path = window.prompt("作成するファイルのパスを入力してください");

  call_api("create_file", {proj_name: $.cookie("current_proj"), path: path}, function(result){ reload(); });
}


function create_dir (){

  path = window.prompt("作成するディレクトリのパスを入力してくだい");

  call_api("create_dir", {proj_name: $.cookie("current_proj"), path: path}, function(result){ reload(); });
}


function open_file (){

  path = $("#file_list").val();

  call_api("read_file", {proj_name: $.cookie("current_proj"), path: path}, function(result){

    $("#text_editor").val(result["data"]);
  });
}


function write_file (){

  path = $("#file_list").val();
  data = $("#text_editor").val();

  call_api("write_file", {proj_name: $.cookie("current_proj"), path: path, data: data}, function(result){});
}


function move_file (){

  src  = window.prompt("移動元のファイルまたはディレクトリのパスを入力してくだい");
  dest = window.prompt("移動先のファイルまたはディレクトリのパスを入力してくだい");

  call_api("move_file", {proj_name: $.cookie("current_proj"), src_path: src, dest_path: dest}, function(result){ reload(); });
}


function copy_file (){

  src  = window.prompt("コピー元のファイルまたはディレクトリのパスを入力してくだい");
  dest = window.prompt("コピー先のファイルまたはディレクトリのパスを入力してくだい");

  call_api("copy_file", {proj_name: $.cookie("current_proj"), src_path: src, dest_path: dest}, function(result){ reload(); });
}


function delete_file (){

  path = window.prompt("削除するファイルまたはディレクトリを入力してくだい");

  if(!path || !window.confirm(path + "を削除します。本当によろしいですか？"))
    return;

  call_api("delete_file", {proj_name: $.cookie("current_proj"), path: path}, function(result){ reload(); });
}


function fs_get_file_list (){

  call_api("get_file_list", {proj_name: $.cookie("current_proj"), glob: "**"}, function(result){

    $("#file_list").html("<option selected disabled>----------------</option>");

    for(var i=0; result[i] != undefined; i++)
      $("#file_list").append(
                              "<option val='" + result[i] + "'>" +
                              result[i]                          +
                              "</option>"
                            );
  });
}
