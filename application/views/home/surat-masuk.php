<!-- Begin Page Content -->
<div class="container-fluid">

  <div class="row">
    <div class="col-lg">
      <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
      <div class="flash-data-gagal" data-flashdatagagal="<?= $this->session->flashdata('error'); ?>"></div>

      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Data Surat Masuk</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nomor Surat</th>
                  <th>Pengirim|Penerima</th>
                  <th>Perihal</th>
                  <th>File</th>
                  <th>Keterangan</th>
                  <th>Kategori</th>
                  <th>Divisi</th>
                  <th>Tanggal Surat</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                <?php foreach ($surat as $data) : ?>
                <?php $tanggal = date('d-m-Y', strtotime($data['tanggal_surat'])); ?>
                <tr>
                  <td><?= $i; ?></td>
                  <td><?= $data['nomor_surat']; ?></td>
                  <td><?= $data['pengirim']; ?> || <?= $data['penerima']; ?></td>
                  <td><?= $data['perihal']; ?></td>
                  <td><a href="<?php echo base_url('surat/download/' . $data['id']); ?>"
                      class="badge badge-success">Download</a></td>
                  <td><?= $data['ket']; ?></td>
                  <td><?= $data['kategori_surat']; ?></td>
                  <td><?= $data['divisi']; ?></td>
                  <td><?= $tanggal ?></td>
                  <td>
                    <a href="<?= base_url('surat/ubahsurat/'); ?><?= $data['id']; ?>/suratmasuk"
                      class="badge badge-success">Edit</a>
                    <a href="<?= base_url('surat/hapussurat/'); ?><?= $data['id']; ?>/suratmasuk?file=<?= $data['file']; ?>"
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