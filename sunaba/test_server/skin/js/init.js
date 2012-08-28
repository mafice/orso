
function init (){

  /* プロジェクト */
  call_api("get_proj_list", {},
           function(result){

             if(result["result"] == false)
               raise_error(result["errmsg"]);

             for(var i=0; result[i] != undefined; i++)
               $("#proj_list").append("<option value='"      +
                                      result[i]["proj_name"] + 
                                      "'>"                   +
                                      result[i]["name"]      +
                                      "</option>");

             /* 開いているプロジェクトがあったらをそれを開く */
             if($.cookie("current_proj") != null){

               $("#proj_list").val($.cookie("current_proj"));
               switch_proj();
             }
           });

  return;
}
