#!/usr/bin/php
<?php
error_reporting( -1 );
$end = 347991;
$a = array(); # map
$x = 0; # x coord
$y = 0; # y coord
$a[0][0] = 1;

while ( true ) {
	do { 
		$x++; # move right
		step();
	} while ( isset( $a[$x][$y-1] ) );
	do { 
		$y--; # move up
		step();
	} while ( isset( $a[$x-1][$y] ) );
	do { 
		$x--; # move left
		step();
	} while ( isset( $a[$x][$y+1] ) );
	do { 
		$y++; # move down
		step();
	} while ( isset( $a[$x+1][$y] ) );
}

function step() {
	global $a, $x, $y, $end;
	$a[$x][$y] = scan(); # set value
	return;
}

function scan() {
	global $a, $x, $y, $end;
	$val = 0;
	if ( isset( $a[$x][$y-1] ) ) $val += $a[$x][$y-1];
	if ( isset( $a[$x][$y+1] ) ) $val += $a[$x][$y+1];
	if ( isset( $a[$x-1][$y] ) ) $val += $a[$x-1][$y];
	if ( isset( $a[$x+1][$y] ) ) $val += $a[$x+1][$y];
	if ( isset( $a[$x-1][$y-1] ) ) $val += $a[$x-1][$y-1];
	if ( isset( $a[$x+1][$y-1] ) ) $val += $a[$x+1][$y-1];
	if ( isset( $a[$x-1][$y+1] ) ) $val += $a[$x-1][$y+1];
	if ( isset( $a[$x+1][$y+1] ) ) $val += $a[$x+1][$y+1];
	if ( $val > $end ) {
		echo "value: $val\n";
		exit;
	}
	return $val;
}
