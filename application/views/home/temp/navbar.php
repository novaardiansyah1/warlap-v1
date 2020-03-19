<section id="navbar">
  
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" 
  data-toggle="collapse" data-target="#navbarNavAltMarkup" 
  aria-controls="navbarNavAltMarkup" aria-expanded="false" 
  aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="#">Home</a>
      <a class="nav-item nav-link" href="#about">Tentang</a>
      <a class="nav-item nav-link" href="#fitur">Fitur</a>
      <a class="nav-item nav-link" href="#total">Total</a>
      <a class="nav-item nav-link" href="#news">Terkini</a>
      <a class="nav-item nav-link" href="#lapor">Lapor</a>
      <?php if($this->session->userdata('username')) : ?>
        <a class="nav-item nav-link" href="<?= site_url('profile') ?>">
          <i class="fas fa-user"></i> Profile
        </a>
        <a class="nav-item nav-link" href="<?= site_url('auth/logout') ?>">
          <i class="fas fa-sign-out-alt"></i> Logout
        </a>
      <?php else : ?>
        <a class="nav-item nav-link" href="<?= site_url('auth') ?>">
          <i class="fas fa-sign-in-alt"></i> Login
        </a>
      <?php endif; ?>
    </div>
  </div>
  </div>
  <!-- /.container -->
</nav>  

<div class="container kEVnV">
  <h1 class="QZxoZ">
    Layanan Aspirasi dan Pengaduan Online Rakyat
  </h1>
  <h1 class="qyzJO">
    Sampaikan laporan Anda langsung kepada 
    instansi pemerintah berwenang
  </h1>
  <hr class="mt-4 bQDxD">
  <div class="pb-5"></div>
</div>
  
</section>