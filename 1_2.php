#!/usr/bin/php
<?php
error_reporting( -1 );
$file = trim( file_get_contents( '1_1.in' ) );
$len = strlen( $file );
$step = $len / 2;
$sum = 0;
$i = 0;
for ( $j = 0; $j < $len; $j++ ) {
	$c1 = $file[$i];
	$k = ( $i + $step ) % $len;
	$c2 = $file[$k];
	$i++; 
	if ( $c1 == $c2 ) $sum += $c1;
}
echo "sum: $sum\n";
