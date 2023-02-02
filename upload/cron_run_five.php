<?php

/**************************************************************************************************
| Software Name        : Ravan Scripts Online Mafia Game
| Software Author      : Ravan Soft Tech
| Software Version     : Version 2.0.1 Build 2101
| Website              : http://www.ravan.info/
| E-mail               : support@ravan.info
|**************************************************************************************************
| The source files are subject to the Ravan Scripts End-User License Agreement included in License Agreement.html
| The files in the package must not be distributed in whole or significant part.
| All code is copyrighted unless otherwise advised.
| Do Not Remove Powered By Ravan Scripts without permission .         
|**************************************************************************************************
| Copyright (c) 2010 Ravan Scripts . All rights reserved.
|**************************************************************************************************/

include "config.php";
include "language.php";
global $_CONFIG;
define("MONO_ON", 1);
require "class/class_db_{$_CONFIG['driver']}.php";
$db=new database;
$db->configure($_CONFIG['hostname'],
 $_CONFIG['username'],
 $_CONFIG['password'],
 $_CONFIG['database'],
 $_CONFIG['persistent']);
$db->connect();
$c=$db->connection_id;
$set=array();
$settq=$db->query("SELECT * FROM settings");
while($r=$db->fetch_row($settq))
{
$set[$r['conf_name']]=$r['conf_value'];
}
//brave , health update
$query="UPDATE users SET brave=brave+((maxbrave/10)+0.5) WHERE brave<maxbrave AND donatordays=0 ";
$query6="UPDATE users SET brave=brave+((maxbrave/5)+0.5) WHERE brave<maxbrave  AND donatordays>0 ";
$query2="UPDATE users SET brave=maxbrave WHERE brave>maxbrave";
$query3="UPDATE users SET hp=hp+(maxhp/3) WHERE hp<maxhp AND donatordays=0";
$query5="UPDATE users SET hp=hp+(maxhp/(1.5)) WHERE hp<maxhp AND donatordays>0"; 
$query4="UPDATE users SET hp=maxhp WHERE hp>maxhp";
$db->query($query);
$db->query($query6); 
$db->query($query2);
$db->query($query3);
$db->query($query5);
$db->query($query4);
//energy , will update
$query="UPDATE users SET energy=energy+(maxenergy/(12.5)) WHERE energy<maxenergy AND donatordays=0";
$query5="UPDATE users SET energy=energy+(maxenergy/(6)) WHERE energy<maxenergy AND donatordays>0";
$query2="UPDATE users SET energy=maxenergy WHERE energy>maxenergy";
$query3="UPDATE users SET will=will+10 WHERE will<maxwill AND donatordays=0";
$query6="UPDATE users SET will=will+20 WHERE will<maxwill AND donatordays>0";  
$query4="UPDATE users SET will=maxwill WHERE will>maxwill";

$db->query($query);
$db->query($query5);
$db->query($query2);
$db->query($query3);
$db->query($query6);   
$db->query($query4);
if($set['validate_period'] == 5 && $set['validate_on'])
{
$db->query("UPDATE users SET verified=0");
}
if($set['validate_period'] == 15 && $set['validate_on'] && in_array(date('i'),array("00", "15", "30", "45")))
{
$db->query("UPDATE users SET verified=0");
}
?>
