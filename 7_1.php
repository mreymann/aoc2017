#!/usr/bin/php
<?php
error_reporting( -1 );
$lines = file( '7_1.in', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES );
$towers = array();
$disks = array();
foreach ( $lines as $line_num => $line ) {
	preg_match_all( '|^(\w+) \(\d+\) -> (.*?)$|', $line, $matches );
	if ( $matches[1] ) $towers[] = $matches[1][0];
	if ( $matches[2] ) {
		foreach ( explode( ", ", $matches[2][0] ) as $disk ) {
			$disks[] = $disk;
		}
	}
}
foreach ( $towers as $tower ) {
	if ( ! in_array( $tower, $disks ) ) {
		echo "bottom: $tower\n";
		exit;
	}
}
