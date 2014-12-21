<?php
$data = '{
"jsonrpc": "2.0",
"method": "spectrum.paws.getSpectrum",
"apiVersion": "v1explorer",
"params": {
"type": "AVAIL_SPECTRUM_REQ",
"version": "1.0",
"deviceDesc": { "serialNumber": "your_serial_number", "fccId": "TEST", "fccTvbdDeviceType": "MODE_1" },
"location": { "point": { "center": {"latitude":37.210286, "longitude": -108.507813 }  }  }, 
"antenna": { "height": 30.0, "heightType": "AGL" },
"owner": { "owner": { } },
"capabilities": { "frequencyRanges": [{ "startHz": 800000000, "stopHz": 850000000 }, { "startHz": 900000000, "stopHz": 950000000 }] },
"key": "AIzaSyAzPFUygHFwOfoU8uzDtSma0sHgoFtRIU4"
},
"id": "any_string"
}';
$ch = curl_init ("https://www.googleapis.com/rpc");
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt ($ch, CURLOPT_HTTPHEADER, array ("Content-Type: application/json"));
curl_setopt($ch, CURLOPT_HEADER, true);
//GZIP// curl_setopt($ch, CURLOPT_ENCODING , "gzip"); 
curl_setopt ($ch, CURLOPT_POST, 1);
curl_setopt ($ch, CURLOPT_POSTFIELDS, $data);
$result = curl_exec ($ch);
curl_close ($ch);
$myfile = fopen("newfile.txt", "a") or die("Unable to open file!");
fwrite($myfile, $result);
echo $result;
?>