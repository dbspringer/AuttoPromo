<?php

ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

function chop_text($text,$max_len2=136) {
	return explode("\n", wordwrap($text, $max_len2, "\n"));
}

function max_len2( $text_len, $max_len = 136, $n = 1 ) {
	if($text_len < $max_len)
		return $max_len;
	if($text_len/$max_len > $n)
		return max_len2($text_len, $max_len-2, $n*10);
	else
		return $max_len;
}

echo "\n".'Tweet contents:'."\n";
print_r(chop_text(file_get_contents('./creed.txt', true)));
echo "Chunk length: ".max_len2( strlen(file_get_contents('./creed.txt', true)))."\n";