<?
$json = file_get_contents("json/module.json");
$datajson = json_decode($json, TRUE);
 $data=[];
 $data["module"]=$datajson;
foreach ($datajson["modules"] as $key => $value) {
   $json = file_get_contents("json/".$value["title"].".json");
   $data2 = json_decode($json, TRUE);
   $data[$value["title"]]=$data2;
}

return $data;
