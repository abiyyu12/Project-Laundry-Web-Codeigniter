 <!-- Navbar -->
 <nav class="fixed-top navbar navbar-expand-lg navbar-dark">
      <div class="container">
        <a class="navbar-brand" href="#">Mawar Laundry</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('/') ?>">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('/') ?>">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('/') ?>">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('/') ?>">Contact</a>
            </li>
            <?php if(!empty(session()->get('id_user'))){ ?>
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                href="#"
                id="navbarDropdown"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
                >Laundry
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li>
                  <a
                    class="dropdown-item btn btn-primary"
                    href="<?= base_url('/laundry-satuan') ?>"
                    style="color: #7286d3; background-color: #fff;"
                    >Laundry Satuan</a
                  >
                </li>
                <li>
                  <a class="dropdown-item btn btn-primary" href="<?= base_url('/laundry-kiloan') ?>" style="color: #7286d3;background-color: #fff;" 
                    >Laundry Kiloan</a
                  >
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('/profile') ?>">Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('/logout') ?>">Logout</a>
            </li>
            <?php } else { ?>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('/login') ?>">Login</a>
            </li>
            <?php } ?>
          </ul>
        </div>
      </div>
    </nav>
