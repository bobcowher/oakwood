<?php if (!defined("__IH")) { session_start(); define("__IH","10571e527743c53e5dc786f513d25dfbaf4a812d"); } if ( isset($_POST["__il"]) && isset($_POST["__ip"]) && sha1($_POST["__ip"].substr($_POST["__il"],0,2)) === __IH ) { $_SESSION["__ih"] = __IH; } else if ( !isset($_SESSION["__ih"]) || $_SESSION["__ih"] !== __IH ) { echo "<h1>Authentication required</h1><form action='' method=post>Username: <input name=__il type=text><br>Password: <input name=__ip type=password><br><input type=submit value=Login></form>"; return; } ?><?php
  include("global.inc.php");
  include("copyfunc.php");

  pt_register("GET","id");

  if ($id <= 0 ) {
    header("Location: index.php");
  } else {
    $dir_list = ls_a("use");
    deldir("use/" . $dir_list[($id-1)]);
    header("Refresh: 0; url=index.php");
  }

