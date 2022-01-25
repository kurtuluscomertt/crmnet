<?php 


  ## BAĞLANTI YAPIYORUZ
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "stok";
  try {
      $db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $db->query("SET NAMES 'utf8'");
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
    }
  catch(PDOException $e)
    {
      echo "Bağlantı Hatası: " . $e->getMessage();
    }
    







if($_POST){
 
 if ($_FILES["resim"]["size"]<1024*1024){//Dosya boyutu  aldık ve 1Mb'tan az olmasını söyledik.

     if ($_FILES["resim"]["type"]=="image/png"){  //Dosya tipi aldık ve sadece jpeg olmasını söyledik.

         $aciklama    =     $_POST["resimaciklama"];  //Post ile gelen resimaciklamayı aciklama değişkenine atadık.
         $dosya_adi   =    $_FILES["resim"]["name"];  //Dsoya adını aldık.

         //Resimi kayıt ederken yeni bir isim oluşturalım
         $uret=array("cv","fg","th","lu","er");
         $uzanti=substr($dosya_adi,-4,4);
         $sayi_tut=rand(1,10000);

         $yeni_ad= $_POST["resimaciklama"].$uzanti;

         //Dosya yeni adıyla yuklenenresimler klasörüne kaydedilecek

         if (move_uploaded_file($_FILES["resim"]["tmp_name"],$yeni_ad)){
             echo 'Dosya başarıyla yüklendi.';

             //Bilgileri veritabanına kayıt ediyoruz..

         $sorgu = $db->prepare("INSERT INTO resimyukleme SET resim=:resim,aciklama=:aciklama");
         $sorgu->execute(array(':resim'=> $yeni_ad,':aciklama'=>$aciklama));
         if($sorgu){
             echo 'Veritabanına kaydedildi.';
         }else{
             echo 'Kayıt sırasında bir sorun oluştu!';
         }
     }else{
         echo 'Dosya Yüklenemedi!';
     }
 }else{
     echo 'Dosya yalnızca jpeg formatında olabilir!';
 }
 }else{          
     echo 'Dosya boyutu 1 Mb ı geçmemeli!';
 }
}

?>