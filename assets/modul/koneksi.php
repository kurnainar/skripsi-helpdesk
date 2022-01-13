<?php
        error_reporting(0);
        $koneksi = mysql_connect("localhost","root","") or die("Koneksi Gagal !" . mysql_error());
        if($koneksi) echo "Koneksi Berhasil";
        mysql_close($koneksi);
?>