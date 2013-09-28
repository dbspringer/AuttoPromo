<?php

ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

$sample = "Automattic Creed\nI will never stop learning. I won’t just work on things that are assigned to me. I know there’s no such thing as a status quo. I will build our business sustainably through passionate and loyal customers. I will never pass up an opportunity to help out a colleague, and I’ll remember the days before I knew everything. I am more motivated by impact than money, and I know that Open Source is one of the most powerful ideas of our generation. I will communicate as much as possible, because it’s the oxygen of a distributed company. I am in a marathon, not a sprint, and no matter how far away the goal is, the only way to get there is by putting one foot in front of another every day. Given time, there is no problem that’s insurmountable.";
$output = chop_text($sample);
print_r($output);

function chop_text($text) {
	return array();
}

function max_len($text) {
	$start_len = 136;
	$string_len = strlen($text);
	$chunk_count =  $string_len / $start_len;
	echo strlen($text).' characters, '.ceil($chunk_count).' tweets'."\n";
	echo $start_len.' characters max'."\n";
	return $start_len;

}

max_len($sample);



