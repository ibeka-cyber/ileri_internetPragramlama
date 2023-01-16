<?php
	$sunucu_adi="localhost";
	$kullanici_adi="root";
	$sifre="";
	$veri_tabani="ibk_ara_sinav";

	$baglanti=new mysqli($sunucu_adi,$kullanici_adi,$sifre,$veri_tabani,3306);
	if($baglanti->connect_error)
		die("Bağlantı sağlanamadı: ".$baglanti->connect_error);
	else
		echo "Veri tabanına bağlanıldı.";

?>