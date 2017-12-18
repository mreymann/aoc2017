#!/usr/bin/php
<?php
error_reporting( -1 );
$lines = file( '8_1.in', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES );
foreach ( $lines as $line_num => $line ) {
	preg_match_all( '#^(\w+) (inc|dec) ([-0-9]+) if ((.*?) .*?)$#', $line, $matches );
	$op = ( $matches[2][0] == "inc" ) ? "+=" : "-=";
	$v1 = $matches[1][0];
	$v2 = $matches[5][0];
	if ( ! isset( $$v1 ) ) {
		$$v1 = 0;
		$vars[] = $v1;
	}
	if ( ! isset( $$v2 ) ) {
		$$v2 = 0;
		$vars[] = $v2;
	}
	eval( "if ( $" . $matches[4][0] . " ) $" . $v1 . " " . $op . " " . $matches[3][0] . ";" );
}
$x = [];
foreach ( $vars as $var ) {
	$x[$var] = $$var;
}
echo max( $x );
