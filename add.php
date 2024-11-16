<?php
include 'config.php';

// ตรวจสอบการส่งแบบฟอร์ม
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $num = $_POST['num'];
    $home = $_POST['home'];
    $soy = $_POST['soy'];
    $tambon = $_POST['tambon'];
    $aum = $_POST['aum'];
    $jang = $_POST['jang'];
    $send_date = $_POST['send_date'];

    // Prepare the SQL statement using PDO
    $stmt = $conn->prepare("INSERT INTO sender (name, num, home, soy, tambon, aum, jang, send_date) 
                            VALUES (:name, :num, :home, :soy, :tambon, :aum, :jang, :send_date)");

    // Bind the parameters using bindParam
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':num', $num);
    $stmt->bindParam(':home', $home);
    $stmt->bindParam(':soy', $soy);
    $stmt->bindParam(':tambon', $tambon);
    $stmt->bindParam(':aum', $aum);
    $stmt->bindParam(':jang', $jang);
    $stmt->bindParam(':send_date', $send_date);

    // Execute the statement
    $stmt->execute();

    // Redirect to index.php after successful insertion
    header("Location: index.php");
    exit(); // Ensure no further code is executed after the redirect
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มข้อมูลผู้ส่ง</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">เพิ่มข้อมูลผู้ส่ง</h2>
        <form method="POST">
            <div class="mb-3">
                <label>ชื่อผู้ส่ง</label>
                <input type="text" class="form-control" name="name" required>
            </div>
            <div class="mb-3">
                <label>บ้านเลขที่</label>
                <input type="text" class="form-control" name="num" required>
            </div>
            <div class="mb-3">
                <label>หมู่บ้าน</label>
                <input type="text" class="form-control" name="home">
            </div>
            <div class="mb-3">
                <label>ซอย</label>
                <input type="text" class="form-control" name="soy">
            </div>
            <div class="mb-3">
                <label>ตำบล</label>
                <input type="text" class="form-control" name="tambon">
            </div>
            <div class="mb-3">
                <label>อำเภอ</label>
                <input type="text" class="form-control" name="aum">
            </div>
            <div class="mb-3">
                <label>จังหวัด</label>
                <input type="text" class="form-control" name="jang">
            </div>
            <div class="mb-3">
                <label>วันที่ส่ง</label>
                <input type="date" class="form-control" name="send_date">
            </div>
            <button type="submit" class="btn btn-success">บันทึก</button>
            <a href="index.php" class="btn btn-secondary">กลับ</a>
        </form>
    </div>
</body>
</html>
