#!/usr/bin/php
<?php
error_reporting( -1 );
$checksum = 0;
$lines  = file( '2_1.in', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES );
foreach ( $lines as $line_num => $line ) {
	preg_match_all( '|\d+|', $line, $matches );
	$checksum += max( $matches[0] ) - min( $matches[0] );
}
echo $checksum . "\n";
