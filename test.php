<?php

ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);
$file=file_get_contents('./creed.txt', true);

function chop_text($text,$max_len=136) {
	return explode("\n", wordwrap($text, $max_len, "\n"));
}

function max_len( $text_len, $max_len = 136, $n = 1 ) {
	if ( $text_len < $max_len )
		return $max_len;
	if ( $text_len/$max_len > $n )
		return max_len( $text_len, $max_len-2, $n*10 );
	else
		return $max_len;
}

echo "\nTweet contents:\n";
print_r(chop_text($file));
echo "Chunk length: ".max_len( strlen($file))."\n";