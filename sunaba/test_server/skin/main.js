
var proj_name = "";

function raise_error (errmsg){

  $("#error").text(errmsg);
  $("#error").slideDown("fast", function(){

    setTimeout(function(){

      $("#error").slideUp("fast");
    }, 3000);
  });
}


function create_proj (){

  name      = window.prompt("プロジェクト名を入力してください");
  proj_name = window.prompt("プロジェクトID (英数字とアンダーバー)を入力してください");
  desc      = window.prompt("プロジェクトの説明を入力してください");

  $.ajax({

    type:     "POST",
    url:      "index.php",
    dataType: "json",
    data:     {
                plugin_name: "mng",
                api_name:    "create_proj",
                proj_name:   proj_name,
                name:        name,
                desc:        desc
              },

    error:    function(jqXHR, textStatus, errorThrown){

                raise_error("Javascript Error: " + textStatus);
              },

    success:  function(result){

                if(result["result"] == false)
                  raise_error(result["errmsg"]);
              }
  });
}


function delete_this_proj (){

  $.ajax({

    type:     "POST",
    url:      "index.php",
    dataType: "json",
    data:     {
                plugin_name: "mng",
                api_name:    "delete_proj",
                proj_name:   proj_name
              },

    error:    function(jqXHR, textStatus, errorThrown){

                raise_error("Javascript Error: " + textStatus);
              },

    success:  function(result){

                if(result["result"] == false)
                  raise_error(result["errmsg"]);
              }
  });
}


function switch_proj (){

  proj_name  = $("#proj_list > option:selected").val();
  $("#name").html($("#proj_list > option:selected").text());
}


function init (){

  $.ajax({

    type:     "POST",
    url:      "index.php",
    dataType: "json",
    data:     {
                plugin_name: "mng",
                api_name:    "get_proj_list",
                name:        name
              },

    error:    function(jqXHR, textStatus, errorThrown){

                raise_error("Javascript Error: " + textStatus);
              },

    success:  function(result){

                if(result["result"] == false)
                  raise_error(result["errmsg"]);

                for(var i=0; result[i] != undefined; i++){

                  $("#proj_list").append("<option value='"      +
                                         result[i]["proj_name"] + 
                                         "'>"                   +
                                         result[i]["name"]      +
                                         "</option>");
                }
              }
  });
}
