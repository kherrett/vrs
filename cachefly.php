<?php
//Links need to be formatted as such
// /cachefly.php?f=/course/video/index.html
//Example:
// /cachefly.php?f=/Nessus/ODT-NES-AAR/adv_analysis_d/index.html

//Secret key for our CacheFly account
$secret = "<secret_key_from_CF>";
$filepath = $_GET["f"];

//set expire time to 10 minutes
$expiretime = time() + 600;

//Do NOT restrict to user IP
//$user_ip = $_SERVER['REMOTE_ADDR'];

$rules = "expiretime=$expiretime";
$md5 = md5($rules . $secret);
$link = "http://tenable.cachefly.net/Protected/$rules/$md5/$filepath";

//For debug purposes, you can print the link
//print "Link is $link";

//Redirect user to the CacheFly link
header("Location: $link");
?>
