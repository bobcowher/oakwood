<?php
//////////////////////////////
// The Hosting Tool
// SQL Config
// By Jonny H
// Released under the GNU-GPL
//////////////////////////////

//Are we being called by the script?
if(THT != 1){die();}

//MAIN SQL CONFIG - Change values accordingly
$sql['host'] = 'localhost'; #The MySQL Host, usually default - localhost
$sql['user'] = 'tht'; #The MySQL Username
$sql['pass'] = 'Ch8fRef5'; #The MySQL Password
$sql['db'] = 'tht'; #The MySQL DB, remember to have your username prefix
$sql['pre'] = 'tht_'; #The MySQL Prefix, usually default unless otherwise

//LEAVE
$sql['install'] = true;
?>
