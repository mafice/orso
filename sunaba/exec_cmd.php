<?php

  /*
   *  シェルコマンドの実行
   *  popenのほうがいいかも。
   */

  $cmd = "ls /";
  print shell_exec(escapeshellcmd($cmd));
