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

echo "\nTweet contents:\n"; // for testing
print_r(chop_text($file)); // for testing
$chunk_length=max_len( strlen($file));
echo "Chunk length: ".$chunk_length."\n"; // for testing
$tweet_count=count(chop_text($file,$chunk_length));
echo "Tweet count: ".$tweet_count."\n"; // for testing

function append_counts($array) {
	$counter=1;
	$tweets_to_send = array();
	foreach (chop_text($file) as $value) {
		$tweets_to_send[]= "$value $counter/$tweet_count";
	    $counter++;
	}
}

print_r(append_counts(chop_text($file,$chunk_length)));
