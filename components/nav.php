<nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary">
 
  <div class="container-fluid">

    <button
      data-mdb-collapse-init
      class="navbar-toggler"
      type="button"
      data-mdb-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    
      <a class="navbar-brand mt-2 mt-lg-0" href="#">
        <img
          src="ico/sound.png"
          height="55"
          alt=""
          loading="lazy"
        />
      </a>
      
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="../frontend/client.php">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../frontend/monitoreo.php" target="_blank">Monitoreo</a>
        </li>
       <!-- <li class="nav-item">
          <a class="nav-link" href="#">Projects</a>
        </li>-->
      </ul>
      <!-- Left links -->
    </div>
    <!-- Collapsible wrapper -->

    <!-- Right elements -->
    <div class="d-flex align-items-center">
      <!-- Icon -->
           <div class="dropdown">
       
        <ul
          class="dropdown-menu dropdown-menu-end"
          aria-labelledby="navbarDropdownMenuLink"
        >
          <!--<li>
            <a class="dropdown-item" href="#">Some news</a>
          </li>
          <li>
            <a class="dropdown-item" href="#">Another news</a>
          </li>-->
          <li>
            <a class="dropdown-item" href="#"><i class="fa fa-sign-out" aria-hidden="true"></i>
 Cerrar Sesión</a>
          </li>
        </ul>
      </div>
   
      <div class="dropdown">
        <a
          data-mdb-dropdown-init
          class="dropdown-toggle d-flex align-items-center hidden-arrow"
          href="#"
          id="navbarDropdownMenuAvatar"
          role="button"
          aria-expanded="false"
        >
          <img
            src=""
            class="rounded-circle"
            height="25"
            alt=""
            loading="lazy"
          />
        </a>
        <ul
          class="dropdown-menu dropdown-menu-end"
          aria-labelledby="navbarDropdownMenuAvatar"
        >
          <li>
            <a class="dropdown-item" href="#">My profile</a>
          </li>
          <li>
            <a class="dropdown-item" href="#">Settings</a>
          </li>
          <li>
            <a class="dropdown-item" href="#">Logout</a>
          </li>
        </ul>
      </div>
    </div>
    <!-- Right elements -->
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->