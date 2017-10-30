<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	//REDIRECT PAGE USING JAVASCRIPT
	/* function redirect($link)
	{
        echo "<script language=Javascript>
                document.location.href='".base_url()."$link';
                </script>";
	}
	 */
	function not_login_page()
	{
		return 'login';
	}
	
	function generate_captcha()
	{		
		$value=md5(rand(2,99999999));
		$vals = array(
					'word'		 => substr(md5($value),15,8),
					'img_path'	 => './captcha/',
					'img_url'	 => site_url().'captcha/',
					'img_width'	 => '200',
					'img_height' => 30,
					'expiration' => 7200
				);
		$arr=create_captcha($vals);
		return $arr;
	}
	function month_array()
	{		
		$vals = array('January','February','March','April','May','June','July','August','September','October','November','December');
		return $vals;
	}
	function country_array()
	{			
	
		$countries = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");
		 
	}
	function draw_calendar($month,$year){

		/* draw table */
		$calendar = '<table cellpadding="0" cellspacing="0" class="calendar">';

		/* table headings */
		$headings = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
		$calendar.= '<tr class="calendar-row"><td class="calendar-day-head">'.implode('</td><td class="calendar-day-head">',$headings).'</td></tr>';

		/* days and weeks vars now ... */
		$running_day = date('w',mktime(0,0,0,$month,1,$year));
		$days_in_month = date('t',mktime(0,0,0,$month,1,$year));
		$days_in_this_week = 1;
		$day_counter = 0;
		$dates_array = array();

		/* row for week one */
		$calendar.= '<tr class="calendar-row">';

		/* print "blank" days until the first of the current week */
		for($x = 0; $x < $running_day; $x++):
			$calendar.= '<td class="calendar-day-np"> </td>';
			$days_in_this_week++;
		endfor;

		/* keep going with days.... */
		for($list_day = 1; $list_day <= $days_in_month; $list_day++):
			$calendar.= '<td class="calendar-day">';
				/* add in the day number */
				$calendar.= '<div class="day-number">'.$list_day.'</div>';

				/** QUERY THE DATABASE FOR AN ENTRY FOR THIS DAY !!  IF MATCHES FOUND, PRINT THEM !! **/
				$calendar.= str_repeat('<p> </p>',2);
				
			$calendar.= '</td>';
			if($running_day == 6):
				$calendar.= '</tr>';
				if(($day_counter+1) != $days_in_month):
					$calendar.= '<tr class="calendar-row">';
				endif;
				$running_day = -1;
				$days_in_this_week = 0;
			endif;
			$days_in_this_week++; $running_day++; $day_counter++;
		endfor;

		/* finish the rest of the days in the week */
		if($days_in_this_week < 8):
			for($x = 1; $x <= (8 - $days_in_this_week); $x++):
				$calendar.= '<td class="calendar-day-np"> </td>';
			endfor;
		endif;

		/* final row */
		$calendar.= '</tr>';

		/* end the table */
		$calendar.= '</table>';
		
		/* all done, return result */
		return $calendar;
	}

	
	function chk_url($link)
	{
		if(strpos($link, 'http://')===false)
			return 'http://'.$link;
		else
			return $link;
	}
	
	function is_checked($cid,$data)
	{
		if (in_array($cid, $data)) {
				return "checked";
		}
	}
	function current_date()
	{
		return date("Y-m-d");
	}	

	function check_numeric($element)
	{
		if (is_numeric($element)) {
        	$abc='';	
    	} else {
        	 $abc= "'{$element}' is NOT numeric". PHP_EOL;
    	}
    	return $abc;
    }	
	
	///----------------------------------- Added by Manas ---------------------///
	 function show_date($sdate,$date_format="d F, Y")
	{
		$sdate=explode(" ",$sdate);
		$ndate=explode("-",$sdate[0]);
		//$date=date("d m,Y", mktime(0, 0, 0, $ndate[1], $ndate[2], $ndate[0])); 
		$date=date($date_format, mktime(0, 0, 0, $ndate[1], $ndate[2], $ndate[0])); 
		return $date;
	}
	function end_day($end_date,$nr_date)
	{
		return $nr_date;
	}
	
	function download($data)
	{
	   $data['link']=base_dir().'image/file/'.$data['link'];	
	   $fsize = filesize($data['link']);
	  
	  $mtype = '';
	  // mime type is not set, get from server settings
	  if (function_exists('mime_content_type')) {
		$mtype = mime_content_type($data['link']);
	  }
	  if ($mtype == '') {
		$mtype = "application/force-download";
	  }
	  header("Cache-Control: public");
	  header("Content-Description: File Transfer");
	  header("Content-Type: $mtype");
	  header("Content-disposition: attachment; filename=\"".$data['name']."\"");
	  header("Content-Transfer-Encoding: binary");
	  header("Content-Length: " . $fsize);
	  if(file_exists($data['link']))
		readfile($data['link']);
	}
	
	///----------------------------------- Ended by Manas ---------------------///
	
	///----------------------------------- Added by Avijit---------------------//
	
	
		function check_email($email)
		{
				$email_regexp = "^([-!#\$%&'*+./0-9=?A-Z^_`a-z{|}~])+@([-!#\$%&'*+/0-9=?A-Z^_`a-z{|}~]+\\.)+[a-zA-Z]{2,4}\$";
				return eregi($email_regexp, $email);
		}
		function get_date_time()
		{
				$date_time=date("Y-m-d h:i:s");
				return $date_time;
		}
		function mailing($to,$name,$from,$subj,$body)
		{
			global $SERVER_NAME;
			$subj=nl2br($subj);
			$body=nl2br($body);
			$recipient = $to;
			$headers = "From: " . "$name" . "<" . "$from" . ">\n";
			$headers .= "X-Sender: <" . "$to" . ">\n";
			$headers .= "Return-Path: <" . "$to" . ">\n";
			$headers .= "Error-To: <" . "$to" . ">\n";
			$headers .= "Content-Type: text/html\n";
			@mail("$recipient","$subj","$body","$headers");
		}
		
		

		function error_title($link)
		{
			echo "<script language=Javascript>
                document.location.href='".base_url()."errortitle/$link';
                </script>";
		}
		function get_date()
		{
			$date=date("Y-m-d");
			return $date;
		}

		function get_time()
		{
				$date=date("h:i:s");
				return $date;
		}

		function date_difference($date1,$date2)
		{
			$diff = abs(strtotime($date2) - strtotime($date1));

			$years = floor($diff / (365*60*60*24));
			$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
			$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
			//printf("%d years, %d months\n", $years, $months);			
			//printf("%d years, %d months, %d days\n", $years, $months, $days);			
			return $years.'-'.$months; 	
		}	

		//--------------------------End of Avijit code---------//
	
?>