<!-- Begin Page Content -->
<div class="container-fluid">
  <div class="card shadow border-left-primary">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Form Ubah Kategori</h6>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-6">
              <?= form_open_multipart('setting/ubahKategori/'. $kategori['id']); ?>
              <div class=" form-group">
                <label for="kategori_surat">Kategori Surat</label>
                <input type="text" class="form-control" style="width: 320px" id="kategori_surat" name="kategori_surat"
                  value="<?= $kategori['kategori_surat']; ?>">
                <?= form_error('kategori_surat', '<small class="text-danger pl-3">', '</small>'); ?>
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