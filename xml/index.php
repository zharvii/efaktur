<?php
$url = "http://svc.efaktur.pajak.go.id/validasi/faktur/029985207007000/0001918184347/3031300D060960864801650304020105000420CBD66E5C58099F208ECDF2915AA2DC1D6C0F39934FE3004402982F0523DB5158";
$xml = file_get_contents($url);
$data = new SimpleXMLElement($xml);
$json = json_encode($data); // convert the XML string to JSON
$array = json_decode($json,TRUE); // convert the JSON-encoded string to a PHP variable
 echo $array['detailTransaksi']['nama'];
