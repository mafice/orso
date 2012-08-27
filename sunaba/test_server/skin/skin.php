<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>orso</title>

  <script src="skin/jquery-1.8.0.min.js"></script>
  <script src="skin/main.js"></script>

  <script> $(document.body).ready(init); </script>

</head>
<body>

<div style="text-align:center; width:80%; margin:2em auto 0;font-family:sans-serif;">

  <h2 id="name">orso</h2>
  <hr>

  <fieldset>
    <legend>プロジェクト</legend>
    <button onClick="create_proj()">新しいプロジェクトを作成</button>
    <button onClick="delete_this_proj()">このプロジェクトを削除</button>
    <select id="proj_list" onChange="switch_proj()">
     <option selected disabled>------</option>
    </select>
  </fieldset>

  <p style="color:red;" id="error"></p>

</div>

</body>
</html>
