<?php
    $koneksi = mysqli_connect("localhost", "root", "", "db_pegawai");

    if($koneksi){
        //echo "Alhamdulillah sudah terkoneksi";
    }else{
        echo "Aduh, gagal nih gan";
    }
?>

<h1>Input Data Pegawai</h1>

<form action="" method="post">
<table border="2">
    <tr>
        <td>Nama  </td>
        <td><input type="text" name="Nama"></td>
    </tr>
    <tr>
        <td>Jabatan  </td>
        <td><input type="text" name="Jabatan"></td>
    </tr>
     <tr>
        <td>jenis kelamin  </td>
        <td><input type="text" name="jenis kelamin"></td>
    </tr>
     <tr>
        <td>tempat tanggal lahir  </td>
        <td><input type="text" name="tempat tanggal lahir"></td>
    </tr>
    <tr>
        <td>Alamat  </td>
        <td><input type="text" name="Alamat"></td>
    </tr>
</table>
    <input type="submit" name="registrasi" value="Registrasi">
</form>
<h1>Hasil Input Data Pegawai</h1>
<table border="2">
    <thead>
        <th>No</th>
        <th>Nama</th>
        <th>Jabatan</th>
        <th>jenis kelamin</th>
        <th>tempat tanggal lahir</th>
        <th>Alamat</th>
        <th>Aksi</th>
    </thead>
    <tbody>
        <?php
            $sqlView = "SELECT * FROM `table_pegawai`";
            $cekView = mysqli_query($koneksi, $sqlView);

            $nomor = 1;
            while($data = mysqli_fetch_array($cekView)){
        ?>
        <tr>
            <td><?=$nomor ?></td>
            <td><?=$data[1] ?></td>
            <td><?=$data[2] ?></td>
            <td><?=$data[3] ?></td>
            <td><?=$data[4] ?></td>
            <td><?=$data[5] ?></td>
            <td>
                <a href="index.php?id=<?=$data[0]?>">Delete</a>
            </td>
        </tr>
        <?php
            $nomor++; // ++ = nomor+1; 
            }
        ?>
    <!-- /end -->
    </tbody>
</table>

<?php
    if(isset($_POST['registrasi'])){
        $sqlInput = "INSERT INTO `table_pegawai` (`Nama`,`Jabatan`,`jenis_kelamin`,`tempat_tanggal_lahir`,`Alamat`)
                VALUES ('$_POST[Nama]', '$_POST[Jabatan]','$_POST[jenis_kelamin]','$_POST[tempat_tanggal_lahir]','$_POST[Alamat]')";
        $cekInput = mysqli_query($koneksi, $sqlInput);
        if($cekInput){
            // echo "Datanya udah masuk gan";
            echo "<script> window.location = 'index.php' </script>";
        }else{
            echo "Aduh.. Gagal masuk datanya gan";
        }
    }

    if(isset($_GET['id'])){
        $sqlDelete = "DELETE FROM `table_pegawai` WHERE
        `table_pegawai`.`id` = '$_GET[id]'";
        $cekDelete = mysqli_query($koneksi, $sqlDelete);

        if($cekDelete){
            // echo "Datanya udah masuk gan";
            echo "<script> window.location = 'index.php' </script>";
        }else{
            echo "Aduh.. Gagal ngehapus datanya gan";
        }
    }
?>