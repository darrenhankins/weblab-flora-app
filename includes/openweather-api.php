<?php

	function request($url, $form, $type){
		  $ch = curl_init($url);
		  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $type);
		  if ($type="POST"){
		    $data_string = json_encode($form);
		    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		        'Content-Type: application/json',
		        'Content-Length: ' . strlen($data_string))
		    );
		    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
		  }
		  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		  $result = curl_exec($ch);
		  
		  return json_decode( $result );
	}

?>