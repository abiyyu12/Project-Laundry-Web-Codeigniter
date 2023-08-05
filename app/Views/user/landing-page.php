<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Mawar Laundry | landing-page</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,600;1,800&display=swap"
      rel="stylesheet"
    />
    <!-- Bootsrap -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
      crossorigin="anonymous"
    />
    <!-- My Style -->
    <link rel="stylesheet" href="<?= base_url('/my-assets/style.css') ?>" />
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
  </head>
  <body>
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
              <a class="nav-link" href="#home">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#services">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#kontak">Contact</a>
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
                    style="color: #7286d3;background-color: #fff;"
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
    <!-- Hero Section -->
    <div class="mb-5 jmb-img" id="home">
      <div class="container py-5">
        <h1 class="display-4 head-jumbotron">
          Cuci <span>Bersih ? </span> Di <span>Mawar Laundry</span> Aja
        </h1>
        <p class="head-jumbotron-2">
          Kami Menyediakan Laundry yang dijamin baju anda bersih dan pelayanan
          yang nyaman
        </p>
        <div class="text-center">
          <a href="<?= base_url('/login') ?>" class="btn btn-primary btnJoin"> JOIN WITH US</a>
        </div>
      </div>
    </div>
    <!-- End Hero -->

    <!-- About US -->
    <section id="about">
      <div class="container">
        <div class="text-center">
          <h1>ABOUT US</h1>
        </div>
        <div class="row">
          <div class="col-lg-6">
            <img
              src="<?= base_url('/my-assets/images/service.jpeg') ?>"
              alt="img-2"
              class="img-thumbnail rounded"
            />
          </div>
          <div class="col-lg-6 about-konten">
            <p>
            Mawar Laundry adalah sebuah usaha pelayanan jasa laundry yang beralamat di Vila Gading Harapan Blok D3 No 25, 
            Bekasi dan didirikan pada tanggal 20 November 2010.Kami menyediakan beberapa jenis layanan yang meliputi laundry 
            kiloan dan laundry satuan.Laundry kiloan biasanya menerima pakaian dan tekstil dalam jumlah besar dari pelanggan,
            kemudian mencucinya dalam jumlah besar juga dan membebankan biaya berdasarkan berat pakaian. Sedangkan laundry 
            satuan menerima pakaian dan tekstil dalam jumlah sedikit,biasanya per item atau per kilogram, dan membebankan biaya
            berdasarkan jumlah item atau berat.kami menjunjung tinggi integritas dan kepercayaan.Kami berkomitmen untuk memberikan
            layanan yang jujur, transparan, dan ramah pelanggan. Kami selalu siap menerima umpan balik dan saran dari pelanggan untuk
            terus meningkatkan layanan kami.layanan laundry kami berdedikasi untuk memberikan pengalaman laundry yang menyenangkan dan
            memuaskan kepada pelanggan. 
            </p>
            <div class="icons-about">
              <div class="icon-about">
                <div class="text-center">
                  <i
                    href="https://www.freeiconspng.com/img/9547"
                    title="Image from freeiconspng.com"
                    ><img
                      src="https://www.freeiconspng.com/uploads/washing-machine-icon-5.png"
                      width="80"
                      alt="Washing Machine Icon Size"
                  /></i>
                </div>
                <p>
                  Mencuci <br />
                  Lebih Effisien
                </p>
              </div>
              <div class="icon-about">
                <div class="text-center">
                  <i
                    href="https://www.freeiconspng.com/img/14262"
                    title="Image from freeiconspng.com"
                    ><img
                      src="https://www.freeiconspng.com/uploads/food-truck-icon-png-2.png"
                      width="80"
                      alt="Food Truck Icon Png"
                  /></i>
                </div>
                <p>
                  Proses Ambil &<br />
                  Kirim Cepat
                </p>
              </div>
              <div class="icon-about">
                <div class="text-center">
                  <img
                    src="https://img.icons8.com/ios/100/null/t-shirt--v1.png"
                    width="70"
                    style="margin-left: -10px; margin-top: 10px"
                  />
                </div>
                <p>
                  Baju dijamin <br />
                  bersih dan harum
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Services -->

    <section id="services">
      <div class="container">
        <div class="mt-5 text-center" id="service">
          <h1>SERVICES</h1>
        </div>
        <div class="row">
          <div class="col-lg-4 text-center">
            <div class="card">
              <img
                src="<?= base_url('/my-assets/images/sollange-brenis-q-A3o3Leqt0-unsplash.jpg') ?>"
                class="card-img-top"
                alt="Images-1"
                height="278"
              />
              <div class="card-body">
                <h5 class="card-title">
                  Cucian anda akan <br />
                  diproses dengan cepat
                </h5>
                <p class="card-text">
                  Cucian yang anda berikan akan di proses paling lambat 2 x 24 jam,
                  atau 2 hari waktu kerja.
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 text-center">
            <div class="card">
              <img
                src="<?= base_url('/my-assets/images/baju.jpeg') ?>"
                class="card-img-top"
                alt="Images-1"
                height="278"
              />
              <div class="card-body">
                <h5 class="card-title">
                  Harga <br />
                  yang terjangkau
                </h5>
                <p class="card-text">
                  Harga yang kami berikan cukup terjangkau bagi anda yang ingin
                  laundry dengan hasil yang memuaskan. 
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 text-center">
            <div class="card">
              <img
                src="<?= base_url('/my-assets/images/polti-science-effective-ironing.jpg') ?>"
                class="card-img-top"
                alt="Images-1"
                height="278"
              />
              <div class="card-body">
                <h5 class="card-title">
                  Pakaian anda dijamin <br />
                  bersih dan harum
                </h5>
                <p class="card-text">
                  Percayakan cucian anda kepada kami,cucian yang anda berikan akan bersih dan harum
                  dijamin anda akan suka dengan hasilnya.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section id="kontak">
      <div class="container mt-5">
        <div class="text-center">
          <h1>CONTACT US</h1>
        </div>
        <div class="row justify-content-center">
          <div class="col-lg-4">
          <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d254.99250054307805!2d107.02334098534686!3d-6.184706019239486!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNsKwMTEnMDUuNCJTIDEwN8KwMDEnMjQuNiJF!5e0!3m2!1sid!2sid!4v1684221419846!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
          <div class="col-lg-4 contact-2 text-center">
            <img
              src="https://img.icons8.com/ios-glyphs/90/null/phone--v1.png"
              width="70"
            />

            <h6>Customer Service</h6>
            <p>
              Anda mempunyai pertanyaan ? anda bisa chat atau menghubungi nomor
              dibawah ini :
            </p>
            <a href="https://wa.me/087808088395">087808088395</a>
          </div>
        </div>
      </div>
    </section>
    <footer>
      <div class="socials">
        <a href="#">
          <i data-feather="instagram"></i>
        </a>
        <a href="#">
          <i data-feather="twitter"></i>
        </a>
        <a href="#">
          <i data-feather="facebook"></i>
        </a>
      </div>
      <div class="links">
        <a href="#home">Home</a>
        <a href="#about">About</a>
        <a href="#services">Service</a>
        <a href="#kontak">Contact</a>
      </div>
      <div class="credit">
        <p>Created by Abiyyu Zaky Arinta Putra. | &copy; 2023.</p>
      </div>
    </footer>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
      crossorigin="anonymous"
    ></script>
    <script>
      feather.replace();
    </script>
  </body>
</html>