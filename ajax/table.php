    <?php

    $keyword = $_GET['keyword-cari'];


    $connect = new mysqli("localhost", "root", "", "crud_dasar");
    $query = "SELECT * FROM seluruh_data WHERE data_nama LIKE '%$keyword%' OR data_alamat LIKE '%$keyword%' OR data_asal LIKE '%$keyword%'";

    $result = mysqli_query($connect, $query);



    ?>


    <table>
      <tr>
        <thead>
          <th>No</th>
          <th>Nama</th>
          <th>Alamat</th>
          <th>Asal</th>
          <th>Aksi</th>
        </thead>
      </tr>
      <?php $i = 1 ?>
      <?php while ($user_data = mysqli_fetch_array($result)) { ?>
        <tr>
          <tbody>
            <td><?= $i ?></td>
            <td><?= $user_data["data_nama"]; ?></td>
            <td><?= $user_data["data_alamat"]; ?></td>
            <td><?= $user_data["data_asal"]; ?></td>
            <td>
              <a href="update.php?id=<?= $user_data["data_id"] ?>">Ubah</a> |
              <a href="delete.php?id=<?= $user_data["data_id"] ?>">Hapus</a>
            </td>
          </tbody>
        </tr>
        <?php $i++; ?>
      <?php } ?>
    </table>