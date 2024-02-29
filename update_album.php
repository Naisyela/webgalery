<?php
include "koneksi.php";
session_start();

$albumid=$_POST['albumis'];
$namaalbum=$_POST['namaalbum'];
$deskripsi=$_POST['deskripsi'];

$sqli_query($conn, "update album set nama album='$namaalbum',deskripsi='$deskripsi','where album");

header("location:album");
?>