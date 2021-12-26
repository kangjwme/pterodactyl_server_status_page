<?php
	$configs = include('config.php');
    $url = $configs['pterodactyl_url']."/api/client/servers/".$configs['server_id']."/resources";
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $headers = array(
      "Authorization: Bearer ".$configs['pterodactyl_client_api'],
    );
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    
    $resp = curl_exec($curl);
    curl_close($curl);
    $status = json_decode(file_get_contents('https://api.mcsrvstat.us/2/'.$configs['server_ip']));
    $resp_data = json_decode($resp, true);
    
    if( $resp_data['attributes']['current_state'] == "offline" ) {
		echo '伺服器目前狀態：關閉</br></br>';
		}elseif ($resp_data['attributes']['current_state'] == "starting"){
		echo '伺服器目前狀態：開啟中</br></br>';
		}elseif ($resp_data['attributes']['current_state'] == "stopping"){
		echo '伺服器目前狀態：關閉中</br></br>';
		}else{
		echo '伺服器目前狀態：開啟</br><br />';
		foreach ($status->motd->html as $motd) {
		echo $motd.'<br />';
		}	
    }
	
    
    echo "<br /><i class=\"fas fa-microchip\"></i>",round($resp_data['attributes']['resources']['cpu_absolute'],2) ," %｜";
    echo "<i class=\"fas fa-memory\"></i>",round($resp_data['attributes']['resources']['memory_bytes']/ 1024 / 1024,2) ," MB｜";
    echo "<i class=\"fas fa-hdd\"></i>",round($resp_data['attributes']['resources']['disk_bytes']/ 1024 / 1024,2) ," MB｜";
    echo "<i class=\"fas fa-upload\"></i>",round($resp_data['attributes']['resources']['network_tx_bytes']/ 1024 / 1024,2) ," MB｜";
    echo "<i class=\"fas fa-download\"></i>",round($resp_data['attributes']['resources']['network_rx_bytes']/ 1024 / 1024,2) ," MB";
    
    
    date_default_timezone_set("Asia/Taipei");
    echo "</br></br><i class=\"fas fa-history\"></i>",date("Y-m-d h:i:s")," UTC+8";
    
?>
