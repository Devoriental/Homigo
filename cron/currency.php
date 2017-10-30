<?php
		$path="http://www.rupalibank.org/";
        $ch = curl_init($path);
        curl_setopt($ch,CURLOPT_FOLLOWLOCATION, true);
        
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $chres=curl_exec($ch);
        curl_close($ch);
        
        $datas=explode("\n", $chres);
		//print_r($datas);
		count($datas);
		/*$fp = fopen('data.txt', 'w');
		fwrite($fp, $chres);
		fclose($fp); 
		 */
		//$link = mysql_connect('localhost', 'root', '');
		$link = mysql_connect('localhost', 'ruperban_sylhet3', 'avijit123');
		if (!$link) {
			die('Not connected : ' . mysql_error());
		}

		// make foo the current db
		$db_selected = mysql_select_db('ruperban_sylhet360', $link);
		if (!$db_selected) {
			die ('Can\'t use ruperban_sylhet360 : ' . mysql_error());
		} 
		
		
		/* $fp = fopen('data.txt', 'r');
		fwrite($fp, $chres);
		$contents = fread($fp, filesize('data.txt'));
		fclose($fp);
		 $datas=explode("\n", $contents); */
		mysql_query("delete from currency");
		$i=100;
        while ($i<=count($datas)){
            $theline= $datas[$i++];
            $pattern = "/Currency/";
            preg_match($pattern, $theline, $matches, PREG_OFFSET_CAPTURE);
			if(count($matches)>0){
				$j=$i;
				$k=0;
				while ($j<=$i+390){
					//$ab=explode(' ',$theline);
					//$abc=explode('"',$ab[10]);
					//echo $abc[1]; echo "<br>";
					 
					//echo $datas[$j++];
						
					$lines=explode('<td>',$datas[$j++]);
					if(strip_tags($lines[0])!=''){ echo $k=$k+1;
						echo  $cname=trim(strip_tags($lines[0]));
						echo  $buy=strip_tags($lines[1]);
						echo  $sell=strip_tags($lines[2]);
						mysql_query("insert into currency set currency_name='$cname',buy=$buy,sell=$sell");
					}
					//echo count($lines[0]);
					//$pattern = "/Currency/";
					//preg_match($pattern, $theline, $matches, PREG_OFFSET_CAPTURE);
					echo "<br>";
					 
			   }
                break;
            }
			
		}	
		
		
?>		
        