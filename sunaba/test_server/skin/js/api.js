
function call_api (api_name, data, success){

  data["api_name"] = api_name;

  $.ajax({

    type:     "POST",
    url:      "index.php",
    dataType: "json",
    data:     data,

    error:    function(jqXHR, textStatus, errorThrown){

                raise_error("Javascript Error: " + textStatus);
              },

    success:  function(json){

                success(json);
              }
  });
}
