function human_time($input_seconds, $rs=1, $normal=0, $mostrarD=0) { //$rs = muestra segundos // normal=1 deja h m s  como abreviaturas // mostrarD=1 muestra días
	$days		= floor($input_seconds / 86400);
	$remainder	= floor($input_seconds % 86400);
	$hours		= floor($remainder / 3600);
	$remainder	= floor($remainder % 3600);
	$minutes	= floor($remainder / 60);
	$seconds	= floor($remainder % 60);
	
		
		if($mostrarD>0){
					$hours	+= $days*24; 
							$days	= '';
						}else{
									$days	= ($days > 0)? 				$days .($normal==0?' días':'d') :'';
										}
		$hours		= ($hours > 0)? 			$hours.($normal==0?' horas':'h'):'';
		$minutes	= ($minutes > 0)?			$minutes.($normal==0?' min':'m'):'';
			$seconds	= ($seconds > 0 && $rs==1)? $seconds.($normal==0?' seg':'s'):'';
			return "$days $hours $minutes $seconds";
			}
