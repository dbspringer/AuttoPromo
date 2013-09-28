<?php

ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

$sample = "Automattic Creed\nI will never stop learning. I won’t just work on things that are assigned to me. I know there’s no such thing as a status quo. I will build our business sustainably through passionate and loyal customers. I will never pass up an opportunity to help out a colleague, and I’ll remember the days before I knew everything. I am more motivated by impact than money, and I know that Open Source is one of the most powerful ideas of our generation. I will communicate as much as possible, because it’s the oxygen of a distributed company. I am in a marathon, not a sprint, and no matter how far away the goal is, the only way to get there is by putting one foot in front of another every day. Given time, there is no problem that’s insurmountable. Automattic Creed\nI will never stop learning. I won’t just work on things that are assigned to me. I know there’s no such thing as a status quo. I will build our business sustainably through passionate and loyal customers. I will never pass up an opportunity to help out a colleague, and I’ll remember the days before I knew everything. I am more motivated by impact than money, and I know that Open Source is one of the most powerful ideas of our generation. I will communicate as much as possible, because it’s the oxygen of a distributed company. I am in a marathon, not a sprint, and no matter how far away the goal is, the only way to get there is by putting one foot in front of another every day. Given time, there is no problem that’s insurmountable. Automattic Creed\nI will never stop learning. I won’t just work on things that are assigned to me. I know there’s no such thing as a status quo. I will build our business sustainably through passionate and loyal customers. I will never pass up an opportunity to help out a colleague, and I’ll remember the days before I knew everything. I am more motivated by impact than money, and I know that Open Source is one of the most powerful ideas of our generation. I will communicate as much as possible, because it’s the oxygen of a distributed company. I am in a marathon, not a sprint, and no matter how far away the goal is, the only way to get there is by putting one foot in front of another every day. Given time, there is no problem that’s insurmountable. Automattic Creed\nI will never stop learning. I won’t just work on things that are assigned to me. I know there’s no such thing as a status quo. I will build our business sustainably through passionate and loyal customers. I will never pass up an opportunity to help out a colleague, and I’ll remember the days before I knew everything. I am more motivated by impact than money, and I know that Open Source is one of the most powerful ideas of our generation. I will communicate as much as possible, because it’s the oxygen of a distributed company. I am in a marathon, not a sprint, and no matter how far away the goal is, the only way to get there is by putting one foot in front of another every day. Given time, there is no problem that’s insurmountable. Automattic Creed\nI will never stop learning. I won’t just work on things that are assigned to me. I know there’s no such thing as a status quo. I will build our business sustainably through passionate and loyal customers. I will never pass up an opportunity to help out a colleague, and I’ll remember the days before I knew everything. I am more motivated by impact than money, and I know that Open Source is one of the most powerful ideas of our generation. I will communicate as much as possible, because it’s the oxygen of a distributed company. I am in a marathon, not a sprint, and no matter how far away the goal is, the only way to get there is by putting one foot in front of another every day. Given time, there is no problem that’s insurmountable. Automattic Creed\nI will never stop learning. I won’t just work on things that are assigned to me. I know there’s no such thing as a status quo. I will build our business sustainably through passionate and loyal customers. I will never pass up an opportunity to help out a colleague, and I’ll remember the days before I knew everything. I am more motivated by impact than money, and I know that Open Source is one of the most powerful ideas of our generation. I will communicate as much as possible, because it’s the oxygen of a distributed company. I am in a marathon, not a sprint, and no matter how far away the goal is, the only way to get there is by putting one foot in front of another every day. Given time, there is no problem that’s insurmountable. Automattic Creed\nI will never stop learning. I won’t just work on things that are assigned to me. I know there’s no such thing as a status quo. I will build our business sustainably through passionate and loyal customers. I will never pass up an opportunity to help out a colleague, and I’ll remember the days before I knew everything. I am more motivated by impact than money, and I know that Open Source is one of the most powerful ideas of our generation. I will communicate as much as possible, because it’s the oxygen of a distributed company. I am in a marathon, not a sprint, and no matter how far away the goal is, the only way to get there is by putting one foot in front of another every day. Given time, there is no problem that’s insurmountable. Automattic Creed\nI will never stop learning. I won’t just work on things that are assigned to me. I know there’s no such thing as a status quo. I will build our business sustainably through passionate and loyal customers. I will never pass up an opportunity to help out a colleague, and I’ll remember the days before I knew everything. I am more motivated by impact than money, and I know that Open Source is one of the most powerful ideas of our generation. I will communicate as much as possible, because it’s the oxygen of a distributed company. I am in a marathon, not a sprint, and no matter how far away the goal is, the only way to get there is by putting one foot in front of another every day. Given time, there is no problem that’s insurmountable.";
print_r($output);

function chop_text($text) {
	// return str_split($text, 136);
	return explode("\n", wordwrap($text, 136, "\n"));
}

function max_len($text) {
	$chunk_len = 136;
	$string_len = strlen($text);
	echo strlen($text).' characters'."\n";
	$chunk_count =  ceil($string_len / $chunk_len);
	echo ceil($chunk_count).' chunks'."\n";
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

max_len($sample);



