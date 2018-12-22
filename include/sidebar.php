      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <!--
        <li class="nav-item">
          <a class="nav-link" href="charts.php">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Charts</span></a>
        </li>
        -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-database"></i>
            <span>Inserimento dati</span></a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <h6 class="dropdown-header">Tabelle:</h6>
            <a class="dropdown-item" href="index.php?area=add_pers"><i class="fas fa-users"></i> Personale</a>
            <a class="dropdown-item" href="index.php?area=add_cont"><i class="fas fa-table"></i> Tipi di Contratti</a>
            <a class="dropdown-item" href="index.php?area=add_orar"><i class="far fa-clock"></i> Orari di Lavoro</a>
            <a class="dropdown-item" href="index.php?area=add_uten"><i class="fas fa-user"></i> Utenti</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-file-alt"></i>            
            <span>Pagine</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <h6 class="dropdown-header">Pagine per il Login:</h6>
            <a class="dropdown-item" href="login.php">Login</a>
            <a class="dropdown-item" href="register.php">Registrati</a>
            <!-- <a class="dropdown-item" href="forgot-password.html">Forgot Password</a> -->
          </div>
        </li> 
        <li  class="nav-item active">
          <a class="nav-link" href="#" data-toggle="modal" data-target="#infoModal">
          <i class="fas fa-fw fa-info"></i>  
          <span>Informazioni</span></a>
        </li>
      </ul>
      <div id="content-wrapper">

        <div class="container-fluid">

