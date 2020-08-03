<nav class="navbar <?php echo $class ?> navbar-expand-lg navbar-light bg-light" style="background-color: white!important;">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" style="border-color: rgba(0,0,0,0);">
    <span class="navbar-toggler-icon font-weight-bold" style="height: 5vw;"></span>
  </button>
  <a class="navbar-brand" href="#" style="padding-bottom: 0;"><h1 class="font-weight-bold" style="font-size: 5vw;margin-bottom: 0;">iklan<span class="text-info">ku</span></h1></a>

  <style>
    .nav-link , .dropdown-item{
      font-size: 3vw!important;
    }

  </style>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Tentang Kami</a>
        <a class="nav-link" href="#">Cara Beriklan</a>
        <a class="nav-link" href="#">Hubungi Kami</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Media
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="border: none!important;">
          <a class="dropdown-item" href="#">Billboard</a>
          <a class="dropdown-item" href="#">Baliho</a>
          <a class="dropdown-item" href="#">JPO (Pedestrian Bridge)</a>
          <a class="dropdown-item" href="#">Videotron</a>
          <a class="dropdown-item" href="#">Road Sign</a>
          <a class="dropdown-item" href="#">Midi Board</a>
          <a class="dropdown-item" href="#">Indoor</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Lainnya</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url() ?>">Keluar</a>
      </li>
    </ul>
  </div>
</nav>