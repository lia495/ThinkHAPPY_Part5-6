<div class="container">
  <div class="row mt-5">
    <div class="col mt-4">

      <div class="row mt-3">
        <div class="col-md-10">
            <a href=">?= base_url(); ?>dosen/tambah" class="btn btn-primary">Tambah Dosen</a>
        </div>
      </div>

      <!-- awal flashdata -->
      <?php if($this->session->flashdata('flash')) : ?>
        <div class="row mt-3">
          <div class="col-md-8">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              Data dosen<strong> Berhasil</strong><?= $this->session->flashdata('flash'); ?>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          </div>
        </div>
      <?php endif; ?>
      <!-- akhir flashdata -->

      <div class="row mt-4">
        <div class="col-md-6">
          <form action="" method="post">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="cari data Dosen..." name="keyword">
              <div class="input-group-append">
                <button class="btn-primary" type="submit">Cari</button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <!-- Daftar nama Dosen -->
      <div class="row mt-4">
          <div class="col-md-6">
          <h3>DAFTAR NAMA DOSEN</h3>
      <ul class="list-group">
          <?php foreach($dosen as $dsn): ?>
      <li class="list-group-item">
      <?= $dsn['namadosen']; ?>
      <a href="<?= base_url();?>dosen/hapus<?= $dsn['id']; ?>" class=" badge bg-danger float-end" onclik="return confirm('Anda Yakin');">Hapus</a>
      <a href="<?= base_url();?>dosen/ubah<?= $dsn['id']; ?>" class=" badge bg-success float-end">Ubah</a>
      <a href="<?= base_url();?>dosen/detail<?= $dsn['id']; ?>" class=" badge bg-primary float-end">detail</a>
        
      </li>
      <?php endforeach; ?>
      </ul>
      </div>
      </div>