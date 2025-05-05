<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f9fafb;
            margin: 0;
            padding: 0;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-top: 40px;
            font-size: 36px;
            font-weight: 500;
        }

        .button-container {
            text-align: center;
            margin-top: 20px;
        }

        a.button {
            text-decoration: none;
            color: #fff;
            background-color: #4CAF50;
            padding: 12px 24px;
            border-radius: 6px;
            transition: background-color 0.3s ease;
            font-size: 16px;
            font-weight: 500;
        }

        a.button:hover {
            background-color: #45a049;
        }

        table {
            width: 90%;
            margin: 30px auto;
            border-collapse: collapse;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
        }

        th, td {
            padding: 15px;
            text-align: left;
            font-size: 14px;
        }

        th {
            background-color: #4CAF50;
            color: #fff;
            font-weight: 500;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .aksi {
            text-align: center;
        }

        .aksi a {
            text-decoration: none;
            padding: 8px 15px;
            margin: 0 5px;
            border-radius: 5px;
            font-size: 14px;
            font-weight: 500;
            transition: background-color 0.3s ease;
        }

        .edit {
            background-color: #ffa500;
            color: #fff;
        }

        .edit:hover {
            background-color: #e68900;
        }

        .hapus {
            background-color: #f44336;
            color: #fff;
        }

        .hapus:hover {
            background-color: #e53935;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

    <h2>Daftar Mahasiswa</h2>
    <div class="button-container">
        <a class="button" href="tambah.php">+ Tambah Data Mahasiswa</a>
    </div>

    <table>
        <tr>
            <th>No</th>
            <th>NPM</th>
            <th>Nama</th>
            <th>Program Studi</th>
            <th>Email</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>

        <?php
        include "koneksi.php";
        $query = mysqli_query($conn, "SELECT * FROM tbl_mahasiswa");
        $no = 1;

        while ($data = mysqli_fetch_array($query)) {
            echo "<tr>
                    <td>$no</td>
                    <td>{$data['npm']}</td>
                    <td>{$data['nama']}</td>
                    <td>{$data['prodi']}</td>
                    <td>{$data['email']}</td>
                    <td>{$data['alamat']}</td>
                    <td class='aksi'>
                        <a class='edit' href='edit.php?npm={$data['npm']}'>Edit</a>
                        <a class='hapus' href='#' onclick=\"konfirmasiHapus('{$data['npm']}')\">Hapus</a>
                    </td>
                  </tr>";
            $no++;
        }
        ?>
    </table>

    <script>
        function konfirmasiHapus(npm) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data mahasiswa dengan NPM " + npm + " akan dihapus!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "hapus.php?npm=" + npm;
                }
            });
        }
    </script>

</body>

</html>
