<?php

$url = "Resource?endpoint=pitching";
$url = "/about";

$pos = strpos($url, "?");

if($pos === false) {
	echo "false";
} else {
	$url = substr($url, 0, $pos);
	echo $url;
}

