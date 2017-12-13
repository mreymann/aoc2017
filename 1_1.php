#!/usr/bin/php
<?php
error_reporting( -1 );
$file = trim( file_get_contents( '1_1.in' ) );
$sum = 0;
$i = 0;
for ( $j = 0; $j < strlen( $file ); $j++ ) {
	$c = $file[$i];
	$i++; 
	if ( $i == strlen( $file ) ) $i = 0;
	if ( $c == $file[$i] ) $sum += $c;
}
echo "sum: $sum\n";
