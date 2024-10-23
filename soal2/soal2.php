<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Soal 2</title>
</head>
<body>
  <?php 
  $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
  $umur = isset($_POST['umur']) ? $_POST['umur'] : '';
  $hobi = isset($_POST['hobi']) ? $_POST['hobi'] : '';

  $step = isset($_GET['step']) ? $_GET['step'] : 1;

  if($_SERVER['REQUEST_METHOD'] === 'POST')
  {
    if ($step == 1 && isset($_POST['nama']))
    {
      $nama = $_POST['nama'];
      $step = 2;
    } elseif ($step == 2 && isset($_POST['umur']))
    {
      $umur = $_POST['umur'];
      $step = 3;
    } elseif ($step == 3 && isset($_POST['hobi']))
    {
      $hobi = $_POST['hobi'];
      $step = 4;
    }
  }
  ?>

  <?php if ($step == 1) { ?>
      <form method="POST" action="?step=2">
        <label for="nama">Nama Anda: </label>
        <input type="text" id="nama" name="nama" value="<?= $nama; ?>" required><br><br>
        <button type="submit">SUBMIT</button>
      </form>
  <?php } elseif ($step == 2) { ?>
      <form method="POST" action="?step=3">
        <label for="umur">Umur Anda: </label>
        <input type="text" id="umur" name="umur" value="<?= $umur; ?>" required><br><br>
        <button type="submit">SUBMIT</button>
        <input type="hidden" name="nama" value="<?= $nama; ?>">
      </form>
  <?php } elseif ($step == 3) { ?>
      <form method="POST" action="?step=4">
        <label for="hobi">Hobi Anda: </label>
        <input type="text" id="hobi" name="hobi" value="<?= $hobi; ?>" required><br><br>
        <button type="submit">SUBMIT</button>
        <input type="hidden" name="nama" value="<?= $nama; ?>">
        <input type="hidden" name="umur" value="<?= $umur; ?>">
      </form>
  <?php } elseif ($step == 4) { ?>
      <div>
        <p>Nama: <?= $nama; ?></p>
        <p>Umur: <?= $umur; ?></p>
        <p>Hobi: <?= $hobi; ?></p>
      </div>
  <?php } ?>
</body>
</html>