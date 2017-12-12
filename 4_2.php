#!/usr/bin/php
<?php
error_reporting( -1 );
$valid = 0;
$lines = file( '4_1.in', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES );
foreach ( $lines as $line_num => $line ) {
	preg_match_all( '|\w+|', $line, $matches );
	$sorted = array_map( "csort", $matches[0] ); 
	if ( count( array_unique( $sorted ) ) == count( $sorted ) ) $valid++;
}
echo "valid: $valid\n";

function csort( $string ) {
	$parts = str_split( $string );
	sort( $parts );
	return implode('', $parts); 
}
