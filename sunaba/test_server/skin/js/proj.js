

function create_proj (){

  name      = window.prompt("プロジェクト名を入力してください");
  proj_name = window.prompt("プロジェクトID (英数字とアンダーバー)を入力してください");
  desc      = window.prompt("プロジェクトの説明を入力してください");

  call_api("create_proj", {proj_name: $.cookie("current_proj"), name: name, desc: desc},
           function(result){

             if(result["result"] == false)
               raise_error(result["errmsg"]);

             reload();
           });
}


function delete_this_proj (){

  call_api("delete_proj", {proj_name: $.cookie("current_proj")},
           function(result){

             if(result["result"] == false)
               raise_error(result["errmsg"]);

             reload();
           });
}


function switch_proj (){

  $.cookie("current_proj", $("#proj_list").val());
  $("#name").html($("#proj_list > option:selected").text());

  fs_get_file_list();
}
