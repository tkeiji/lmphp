<?php
	$today = new DateTime();
	print('Current Time = ');
    print( $today->format('Y/m/d H:i:s') );	
	print('<br>');
    print('-----<br>');
	$bustimearray = array();
	
	function readf( $filename ){
		global $today;
		global $bustimearray;
		$fp = fopen( $filename, "r");
		while ( !feof($fp) ){
    		$line = fgets($fp);
    		$stime = split(" ", $line);
    		foreach( $stime as $eachtime){
    			$stime = split(":", $eachtime);
				$bustime = clone $today;
    			$bustime->setTime($stime[0], $stime[1], 0);
    			array_push($bustimearray, $bustime);
    		} // foreach
    	} // while
	} // function
		
	$i=0;
	readf( 'regbustable.txt' );
	readf( 'twinbustable.txt' );

	asort( $bustimearray );

	$next = false;
	foreach( $bustimearray as $eachbustime ){
		$diff = $today->getTimestamp()- $eachbustime->getTimestamp();
		$diff = $diff / 60;
		
		if ( ($diff <=  10) &&  ($diff >= -30)  ){
			if( $next == false ){
				if( $today < $eachbustime ){
					$next = true;
					print("---NOW---<br>");
				} //if 
			}//if
			echo $eachbustime->format(' H:i:s');
			print("<br>");
		} //if
	} //foreach

    fclose($fp);

?>
