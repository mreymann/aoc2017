#!/usr/bin/php
<?php
error_reporting( -1 );
$checksum = 0;
$lines  = file( '2_1.in', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES );
foreach ( $lines as $line ) {
	preg_match_all( '|\d+|', $line, $matches );
	foreach ( $matches[0] as $divisor ) {
		foreach ( $matches[0] as $dividend ) {
			if ( $dividend != $divisor && $dividend % $divisor == 0 ) {
				$checksum += $dividend / $divisor;
			}
		}
	}
}
echo $checksum . "\n";
