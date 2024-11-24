<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $umur = $_POST['umur'];
    $gender = $_POST['gender'];
    $browserInfo = $_SERVER['HTTP_USER_AGENT'];

    if (isset($_FILES['file']) && $_FILES['file']['error'] == UPLOAD_ERR_OK) {
        $file = $_FILES['file'];
        if ($file['type'] != 'text/plain') {
            die("Hanya file .txt yang diperbolehkan!");
        }

        $fileContent = file_get_contents($file['tmp_name']);
    } else {
        die("File upload gagal!");
    }

    $data = [
        'nama' => $nama,
        'email' => $email,
        'umur' => $umur,
        'gender' => $gender,
        'fileContent' => $fileContent,
        'browserInfo' => $browserInfo,
    ];

    // Simpan data ke file
    $filePath = 'data.json';
    $existingData = [];
    if (file_exists($filePath)) {
        $existingData = json_decode(file_get_contents($filePath), true);
    }
    $existingData[] = $data;
    file_put_contents($filePath, json_encode($existingData));

    header('Location: result.php');
    exit();
}
?>
