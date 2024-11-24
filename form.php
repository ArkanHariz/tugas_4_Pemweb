<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran</title>
    <style>
        body { font-family: Arial, sans-serif; }
        form { margin: 20px; }
        label { display: block; margin-bottom: 5px; }
        input, select, button { margin-bottom: 10px; padding: 5px; }

        /* Tambahkan CSS berikut */
        .radio-group {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 10px;
        }
        .radio-group label {
            margin: 0; /* Hilangkan margin tambahan pada label radio */
        }

        .file-group {
            margin-bottom: 20px; /* Tambahkan jarak antara unggah file dan tombol submit */
        }
    </style>
    <script>
        function validateForm() {
            const nama = document.getElementById("nama").value.trim();
            const email = document.getElementById("email").value.trim();
            const umur = document.getElementById("umur").value.trim();
            const jenisKelamin = document.querySelector('input[name="gender"]:checked');
            const fileInput = document.getElementById("file");

            if (!nama || !email || !umur || !jenisKelamin) {
                alert("Semua field harus diisi!");
                return false;
            }

            if (fileInput.files.length === 0) {
                alert("File harus diunggah!");
                return false;
            }

            const file = fileInput.files[0];
            if (file.type !== "text/plain") {
                alert("Hanya file .txt yang diperbolehkan!");
                return false;
            }

            return true;
        }
    </script>
</head>
<body>
    <h2>Form Pendaftaran</h2>
    <form action="process.php" method="POST" enctype="multipart/form-data" onsubmit="return validateForm();">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama">

        <label for="email">Email:</label>
        <input type="email" id="email" name="email">

        <label for="umur">Umur:</label>
        <input type="number" id="umur" name="umur">

        <label>Jenis Kelamin:</label>
        <div class="radio-group">
            <input type="radio" id="pria" name="gender" value="Pria">
            <label for="pria">Pria</label>
            <input type="radio" id="wanita" name="gender" value="Wanita">
            <label for="wanita">Wanita</label>
        </div>

        <div class="file-group">
            <label for="file">Unggah File (.txt):</label>
            <input type="file" id="file" name="file">
        </div>

        <button type="submit">Submit</button>
    </form>
    <a href="result.php">Lihat Hasil/Result</a>
</body>
</html>
