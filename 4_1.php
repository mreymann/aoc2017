#!/usr/bin/php
<?php
error_reporting( -1 );
$valid = 0;
$lines  = file( '4_1.in', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES );
foreach ( $lines as $line_num => $line ) {
	preg_match_all( '|\w+|', $line, $matches );
	if ( count( array_unique( $matches[0] ) ) == count( $matches[0] ) ) $valid++;
}
echo "valid: $valid\n";
