<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Laporan Studi Kasus Surat Masuk dan Surat Keluar</title>
  <style>
  /* CSS untuk layout dokumen */
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
  }

  .container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
  }

  /* CSS untuk judul dan subjudul */
  .title {
    text-align: center;
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 20px;
  }

  .subtitle {
    text-align: center;
    font-size: 18px;
    margin-bottom: 20px;
  }

  /* CSS untuk tabel */
  table {
    border-collapse: collapse;
    width: 100%;
  }

  td,
  th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
  }

  tr:nth-child(even) {
    /* Menambahkan gradien warna dari kuning ke hijau */
    background: linear-gradient(to right, #FFFF00, #00FF00);
  }
  </style>
</head>

<body>
  <div class="container">
    <!-- Judul dokumen -->
    <div class="title">Laporan Surat Kaluar</div>
    <!-- Subjudul dokumen -->
    <div class="subtitle">Periode <?= date('d-m-Y', strtotime($tglawal)); ?> -
      <?= date('d-m-Y', strtotime($tglakhir)); ?></div>
    <!-- Tabel data surat masuk -->
    <table>
      <tr>
        <th>No</th>
        <th>Nomor Surat</th>
        <th>Pengirim</th>
        <th>Penerima</th>
        <th>Perihal</th>
        <th>Keterangan</th>
        <th>Kategori</th>
        <th>Divisi</th>
        <th>Tanggal Suarat</th>
      </tr>
      <?php $i = 1; ?>
      <?php foreach ($laporan as $data) : ?>
      <tr>
        <td><?= $i; ?></td>
        <td><?= $data['nomor_surat']; ?></td>
        <td><?= $data['pengirim']; ?></td>
        <td><?= $data['penerima']; ?></td>
        <td><?= $data['perihal']; ?></td>
        <td><?= $data['ket']; ?></td>
        <td><?= $data['kategori_surat']; ?></td>
        <td><?= $data['divisi']; ?></td>
        <td><?= date('d-m-Y', strtotime($data['tanggal_surat'])); ?></td>
      </tr>
      <?php $i++; ?>
      <?php endforeach; ?>
      <!-- Tambahkan baris data lainnya sesuai dengan jumlah surat masuk yang ada -->
    </table>

  </div>
</body>

</html>