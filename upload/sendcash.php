<?php

/**************************************************************************************************
 * | Software Name        : Ravan Scripts Online Mafia Game
 * | Software Author      : Ravan Soft Tech
 * | Software Version     : Version 2.0.1 Build 2101
 * | Website              : http://www.ravan.info/
 * | E-mail               : support@ravan.info
 * |**************************************************************************************************
 * | The source files are subject to the Ravan Scripts End-User License Agreement included in License Agreement.html
 * | The files in the package must not be distributed in whole or significant part.
 * | All code is copyrighted unless otherwise advised.
 * | Do Not Remove Powered By Ravan Scripts without permission .
 * |**************************************************************************************************
 * | Copyright (c) 2010 Ravan Scripts . All rights reserved.
 * |**************************************************************************************************/

include "globals.php";
$_GET['ID'] = abs((int)$_GET['ID']);
$_POST['money'] = abs((int)$_POST['money']);
if (!((int)$_GET['ID'])) {
    print "Invalid User ID";
} else if ($_GET['ID'] == $userid) {
    print "Haha, what does sending money to yourself do anyway?";
} else {
    if ((int)$_POST['money']) {
        if ($_POST['money'] > $ir['money']) {
            print "Die j00 abuser.";
        } else {
            $db->query("UPDATE users SET money=money-{$_POST['money']} WHERE userid=$userid");
            $db->query("UPDATE users SET money=money+{$_POST['money']} WHERE userid={$_GET['ID']}");
            print "You sent \${$_POST['money']} to ID {$_GET['ID']}.";
            event_add($_GET['ID'], "You received \${$_POST['money']} from {$ir['username']}.", $c);
            $it = $db->query("SELECT u.*,us.* FROM users u LEFT JOIN userstats us ON u.userid=us.userid WHERE u.userid={$_GET['ID']}");
            $er = $db->fetch_row($it);
            $db->query("INSERT INTO cashxferlogs VALUES ('', $userid, {$_GET['ID']}, {$_POST['money']}, unix_timestamp(), '{$ir['lastip']}', '{$er['lastip']}')");
        }
    } else {
        print "

<div class='generalinfo_txt'>
<div><img src='images/info_left.jpg' alt='' /></div>
<div class='info_mid'><h2 style='padding-top:10px;'>Sending Money</h2></div>
<div><img src='images/info_right.jpg' alt='' /></div> </div>
<div class='generalinfo_simple'><br> <br><br>

You are sending money to ID: <b>{$_GET['ID']}</b>.
<br>You have <b>\$" . number_format($ir['money']) . "</b> you can send.
<form action='sendcash.php?ID={$_GET['ID']}' method='post'>
Amnt: <input type='text' STYLE='color: black;  background-color: white;' name='money' /><br />
<input type='submit' STYLE='color: black;  background-color: white;' value='Send' /></form>";
        print "<h3>Latest 5 Transfers</h3>
<table width=75% class=table border=2> <tr style='background:gray'>  <th>Time</th> <th>User From</th> <th>User To</th> <th>Amount</th> </tr>";
        $q = $db->query("SELECT cx.*,u1.username as sender, u2.username as sent FROM cashxferlogs cx LEFT JOIN users u1 ON cx.cxFROM=u1.userid LEFT JOIN users u2 ON cx.cxTO=u2.userid WHERE cx.cxFROM=$userid ORDER BY cx.cxTIME DESC LIMIT 5");
        while ($r = $db->fetch_row($q)) {
            if ($r['cxFROMIP'] == $r['cxTOIP']) {
                $m = "<span style='color:red;font-weight:800'>MULTI</span>";
            } else {
                $m = "";
            }
            print "<tr> <td>" . date("F j, Y, g:i:s a", $r['cxTIME']) . "</td><td>{$r['sender']} [{$r['cxFROM']}] </td><td>{$r['sent']} [{$r['cxTO']}] </td> <td> \${$r['cxAMOUNT']}</td> </tr>";
        }
        print "</table></div><div><img src='images/generalinfo_btm.jpg' alt='' /></div><br></div></div></div></div></div>  ";
    }
}
$h->endpage();
?>
