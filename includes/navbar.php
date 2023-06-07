<nav
  class="navbar d-flex align-items-center justify-content-between navbar-expand-lg text-dark bg-light px-5">
  <div class="logo-main">
    <a class="navbar-brand left" href="./index.php">Logo</a>
  </div>
  <div class="menu">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link right" href="./index.php">Home</a>
        </li>
        


        <?php
        if (isset($_SESSION['auth'])) {
          ?>
          <li class="nav-item">
          <a class="nav-link right" href="./display.php">Top Scores</a>
        </li>
          <div class="dropdown-center mt-1">
            <button class="btn btn-info dropdown-toggle" type="button" data-bs-toggle="dropdown"
              aria-expanded="false">
              <?= $_SESSION['auth_user']['firstname']; ?>
            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">View Profile</a></li>
              <li><a class="dropdown-item" href="#">Edit Profile</a></li>
              <li><a class="dropdown-item" href="../logout.php">Logout</a></li>
            </ul>
          </div>

          <?php
        } else {
          ?>
          <li class="nav-item">
            <a class="nav-link" href="./register.php">Register</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./login.php">Login</a>
          </li>
          <?php
        }
        ?>
      </ul>
    </div>
  </div>
</nav>
