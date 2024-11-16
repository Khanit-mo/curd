<?php
$host = 'localhost'; // ชื่อโฮสต์
$dbname = 'new_data'; // ชื่อฐานข้อมูล
$username = 'root'; // ชื่อผู้ใช้งาน (ค่าเริ่มต้น XAMPP คือ root)
$password = ''; // รหัสผ่าน (ค่าเริ่มต้น XAMPP ปล่อยว่าง)

try {
    // สร้างการเชื่อมต่อ PDO
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    // ตั้งค่า PDO ให้โยนข้อผิดพลาดในรูปแบบ Exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // แจ้งเตือนเมื่อเชื่อมต่อสำเร็จ (เฉพาะตอนทดสอบ)
    // echo "Connected successfully";
} catch (PDOException $e) {
    // แสดงข้อผิดพลาดหากเชื่อมต่อไม่สำเร็จ
    die("Connection failed: " . $e->getMessage());
}
?>
