<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>T.C Kimlik No Sorgulama</title>
</head>
<body>
 


<?php


		$ad = strtoupper($_POST["ad"]);
    	$soyad = strtoupper($_POST["soyad"]);
    	$dogum_yili = trim($_POST["dogum_tarih"]);
    	$tc_no = trim($_POST["tcno"]);
    	settype($tc_no, "double");


		
try{

		$client=new SoapClient("https://tckimlik.nvi.gov.tr/Service/KPSPublic.asmx?WSDL");

				$postdata=array(
				'TCKimlikNo'=>$tc_no,
				'Ad'=>$ad,
				'Soyad'=>$soyad,
				'DogumYili'=> $dogum_yili
				);

			
				$sonuc=$client->TCKimlikNoDogrula($postdata);

				 if ($sonuc->TCKimlikNoDogrulaResult){
            echo 'T.C numarası doğru';
        }else {
            echo ' T.C numarası yanlış';
        }
 
    }

    catch (Exception $hata){
        echo '! T.C numarası bulunmamaktadır...';
    }

				 


?>

 
</body>
</html>