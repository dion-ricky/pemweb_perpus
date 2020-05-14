<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cari Buku</title>
  <link rel="stylesheet" href="/assets/styles/main.css">
  <link rel="stylesheet" href="/assets/styles/home.css">
</head>
<body class="flex flex-column">
  <header>
    <?php require 'templates/fixed-topnav.php'; ?>
  </header>
  <main>
  <div class="latest-release mb-3">
    <div class="book-group-header">
      <h1>Hasil Pencarian</h1>
      <div class="book-genre-list">
        <a href="" class="selected">Semua</a>
        <a href="">Horror</a>
        <a href="">Drama</a>
        <a href="">Misteri</a>
      </div>
    </div>
    <div class="book-grid-2x2">
      <?php
        foreach ($books as $book) {
      ?>
      <div class="book-item">
        <div class="book-cover">
          <div onclick="window.location = '/buku/<?=$book['id_buku'] ?>'"></div>
          <img src="/buku/cover/<?=$book['id_buku'] ?>" alt="">
        </div>
        <div class="book-details">
          <table>
            <tr>
              <td>Judul</td>
              <td>:</td>
              <td><?=$book['judul'] ?></td>
            </tr>
            <tr>
              <td>Penulis</td>
              <td>:</td>
              <td><?=$book['penulis'] ?></td>
            </tr>
            <tr>
              <td>ISBN</td>
              <td>:</td>
              <td><?=$book['isbn'] ?></td>
            </tr>
            <tr>
              <td>Penerbit</td>
              <td>:</td>
              <td><?=$book['penerbit'] ?></td>
            </tr>
            <tr>
              <td>Tahun Terbit</td>
              <td>:</td>
              <td><?=$book['tahun_terbit'] ?></td>
            </tr>
            <tr>
              <td>Cetakan ke</td>
              <td>:</td>
              <td><?=$book['cetakan'] ?></td>
            </tr>
          </table>
        </div>
        <div class="book-description">
          <?php
            $words = '';
            $chars = str_split(
                        str_replace("\n", '<br>', $book['sinopsis'])
                      );

            foreach ($chars as $key => $char) {
              if (substr_count($words,' ') == 46 || substr_count($words, "<br>") >= 3) {
                echo "...";
                break;
              }
            
              $words = $words.$char;

              echo $char;
            }
          ?>
        </div>
      </div>
      <?php
        }
      ?>
    </div>
  </div>
  </main>
  <footer class="mt-auto">
    <?php require 'templates/footer.php'; ?>
  </footer>
</body>
</html>