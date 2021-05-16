<?php

function upload_gambar() {
    $namaFile = $_FILES['gambar']['name'];
   $ukuranFile = $_FILES['gambar']['size'];
   $error = $_FILES['gambar']['error'];
   $tmpName = $_FILES['gambar']['tmp_name'];

   // cek apakah tidak ada gambar yang di upload
   if($error === 4) {
       echo "
           <script>
               alert('pilih foto terlebih dahulu');

           </script>
       ";
       return false;
   }

   // cek apakah yang di upload gambar
   $extensifotoValid = ['jpg', 'jpeg', 'png'];
   $extensifoto = explode('.', $namaFile);
   $extensifoto = strtolower(end($extensifoto));
   if(!in_array($extensifoto, $extensifotoValid)) {
       echo "
           <script>
               alert('yang anda upload bukan foto');
           </script>
       ";
       return false;
   }

   // cek ukuran file gambar
   if($ukuranFile > 40943040) {
       echo "
           <script>
               alert('ukuran foto terlalu besar!');
           </script>
       ";
       return false;
   }
   // generate nama gambar baru
   $cakacakacak = uniqid(microtime(true));
   $namaFileBaru = $cakacakacak;
   $namaFileBaru .= '.';
   $namaFileBaru .= $extensifoto;

   // jika lolos pengecekan
   move_uploaded_file($tmpName, 'public/uploads/' . $namaFileBaru);
   return $namaFileBaru;
}

?>