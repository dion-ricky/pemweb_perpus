  <nav class="fixed-topnav">
    <div class="nav-push-left" style="cursor: pointer;" onclick="window.location.replace('/home');">
      <i class="material-icons nav-icon">menu_book</i>
      <span class="nav-brand ml-1">Perpustakaan Online</span>
    </div>
    <div class="nav-push-right">
      <form action="" method="get" class="nav-search mr-3">
        <input type="text" name="q" id="">
        <button type="submit" class="btn btn-primary">Cari</button>
      </form>
        <?php 
          if ($sub !== null) {
        ?>
      <div class="nav-user-detail" style="cursor: pointer" onclick="window.location.replace('/user/profile');">
        <span class="mr-1"><?=$sub['nama']?></span>
        <img src="/photo/profile" alt="" srcset="" class="nav-user-photo">
      </div>
      <button class="btn btn-danger nav-btn-logout ml-2" onclick="window.location.replace('/auth/logout');">Logout</button>
        <?php
          }
          else {
            ?>
      <div class="nav-user-detail">
        <a href="/login">Login</a> &nbsp; / &nbsp; <a href="/register">Register</a>
      </div>
        <?php
          }
          ?>
    </div>
  </nav>