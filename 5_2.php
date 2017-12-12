#!/usr/bin/php
<?php
error_reporting( -1 );
$file = file_get_contents( '5_1.in' );
preg_match_all( '|[-0-9]+|', $file, $matches );
$addr = $matches[0];
$pos = 0;
$step = 0;
while ( isset( $addr[$pos] ) ) {
	$offset = $addr[$pos];
	$addr[$pos] += ( $offset >= 3 ) ? -1 : 1;
	$pos += $offset;
	$step++;
}
echo "steps: $step\n";
