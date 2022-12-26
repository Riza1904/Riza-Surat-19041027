<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"></h1>
  <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
  <div class="flash-data-gagal" data-flashdatagagal="<?= $this->session->flashdata('error'); ?>"></div>

  <marquee>Selamat datang Admin</marquee>
  <a href="<?= base_url('surat'); ?>" class="btn btn-primary mb-3">Tambah surat</a>
  <div class="row">
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Surat Masuk
              </div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $suratmasuk ?>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-fw fa-user-friends fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Surat Keluar</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $suratkeluar ?>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-fw fa-bell fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>




</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->