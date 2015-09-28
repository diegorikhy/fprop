<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class My_date {


	/* 
	@ USO
	$this->my_date->datetime('data', 'justDate');
	*/
	public function datetime($datetime, $action)
	{

		if(empty($datetime) || $datetime == "0000-00-00 00:00:00")
		{
			return "-";
		}
		else{

			$datetime = explode(' ', $datetime);

			$datetime[0]; # DATE
			$datetime[1]; # TIME

			$date = explode('-', $datetime[0]); # $date[0] = AAAA  /  $date[1] = MM  /  $date[2] = DD  
			$time = explode(':', $datetime[1]); # $time[0] = HH  /  $time[1] = MM  /  $time[2] = SS 


			switch ($action) {
				case 'justDate':
					return $date[2] . '/' . $date[1] . '/' . $date[0];
					break;
				
				case 'justTime':
					return $time[0] . ':' . $time[1] . ':' . $time[2];
					break;
				
				case 'defaultDatetime':
					return $date[2] . '/' . $date[1] . '/' . $date[0] . ' ' . $time[0] . ':' . $time[1] . ':' . $time[2];
					break;

				case 'datetimeApart':
					return $date[2] . '/' . $date[1] . '/' . $date[0] . ' às ' . $time[0] . ':' . $time[1] . ':' . $time[2];
					break;

				case 'datetime_untilMinuts':
					return $date[2] . '/' . $date[1] . '/' . $date[0] . ' às ' . $time[0] . ':' . $time[1] ;
					break;

			}

		}



	}


	public function date($date, $action)
	{


		if(empty($date) || $date == "0000-00-00")
		{
			return "-";
		}
		else{

			$date2 = explode('-', $date); # $date[0] = AAAA  /  $date[1] = MM  /  $date[2] = DD  

			switch ($action) {
				case 'dataBrasileiro':
					return $date2[2] . '/' . $date2[1] . '/' . $date2[0];
					break;
	
			}

		}



	}




}


?>