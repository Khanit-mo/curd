<?php
include 'config.php';

// ตรวจสอบว่าได้รับ 'id' หรือไม่
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        // ลบข้อมูลจากฐานข้อมูล
        $stmt = $conn->prepare("DELETE FROM sender WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        // Redirect หลังจากลบข้อมูลสำเร็จ
        header("Location: index.php");
        exit();

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "ไม่พบข้อมูลที่ต้องการลบ";
}
?>
