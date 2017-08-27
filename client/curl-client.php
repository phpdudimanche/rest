<?php // curl-client.php
print("curl lib client");

require_once(__DIR__.'/../test/params.php');
global $base;// params

echo "<br /><br />----------- C <br />";
//---- CREATE -------------
$url = $base."rest/issues/";
$data = array("title" => "what is it","description" => "bug");
$data_string = json_encode($data);

$curl=curl_init($url);
curl_setopt_array($curl, array(
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $data_string,
    CURLOPT_HEADER => false,/* display response header or not */
    CURLOPT_HTTPHEADER => array('Content-Type:application/json', 'Accept:application/json','Content-Length: ' . strlen($data_string)))
);
$result = curl_exec($curl);
echo $result;
curl_close($curl);

echo "<br /><br />----------- R <br />";
//---- RETRIEVE -------------
$url = $base."/issues/1234";

$curl=curl_init($url);
curl_setopt_array($curl, array(
	CURLOPT_CUSTOMREQUEST => "GET"
	)
);
$result = curl_exec($curl);
echo $result;
curl_close($curl);

echo "<br /><br />----------- U <br />";
//---- UPDATE -------------
$url =$base."issues/49678";
$data = array("title" => "what is it","description" => "bug");
$data = json_encode($data);
$headers= array('Content-Type:application/json', 'Content-Length: ' . strlen($data));
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
	$result = curl_exec($curl);
	echo $result;
	curl_close($curl);

echo "<br /><br />----------- D <br />";
//---- DELETE -------------
$url = $base."issues/1234";
$headers= array('Accept:application/json');

$curl=curl_init($url);
curl_setopt_array($curl, array(
	CURLOPT_CUSTOMREQUEST => "DELETE",
	CURLOPT_HTTPHEADER => $headers
	)
);
$result = curl_exec($curl);
echo $result;
curl_close($curl);

?>
