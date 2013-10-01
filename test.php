<?php

ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

function max_len( $text_len, $max_len = 136, $n = 1 ) {
	// returns max length a chunk can have given # of total posts
	if ( $text_len < $max_len )
		return $max_len;
	if ( $text_len/$max_len > $n )
		return max_len( $text_len, $max_len-2, $n*10 );
	else
		return $max_len;
	}

	function chop_text($text,$max_len) {
	// returns an array containing the different chunks
		return explode("\n", wordwrap($text, $max_len, "\n"));
	}

	function append_counts($array,$how_many) {
	// returns an array that adds chunks counts to each chunk
		$chunks_to_send = array();
		$counter=1;
		foreach ($array as $value) {
			$chunks_to_send[]= "$value $counter/$how_many";
		    $counter++;
		}
		return $chunks_to_send;
	}

	function parse_post ($raw_post) {
	// takes a post text and returns an array of chunks ready for tweeting or posting
		$chunk_length=max_len( strlen($raw_post));
		$chunk_count=count(chop_text($raw_post,$chunk_length));
		return append_counts(chop_text($raw_post,$chunk_length),$chunk_count);

	}

print_r(parse_post(file_get_contents('./creed.txt', true)));

?>