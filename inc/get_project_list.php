<?php

// 453426989138720

$project_id = isset( $_GET['project'] ) ? $_GET['project'] : false;

$opt_fields = 'id,name,projects.name,completed';


if ( $project_id ) :

	$curl = curl_init();

	curl_setopt_array(
		$curl,
		array(
			CURLOPT_URL => "https://app.asana.com/api/1.0/projects/" . $project_id . "/tasks?opt_fields=" . $opt_fields,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
				"Authorization: Bearer 0/819fdfd42b56bb6376ae1c6778770180"
			),
		)
	);

	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);

	if ($err) :

	  echo "cURL Error #:" . $err;

	else :

		$response_json = json_decode($response, true);

		$project_tasks = $response_json['data'];

	endif;

endif;
// <!-- 0/819fdfd42b56bb6376ae1c6778770180 -->

?>