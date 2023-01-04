<!-- Begin Page Content -->
<div class="container-fluid">

  <div class="row">
    <div class="col-lg">
      <a href="<?= base_url('setting/tambahDivisi'); ?>" class="btn btn-primary mb-3">Tambah Divisi</a>
      <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>

      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Data Divisi</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Divisi</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                <?php foreach ($divisi as $data) : ?>
                <tr>
                  <td><?= $i; ?></td>
                  <td><?= $data['divisi']; ?></td>
                  <td>
                    <a href="<?= base_url('setting/ubahdivisi/'); ?><?= $data['id']; ?>"
                      class="badge badge-success">Edit</a>
                    <a href="<?= base_url('setting/hapusdivisi/'); ?><?= $data['id']; ?>"
                      class="badge badge-danger tombol-hapus">Hapus</a>
                  </td>
                </tr>
                <?php $i++; ?>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->