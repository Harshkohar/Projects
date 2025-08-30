<nav class="navbar navbar-expand-lg navbar-secondary bg-dark">
  <ul class="navbar-nav me-auto second">
    <?php
    if (!isset($_SESSION['username'])) {
      echo "<li class='nav-item'>
      <a class='nav-link' href='index.php'>Welcome Guest</a>
    </li>";
    } else {
      echo "<li class='nav-item'>
        <a class='nav-link' href='./users_area/profile.php'>Welcome ".$_SESSION['username']."</a>
    </li>";
    }

    if (!isset($_SESSION['username'])) {
      echo "<li class='nav-item'>
        <a class='nav-link' href='./users_area/user_login.php'>Login</a>
      </li>";
    } else {
      echo "<li class='nav-item'>
        <a class='nav-link' href='./users_area/logout.php'>Logout</a>
      </li>";
    }
    ?>
  </ul>
</nav>