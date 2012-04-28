<?php
	$today = new DateTime();
	print('Current Time = ');
    print( $today->format('Y/m/d H:i:s') );	
	print('<br>');
	$bustime = $today;
    print('--reg bus--<br>');
	$fp = fopen("regbustable.txt", "r");
    while ( !feof($fp) ){
    	$line = fgets($fp);
    	$stime = split(" ", $line);
    	foreach( $stime as $eachtime){
    		$stime = split(":", $eachtime);
    		print("Hour = $stime[0], Min = $stime[1]"); 
    		print ( "<br>" );
    		$bustime->setTime($stime[0], $stime[1], 0);
    		print("bustime= $bustime->format('H:i:s')<br>");
    	}
    }

    fclose($fp);    
?>

