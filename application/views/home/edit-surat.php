<!-- Begin Page Content -->
<div class="container-fluid">
  <div class="card shadow border-left-primary">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Form Edit Surat</h6>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-lg-12">
          <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
          <div class="flash-data-gagal" data-flashdatagagal="<?= $this->session->flashdata('error'); ?>"></div>
          <div class="row">
            <div class="col-lg-6">
              <form method="post"
                action="<?php echo base_url('surat/ubahsurat'); ?>/<?= $surat['id']; ?>/<?= $redirect_page; ?>"
                enctype="multipart/form-data">
                <div class=" form-group">
                  <label for="nomor_surat">Nomor Surat</label>
                  <input type="text" class="form-control" style="width: 320px" id="nomor_surat" name="nomor_surat"
                    value="<?= $surat['nomor_surat']; ?>" readonly>
                  <?= form_error('nomor_surat', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class=" form-group">
                  <label for="pengirim">Pengirim</label>
                  <input type="text" class="form-control" style="width: 320px" id="pengirim" name="pengirim"
                    value="<?= $surat['pengirim']; ?>">
                  <?= form_error('pengirim', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class=" form-group">
                  <label for="penerima">Penerima</label>
                  <input type="text" class="form-control" style="width: 320px" id="penerima" name="penerima"
                    value="<?= $surat['penerima']; ?>">
                  <?= form_error('penerima', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class=" form-group">
                  <label for="perihal">Perihal</label>
                  <input type="text" class="form-control" style="width: 320px" id="perihal" name="perihal"
                    value="<?= $surat['perihal']; ?>">
                  <?= form_error('perihal', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class=" form-group d-flex flex-column">
                  <label for="image">Scan Surat</label>
                  <div class="custom-file" style="width: 320px">
                    <input type="file" class="custom-file-input" name="image" id="image">
                    <label class="custom-file-label" for="file">Choose file</label>
                  </div>
                  <?= form_error('image', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group d-flex flex-column">
                <label for="divisi">Divisi</label>
                <select class="form-control" name="divisi" id="divisi" style="width: 350px">
                  <option value="">Pilih</option>
                  <?php foreach ($divisi as $data) : ?>
                  <option value="<?= $data['id']; ?>"><?= $data['divisi']; ?></option>
                  <?php endforeach; ?>
                </select>
                <?= form_error('divisi', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
              <div class="form-group">
                <label for="kategori_surat">Kategori Surat</label>
                <div class="">
                  <?php foreach ($kategori as $data) : ?>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="kategori_surat[]"
                      id="inlineCheckbox<?= $data['id']; ?>" value="<?= $data['kategori_surat']; ?>">
                    <label class="form-check-label"
                      for="inlineCheckbox<?= $data['id']; ?>"><?= $data['kategori_surat']; ?></label>
                  </div>
                  <?php endforeach; ?>

                </div>
                <?= form_error('kategori_surat[]', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
              <div class="form-group">
                <label for="tipe_surat">Tipe Surat</label>
                <div class="">
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="tipe_surat" id="inlineRadio1" value="masuk"
                      checked>
                    <label class="form-check-label" for="inlineRadio1">Masuk</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="tipe_surat" id="inlineRadio2" value="keluar">
                    <label class="form-check-label" for="inlineRadio2">Keluar</label>
                  </div>
                </div>
              </div>
              <div class=" form-group">
                <label for="tanggal_surat">Tanggal_surat</label>
                <input type="date" class="form-control" style="width: 350px" id="tanggal_surat" name="tanggal_surat">
                <?= form_error('tanggal_surat', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
              <div class=" form-group">
                <label for="ket">Keterangan</label>
                <input type="ket" class="form-control" style="width: 350px" id="ket" name="ket"
                  value="<?= $surat['ket']; ?>">
                <?= form_error('ket', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
          </div>
          <div class="form-group row justify-content-end">
            <div class="col-sm">
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->