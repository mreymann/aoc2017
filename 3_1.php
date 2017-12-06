#!/usr/bin/php
<?php
error_reporting( -1 );
$end = 347991;
$a = array(); # map
$x = 0; # x coord
$y = 0; # y coord
$a[0][0] = 1;
$i = 1;

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
	global $a, $x, $y, $i, $end;
	$i++; # step
	if ( $i == $end ) {
		echo "steps: ", abs( $x ) + abs( $y ) . "\n";
		echo "coord: $x,$y\n";
		exit;
	}
	$a[$x][$y] = $i; # set mark
	return;
}
