<?php // http-client.php
print("pure rest http client");

require_once(__DIR__.'/../test/params.php');
global $base;// params

echo "<br /><br />----------- C <br />";
//----- CREATE -----
$url=$base."rest/issues/";

$opts = array(
           'http'=>array(
                   'method'=>'POST',
                   'header'=>array('Content-type: application/x-www-form-urlencoded','Accept: application/json')
                )// 
);
$opts['http']['content'] = json_encode(array('title'=>'test','description'=>'here'));

$context = stream_context_create($opts); 

//$content = file_get_contents($url,false,$context);// without output
if (($stream = fopen($url, 'r', false, $context)) !== false){
   $content = stream_get_contents($stream);
   $header = stream_get_meta_data($stream);
   fclose($stream);
}
print($content);

echo "<br /><br />----------- R <br />";
//----- RETRIEVE ----
$url = $base."rest/issues/5467";
$content=file_get_contents($url);
print($content);
// echo "<br />title : ".$content->title."<br />";// KO, not object
$content=json_decode($content);
print_r($content);

echo "<br /><br />----------- U <br />";
//----- UPDATE ----
$url=$base."issues/54673";

$opts = array(
           'http'=>array(
                   'method'=>'PUT',
                   'header'=>array('Content-type: application/json','Accept: application/json')
                )// 
);
$opts['http']['content'] = json_encode(array('title'=>'update test','description'=>'new desc'));

$context = stream_context_create($opts);

if (($stream = fopen($url, 'r', false, $context)) !== false){
   $content = stream_get_contents($stream);
   $header = stream_get_meta_data($stream);
   fclose($stream);
}
print($content);

echo "<br /><br />----------- D <br />";
//----- DELETE ----
$url=$base."issues/54673";

$opts = array(
           'http'=>array(
                   'method'=>'DELETE',
                   'header'=>array('Content-type: application/x-www-form-urlencoded','Accept: application/json')
                )// 
);
//$opts['http']['content'] = json_encode(array('title'=>'update test','description'=>'new desc'));

$context = stream_context_create($opts);

if (($stream = fopen($url, 'r', false, $context)) !== false){
   $content = stream_get_contents($stream);
   $header = stream_get_meta_data($stream);
   fclose($stream);
}
print($content);

?>