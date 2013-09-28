<?php

ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

function chop_text($text) {
	return explode("\n", wordwrap($text, 136, "\n"));
}

function max_len($text, $chunk_len=136) {
	$chunk_count =  count(chop_text($text));
	echo $chunk_count.' chunks'."\n";
	echo ceil(log10($chunk_count)).' digits in the chunk count'."\n";
	if($chunk_count>9) {
		$chunk_len = $chunk_len-2;
		$chunk_count =  ceil($string_len / $chunk_len);
		echo ceil($chunk_count).' chunks'."\n";
	}
	if($chunk_count>99) {
		$chunk_len = $chunk_len-2;
		$chunk_count =  ceil($string_len / $chunk_len);
		echo ceil($chunk_count).' chunks'."\n";
	}
	echo $chunk_len.' chunk length'."\n";
	return $chunk_len;
}


function recursive_max_len($text,$max_len=136,$n=1) {
  if (count(chop_text($text))/$max_len<$n) { // our base case
     return $max_len;
  }
  else {
     return recursive_max_len($text,$max_len-2,$n*10); // <--calling itself.
  }
}

echo "\n".'Our sample text:'."\n";
print_r(chop_text(file_get_contents('./KJV.txt', true)));
max_len(file_get_contents('./KJV.txt', true));
echo recursive_max_len(file_get_contents('./KJV.txt', true)).' is the recursive max length'."\n";

// echo "\n".'The King James Version of the Bible:'."\n";
// max_len(file_get_contents('./KJV.txt', true));


