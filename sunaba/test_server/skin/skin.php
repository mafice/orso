<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>orso</title>

  <script src="skin/js/lib/jquery-1.8.0.min.js"></script>
  <script src="skin/js/lib/jquery.cookie.js"></script>

  <script src="skin/js/error.js"></script>
  <script src="skin/js/reload.js"></script>
  <script src="skin/js/api.js"></script>
  <script src="skin/js/init.js"></script>
  <script src="skin/js/proj.js"></script>
  <script src="skin/js/fs.js"></script>

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

  <fieldset>
    <legend>ファイル・ディレクトリ</legend>

    <button onClick="write_file()">変更を保存</button>
    &nbsp;|&nbsp;
    <button onClick="create_file()">ファイルを作成</button>
    <button onClick="create_dir()">ディレクトリを作成</button>
    <button onClick="delete_file()">削除</button>
    <button onClick="move_file()">移動</button>
    <button onClick="copy_file()">コピー</button>
    <br>
    <select id="file_list" onChange="open_file()">
      <option selected disabled>-----------------</option>
    </select>
  </fieldset>

  <p style="color:red;" id="error"></p>

  <textarea id="text_editor" style="width:90%;overflow:scroll;"></textarea>
</div>

</body>
</html>
