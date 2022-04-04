<?php

function onesignalNotification($sendData)
{
		
	$content = array(
	   "en" => $sendData['body']
	   );
	
	$headings = array(
	   "en" => $sendData['title']
	   );
	
	$big_picture = array(
	   "id1" => $sendData['image']
	   );
	
	$fields = array(
	   'app_id' => 'd01054f7-d601-44d5-bc13-769bf0f2989a',
	   'filters' => array(array("field" => "tag", "key" => "subscribed", "relation" => "=", "value" => "true")),
	   'contents' => $content,
	   'headings' => $headings,
	   'big_picture' => $sendData['image'],
	   // 'large_icon' => asset('storage') . '/' . getConfiguration('site_logo'),
	   'data' => array('product_id' => $sendData['id'], 'type' => 'product'),
	   'priority' => 10
	);

	$fields = json_encode($fields);

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
			   'Authorization: Basic MmRlYWNlNWQtOWQ5Zi00N2JmLTllOTUtN2NmZmQ5YzIwY2Zm'));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	curl_setopt($ch, CURLOPT_HEADER, FALSE);
	curl_setopt($ch, CURLOPT_POST, TRUE);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

	$result = curl_exec($ch);
	$data = json_decode($result);
	curl_close($ch);
	
	if(!empty($data->recipients) and $data->recipients >= 1){
		$response = '1';
	}else{
		$response = '0';	
	}	
	
	return $response;
	
}

function onesignalNotificationToSpecificUser($sendData, $user_id)
{
		
	$content = array(
	   "en" => $sendData['body']
	   );
	
	$headings = array(
	   "en" => $sendData['title']
	   );
	
	$fields = array(
	   'app_id' => 'd01054f7-d601-44d5-bc13-769bf0f2989a',
	   'include_external_user_ids' => array(strval($user_id)),
	   'contents' => $content,
	   'headings' => $headings,
	   // 'large_icon' => asset('storage') . '/' . getConfiguration('site_logo'),
	   'data' => array('user_id' => $sendData['user_id'], 'type' => 'friend-request'),
	   'priority' => 10
	);

	$fields = json_encode($fields);

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
			   'Authorization: Basic MmRlYWNlNWQtOWQ5Zi00N2JmLTllOTUtN2NmZmQ5YzIwY2Zm'));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	curl_setopt($ch, CURLOPT_HEADER, FALSE);
	curl_setopt($ch, CURLOPT_POST, TRUE);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

	$result = curl_exec($ch);
	$data = json_decode($result);
	curl_close($ch);
	
	if(!empty($data->recipients) and $data->recipients >= 1){
		$response = '1';
	}else{
		$response = '0';	
	}	
	
	return $response;
	
}