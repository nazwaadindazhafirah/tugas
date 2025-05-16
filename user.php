<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>

<body>
    <?php
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $dbname = 'web';

    $conn = new mysqli($host, $user, $password, $dbname);
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Ambil data pengguna  
    $sql = "SELECT * FROM pengguna";
    $result = $conn->query($sql);
    ?>

    <h2>Daftar Pengguna</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Pengguna</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['id_pengguna']; ?></td>
                        <td><?php echo $row['nama_pengguna']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td>
                            <a href="manajemen_pengguna.php?edit=<?php echo $row['id_pengguna']; ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="manajemen_pengguna.php?delete=<?php echo $row['id_pengguna']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?');">Hapus</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" class="text-center">Tidak ada data pengguna</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>

</html>