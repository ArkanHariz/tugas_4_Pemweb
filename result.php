<?php
$filePath = 'data.json';
$data = [];
if (file_exists($filePath)) {
    $data = json_decode(file_get_contents($filePath), true);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pendaftaran</title>
    <style>
        table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #333; color: white; }
    </style>
</head>
<body>
    <h2>Hasil Pendaftaran</h2>
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Umur</th>
                <th>Jenis Kelamin</th>
                <th>Isi File (.txt)</th>
                <th>Informasi Browser/Sistem</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($data)): ?>
                <?php foreach ($data as $row): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['nama']) ?></td>
                        <td><?= htmlspecialchars($row['email']) ?></td>
                        <td><?= htmlspecialchars($row['umur']) ?></td>
                        <td><?= htmlspecialchars($row['gender']) ?></td>
                        <td><pre><?= htmlspecialchars($row['fileContent']) ?></pre></td>
                        <td><?= htmlspecialchars($row['browserInfo']) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6">Belum ada data.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <a href="form.php">Kembali ke Form</a>
</body>
</html>
