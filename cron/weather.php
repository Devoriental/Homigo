<?php
		//$path="http://www.foreca.com/Bangladesh/Sylhet";
		$path="http://www.foreca.com/Bangladesh/Sylhet?quick_units=metric&tf=24h&lang=en";
        $ch = curl_init($path);
        curl_setopt($ch,CURLOPT_FOLLOWLOCATION, true);
        
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $chres=curl_exec($ch);
        curl_close($ch);
        
        $datas=explode("\n", $chres);
		//print_r($datas);
		  $fp = fopen('dataweather.txt', 'w');
		fwrite($fp, $chres);
		fclose($fp);  
		
		//$link = mysql_connect('localhost', 'root', '');
		$link = mysql_connect('localhost', 'ruperban_sylhet3', 'avijit123');
		if (!$link) {
			die('Not connected : ' . mysql_error());
		}

		// make foo the current db
		$db_selected = mysql_select_db('ruperban_sylhet360', $link);
		if (!$db_selected) {
			die ('Can\'t use foo : ' . mysql_error());
		} 
		
		 $fp = fopen('dataweather.txt', 'r');
		fwrite($fp, $chres);
		$contents = fread($fp, filesize('dataweather.txt'));
		fclose($fp);
		 $datas=explode("\n", $contents);
		 mysql_query("update other set description='' where subject='weather'");
		 $i=0;
        while ($i<=count($datas)){
			$theline= $datas[$i++];
            $pattern = "/Current conditions/";
            preg_match($pattern, $theline, $matches, PREG_OFFSET_CAPTURE);
			if(count($matches)>0){
			
				$j=$i+9;
				$k=0;
				while ($j<=$i+20){
					 //echo $j;
					
						
					//$lines=explode('<td>',$datas[$j++]);
					echo $datas[$j];
					if(trim(strip_tags($datas[$j]))!=''){
						//echo strip_tags($datas[$j]);
						//echo $j; echo  $datas[$j]."<br>";
						$weather.=trim(strip_tags($datas[$j]))."<br>";
						//echo  $cname=trim(strip_tags($lines[0]));
						//echo  $buy=strip_tags($lines[1]);
						//echo  $sell=strip_tags($lines[2]);
						
					}
					//echo count($lines[0]);
					//$pattern = "/Currency/";
					//preg_match($pattern, $theline, $matches, PREG_OFFSET_CAPTURE);
					//echo "<br>";
					 $j++;
			   }
                
				
				
                break;
            }
			
		}	
		echo $weather;
		//echo "update  other set description ='$weather' where subject='weather'";
		mysql_query("update  other set description ='$weather' where subject='weather'");
		echo mysql_affected_rows();
		
?>		
        