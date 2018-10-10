<?php

  $curl = curl_init();

  $task_id = isset( $_POST['task_id'] ) ? $_POST['task_id'] : '';

  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://app.asana.com/api/1.0/tasks/" . $task_id,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "PUT",
    CURLOPT_POSTFIELDS => "completed=true",
    CURLOPT_HTTPHEADER => array(
      "Authorization: Bearer 0/819fdfd42b56bb6376ae1c6778770180"
    ),
  ));

  $response = curl_exec($curl);
  $err = curl_error($curl);

  curl_close($curl);

  if ($err) {
    echo "cURL Error #:" . $err;
  } else {
    echo $response;
  }
?>