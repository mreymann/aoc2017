#!/usr/bin/php
<?php
error_reporting( -1 );
$file = trim( file_get_contents( '6_1.in' ) );
preg_match_all( '|\d+|', $file, $matches );
$banks = $matches[0];
$states = array();
$nrofbanks = count( $banks );
$cycle = 1;
while ( true ) {
	$max = max( $banks );
	$key = array_search( $max, $banks );
	$banks[$key] = 0;
	$j = $key;
	for ( $i = 0; $i < $max; $i++ ) {
		$j++;
		if ( $j > $nrofbanks - 1 ) $j = 0;
		$banks[$j] += 1;
	}
	if ( in_array( $banks, $states ) ) {
		echo "known configuration seen after $cycle cycles\n";
		break;
	}
	$states[] = $banks;
	$cycle++;
}
$first_occ = array_search( $banks, $states );
$inside = ( $cycle - 1 ) - $first_occ;
echo "steps inside loop: $inside\n";
