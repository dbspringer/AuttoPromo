<?php

$creed = "Automattic Creed\nI will never stop learning. I won’t just work on things that are assigned to me. I know there’s no such thing as a status quo. I will build our business sustainably through passionate and loyal customers. I will never pass up an opportunity to help out a colleague, and I’ll remember the days before I knew everything. I am more motivated by impact than money, and I know that Open Source is one of the most powerful ideas of our generation. I will communicate as much as possible, because it’s the oxygen of a distributed company. I am in a marathon, not a sprint, and no matter how far away the goal is, the only way to get there is by putting one foot in front of another every day. Given time, there is no problem that’s insurmountable.\n";
$creed = $creed . $creed . $creed . $creed;
echo max_len( strlen($creed) ) . "\n";

function max_len( $text_len, $max_len = 136, $n = 1 ) {
	if($text_len < $max_len)
		return $max_len;

	if($text_len/$max_len > $n)
		return max_len($text_len, $max_len-2, $n*10);
	else
		return $max_len;
}
