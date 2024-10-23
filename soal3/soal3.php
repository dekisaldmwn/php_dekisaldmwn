<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Soal 3</title>
</head>
<body>
  <h1>List Nama, Alamat, dan Hobi</h1>
  <table border="1">
    <tr>
      <th>Nama</th>
      <th>Alamat</th>
      <th>Hobi</th>
    </tr>

<?php 
  $db_host = "localhost";
  $db_user = "root";
  $db_pass = "";
  $db_name = "testdb";

  $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

  if($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
  }

  $searchNama = isset($_GET['searchNama']) ? $_GET['searchNama'] : '';
  $searchAlamat = isset($_GET['searchAlamat']) ? $_GET['searchAlamat'] : '';
  $searchHobi = isset($_GET['searchHobi']) ? $_GET['searchHobi'] : '';

  $sql = "SELECT person.nama, person.alamat, GROUP_CONCAT(hobi.hobi SEPARATOR ', ') AS daftar_hobi FROM person LEFT JOIN hobi ON person.id = hobi.person_id WHERE (person.nama LIKE '%$searchNama%' OR '$searchNama' = '') AND (person.alamat LIKE '%$searchAlamat%' OR '$searchAlamat' = '') AND (hobi.hobi LIKE '%$searchHobi%' OR '$searchHobi' = '') GROUP BY person.id";

  $result = mysqli_query($conn, $sql);

  if(mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<tr>";
      echo "<td>" . $row['nama'] . "</td>";
      echo "<td>" . $row['alamat'] . "</td>";
      echo "<td>" . $row['daftar_hobi'] . "</td>";
      echo "<tr>";
    } 
    } else {
      echo "<tr><td>Tidak ada data ditemukan</td></tr>";
  }

  mysqli_close($conn);
?>
 </table>
 <form method="GET">
    <input type="text" name="searchNama" placeholder="Cari nama"><br>
    <input type="text" name="searchAlamat" placeholder="Cari alamat"><br>
    <input type="text" name="searchHobi" placeholder="Cari hobi"><br>
    <button type="submit">SEARCH</button>
 </form>

</body>
</html>