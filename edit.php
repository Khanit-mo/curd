<?php
include 'config.php';

// ตรวจสอบการส่งแบบฟอร์ม
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // รับข้อมูลจากแบบฟอร์ม
    $id = $_POST['id'];
    $send_name = $_POST['send_name'];
    $send_num = $_POST['send_num'];
    $send_home = $_POST['send_home'];
    $send_soy = $_POST['send_soy'];
    $send_tambon = $_POST['send_tambon'];
    $send_aum = $_POST['send_aum'];
    $send_jang = $_POST['send_jang'];
    $send_send_date = $_POST['send_send_date'];

    try {
        // Update ข้อมูลผู้ส่ง
        $stmt = $conn->prepare("UPDATE sender SET 
                                name = :send_name, 
                                num = :send_num, 
                                home = :send_home, 
                                soy = :send_soy, 
                                tambon = :send_tambon, 
                                aum = :send_aum, 
                                jang = :send_jang, 
                                send_date = :send_send_date 
                                WHERE id = :id");

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':send_name', $send_name);
        $stmt->bindParam(':send_num', $send_num);
        $stmt->bindParam(':send_home', $send_home);
        $stmt->bindParam(':send_soy', $send_soy);
        $stmt->bindParam(':send_tambon', $send_tambon);
        $stmt->bindParam(':send_aum', $send_aum);
        $stmt->bindParam(':send_jang', $send_jang);
        $stmt->bindParam(':send_send_date', $send_send_date);

        $stmt->execute();

        // Redirect หลังจากแก้ไขข้อมูลสำเร็จ
        header("Location: index.php");
        exit();

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    // ถ้าไม่ได้ส่งข้อมูล POST ให้ดึงข้อมูลที่ต้องการแก้ไขจากฐานข้อมูล
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM sender WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $sender = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขข้อมูลผู้ส่ง</title>
    <style>
        /* CSS ตกแต่งฟอร์ม */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7f6;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            width: 60%;
            padding: 30px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            box-sizing: border-box;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
            font-size: 24px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-size: 16px;
            font-weight: bold;
            color: #555;
            display: block;
            margin-bottom: 8px;
        }

        .form-group input {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 6px;
            background-color: #f9f9f9;
        }

        .form-group input[type="date"] {
            background-color: white;
        }

        .form-group input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 15px 20px;
            font-size: 18px;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form-group input[type="submit"]:hover {
            background-color: #45a049;
        }

        /* เพิ่มการจัดรูปแบบให้กับ input ต่างๆ */
        .form-group input:focus {
            border-color: #4CAF50;
            outline: none;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>แก้ไขข้อมูลผู้ส่ง</h1>
        <form action="edit.php" method="POST">
            <input type="hidden" name="id" value="<?= $sender['id']; ?>">

            <div class="form-group">
                <label for="send_name">ชื่อผู้ส่ง:</label>
                <input type="text" name="send_name" value="<?= $sender['name']; ?>" required>
            </div>

            <div class="form-group">
                <label for="send_num">บ้านเลขที่:</label>
                <input type="text" name="send_num" value="<?= $sender['num']; ?>" required>
            </div>

            <div class="form-group">
                <label for="send_home">หมู่บ้าน:</label>
                <input type="text" name="send_home" value="<?= $sender['home']; ?>" required>
            </div>

            <div class="form-group">
                <label for="send_soy">ซอย:</label>
                <input type="text" name="send_soy" value="<?= $sender['soy']; ?>">
            </div>

            <div class="form-group">
                <label for="send_tambon">ตำบล:</label>
                <input type="text" name="send_tambon" value="<?= $sender['tambon']; ?>">
            </div>

            <div class="form-group">
                <label for="send_aum">อำเภอ:</label>
                <input type="text" name="send_aum" value="<?= $sender['aum']; ?>">
            </div>

            <div class="form-group">
                <label for="send_jang">จังหวัด:</label>
                <input type="text" name="send_jang" value="<?= $sender['jang']; ?>">
            </div>

            <div class="form-group">
                <label for="send_send_date">วันที่ส่ง:</label>
                <input type="date" name="send_send_date" value="<?= $sender['send_date']; ?>" required>
            </div>

            <div class="form-group">
                <input type="submit" value="บันทึกการแก้ไข">
            </div>
        </form>
    </div>
</body>
</html>
