<?php
    include("baglan.php");
?>
<!Doctype html>
<html>
	<head>
	</head>
	<style>
	body{
		background-color:white;

	}
	h1{
		text-align:center;
		font-size:30px;
		color: steelblue;
	}
	form{
		margin:20px auto;
		width:320px;
		color:steelblue;
		width:320px;
		font-size:30px;
	}
	input{
		padding:10px;
		width:320px;
	}
	input[type="text"] {
		display:block;
		margin-bottom:25px;
		width:100%;
		border:2px solid steelblue;
	}
	input[type="password"] {
		display:block;
		margin-bottom:25px;
		width:100%;
		border:2px solid steelblue;
	}
	  
	
	</style>
	<body>
	<form action='' method='post'>
	<table border="2">
		<tr>
			<th>id</th>
			<th>Kullanıcı Adı</th>
			<th>Şifre</th>
			<th>Eposta</th>
			<th>Düzenle</th>
			<th>Sil</th>
			
		</tr>
	    	<?php
			if(isset($_POST["sil"])) {
				$sorgu="DELETE FROM `ibk_kullanici` WHERE `ibk_kullanici`.`id`= ".$_POST["silinecek"];
				$baglanti->query($sorgu);
			}
		$sorgu = "Select * from `ibk_kullanici`";
		$sonuc = $baglanti->query($sorgu);
	
		while($satir = $sonuc->fetch_assoc())
		{
		echo "<tr>";
		echo "<td>".$satir["id"]."</td>";
		echo "<td>".$satir["kullanici_adi"]."</td>";
		echo "<td>".$satir["sifre"]."</td>";
		echo "<td>".$satir["eposta"]."</td>";
		echo "<td>"."</td>";
		echo "<td>"."
			<input type='radio' name='silinecek' value='".$satir["id"]."'>
		"."</td>";
		 
		echo "</tr>";
		
		}
		?>
	
	</table>
	<input type='submit' name='sil' value='Seçileni Sil'>
	</form>
		<form action="" method="POST" enctype="multipart/form-data">
		<h1>KULLANICI KAYIT FORMU</h1>
		Kullanıcı Adı<input type="text" name="ibk_kullanici_adi" ><br>
		Şifre <input type="password" name="ibk_sifre" value=""><br>
		Eposta <input type="text" name="ibk_eposta"> <br>
		
		
		<input type="submit" value="Gönder" name="ibk_gonder">
		</form>
		<?php
		  if(isset($_POST["ibk_gonder"])) {
				}
			
			  
		  $sorgu="INSERT INTO `ibk_kullanici` (`id`, `kullanici_adi`, `sifre`, `eposta`)
		  VALUES (NULL, '".$_POST["ibk_kullanici_adi"]."', '".$_POST["ibk_sifre"]."', '".$_POST["ibk_eposta"]."')";
			if($baglanti->query($sorgu)===TRUE){
			echo "Kayıt başarıyla oluşturuldu";}
			else	
			{echo "Kayıt yapılırken hata: ".$baglanti->error;} 
			echo "<br>Kullanıcı Adı : ".$_POST["ibk_kullanici_adi"]."<br>";
			echo "Şifre : ".$_POST["ibk_sifre"]."<br>";
			echo "Eposta : ".$_POST["ibk_eposta"]."<br>";
		 	
			
		 
			
		 
		?>
			</body>
</html>