
function raise_error (errmsg){

  $("#error").text(errmsg);
  $("#error").slideDown("fast", function(){

    setTimeout(function(){

      $("#error").slideUp("fast");
    }, 3000);
  });
}

