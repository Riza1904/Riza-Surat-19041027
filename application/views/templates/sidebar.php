<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">
  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-fw fa-tachometer-alt"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Surat<sup></sup></div>
  </a>
  <!-- Divider -->
  <hr class="sidebar-divider">

  <?php if ($title == ('Dashboard')) : ?>
  <li class="nav-item active">
    <?php else : ?>
  <li class="nav-item">
    <?php endif; ?>
    <a class="nav-link pb-0" href="<?= base_url('dashboard'); ?>">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>
  <?php if ($title == ('Surat Masuk')) : ?>
  <li class="nav-item active">
    <?php else : ?>
  <li class="nav-item">
    <?php endif; ?>
    <a class="nav-link pb-0" href="<?= base_url('surat/suratMasuk'); ?>">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Surat Masuk</span></a>
  </li>
  <?php if ($title == ('Surat Keluar')) : ?>
  <li class="nav-item active">
    <?php else : ?>
  <li class="nav-item">
    <?php endif; ?>
    <a class="nav-link pb-0" href="<?= base_url('surat/suratKeluar'); ?>">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Suart Keluar</span></a>
  </li>
  <?php if ($title == ('Laporan')) : ?>
  <li class="nav-item active">
    <?php else : ?>
  <li class="nav-item">
    <?php endif; ?>
    <a class="nav-link pb-0 collapsed" href="#" data-toggle="collapse" data-target="#collapse3" aria-expanded="true"
      aria-controls="collapse3">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Laporan</span>
    </a>
    <?php if ($title == ('Laporan')) : ?>
    <div id="collapse3" class="collapse show" aria-labelledby="heading3" data-parent="#accordionSidebar">
      <?php else : ?>
      <div id="collapse3" class="collapse" aria-labelledby="heading3" data-parent="#accordionSidebar">
        <?php endif; ?>
        <div class="bg-white py-2 collapse-inner rounded">
          <a class="collapse-item" href="<?= base_url('laporan/suratmasuk'); ?>">Laporan Surat Masuk</a>
          <a class="collapse-item" href="<?= base_url('laporan/suratkeluar'); ?>">Laporan Surat Keluar</a>
        </div>
      </div>
  </li>

  <li class="nav-item">
    <a class="nav-link pb-0" href="<?= base_url('auth/logout') ?>">
      <i class="fas fa-fw fa-sign-out-alt"></i>
      <span>Logout</span></a>
  </li>
  <!-- Divider -->
  <hr class="sidebar-divider">
  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
<!-- End of Sidebar -->