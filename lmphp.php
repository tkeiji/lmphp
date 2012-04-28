<?php
	$ctime = date("G:i");
	print('Current Time = ');
    print( $ctime );	
	print('<br>');
	
    print('--reg bus--');
	$fp = fopen("regbustable.txt", "r");
    while ( !feof($fp) ){
    	$line = fgets($fp);
    	$stime = split(" ", $line);
    	foreach( $stime as $eachtime){
    		$stime = split(":", $eachtime);
    		 
    		
    		
    		
    		print ( $eachtime );
    		print ( "<br>" );
    	}
    }

    fclose($fp);    
?>

