#!/usr/bin/php
<?php
error_reporting( -1 );
$file = trim( file_get_contents( '13_1.in' ) );
preg_match_all( '|(\d+): (\d+)|', $file, $matches );
$states = array_combine( $matches[1], $matches[2] );
$positions = array_fill_keys( $matches[1], 0 );
$dirs = array_fill_keys( $matches[1], 1 );
$severity = 0;
$max_steps = max( $matches[1] );
for ( $j = 0; $j <= $max_steps; $j++ ) {
	for ( $i = 0; $i <= $max_steps; $i++ ) {
		if ( isset( $states[$i] ) ) {
			if ( isset( $positions[$j] ) ) {
				if ( $i == 0 && $positions[$j] == 0 ) $severity += $j * $states[$j];
			}
			$positions[$i] += $dirs[$i];
			if ( $positions[$i] <= 0 || $positions[$i] >= $states[$i] -1 ) $dirs[$i] *= -1;
		}
	}
}
echo "severity: $severity\n";
