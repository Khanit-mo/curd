<?php
include 'config.php'; // ไฟล์สำหรับเชื่อมต่อฐานข้อมูล

// ดึงข้อมูลผู้ส่ง
try {
    $senderQuery = "SELECT * FROM sender";
    $senderStmt = $conn->prepare($senderQuery);
    $senderStmt->execute();
    $senderData = $senderStmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error fetching sender data: " . $e->getMessage();
}

// ดึงข้อมูลผู้รับ
try {
    $receiverQuery = "SELECT * FROM receiver";
    $receiverStmt = $conn->prepare($receiverQuery);
    $receiverStmt->execute();
    $receiverData = $receiverStmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error fetching receiver data: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบจัดการข้อมูลผู้ส่งและผู้รับ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">ระบบจัดการข้อมูลผู้ส่งและผู้รับ</h1>

        <div class="mt-4">
            <a href="add.php" class="btn btn-success">เพิ่มข้อมูลใหม่</a>
        </div>

        <hr>

        <!-- ตารางแสดงข้อมูลผู้ส่ง -->
        <h3>ข้อมูลผู้ส่ง</h3>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ชื่อผู้ส่ง</th>
                    <th>บ้านเลขที่</th>
                    <th>หมู่บ้าน</th>
                    <th>ซอย</th>
                    <th>ตำบล</th>
                    <th>อำเภอ</th>
                    <th>จังหวัด</th>
                    <th>วันที่ส่ง</th>
                    <th>จัดการ</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($senderData)): ?>
                    <?php foreach ($senderData as $sender): ?>
                        <tr>
                            <td><?= htmlspecialchars($sender['name']); ?></td>
                            <td><?= htmlspecialchars($sender['num']); ?></td>
                            <td><?= htmlspecialchars($sender['home']); ?></td>
                            <td><?= htmlspecialchars($sender['soy']); ?></td>
                            <td><?= htmlspecialchars($sender['tambon']); ?></td>
                            <td><?= htmlspecialchars($sender['aum']); ?></td>
                            <td><?= htmlspecialchars($sender['jang']); ?></td>
                            <td><?= htmlspecialchars($sender['send_date']); ?></td>
                            <td>
                                <a href="edit.php?id=<?= urlencode($sender['id']); ?>" class="btn btn-warning btn-sm">แก้ไข</a>
                                <a href="delete.php?id=<?= urlencode($sender['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('คุณต้องการลบข้อมูลนี้หรือไม่?')">ลบ</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="9" class="text-center">ไม่มีข้อมูลผู้ส่ง</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

</body>
</html>
