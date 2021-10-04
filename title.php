<?php
	$configs = include('config.php');
	$url     = $configs['pterodactyl_url'] . "/api/client/servers/" . $configs['server_id'];
	$curl    = curl_init($url);
	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	$headers = array(
		"Authorization: Bearer " . $configs['pterodactyl_client_api']
	);
	curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

	$resp = curl_exec($curl);
	curl_close($curl);
	$resp_data = json_decode($resp, true);
	echo $resp_data['attributes']['name'];

?>