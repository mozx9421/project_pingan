<?php
//-----เชื่อมต่อฐานข้อมูล-----
$host = "localhost"; // ชื่อ host
$username = "root"; // ชื่อ user ที่ใช้ในการ login
$password = ""; // ชื่อ password ที่ใช้ในการ login
$dbname = "backend_db"; // ชื่อ database

//-----คำสั่ง connect-----
$conn = mysqli_connect($host,$username,$password,$dbname) or die("ไม่สามารถเชื่อมต่อฐานข้อมูลได้"); //คำสั่งเชื่อมต่อฐานข้อมูล
mysqli_query($conn, 'set names utf8'); //กำหนด charset ให้ฐานช้อมูล เพื่ออ่านภาษาไทยได้
?>