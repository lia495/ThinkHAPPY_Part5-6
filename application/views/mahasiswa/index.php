<div class="container">
	<div class="row mt-5">
		<div class="col mt-4">

      <!-- awal validasi error -->
      <?php if(validation_errors()) : ?>
        <div class="alert alert-danger" role="alert">
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          <?= validation_errors(); ?>
        </div>
      <?php endif; ?>
      <!-- akhir validasi error -->

      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Tambah Data
      </button>

      <div class="row mt-3">
        <div class="col-md-10">

      <!-- awal flashdata -->
      <?php if($this->session->flashdata('flash')) : ?>
        <div class="row mt-1">
          <div class="col-md-15">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              Data Mahasiswa<strong> Berhasil</strong><?= $this->session->flashdata('flash'); ?>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          </div>
        </div>
      <?php endif; ?>
      <!-- akhir flashdata -->

      <div class="row mt-1">
        <div class="col">
          <form action="" method="post">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Telusuri" name="keyword">
              <div class="input-group-append">
                <button class="btn-primary" type="submit">Cari</button>
              </div>
            </div>
          </form>
        </div>
      </div>
            
      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Masukan Data</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('mahasiswa')?>" method="post">
              <div class="form group">
                <label for="kode">Kode</label>
                <input type="numeric" name="kode" class="form-control" id="kode" placeholder="Masukan Kode">
              </div>
               <div class="form group">
                <label for="matakuliah">Matakuliah</label>
                <input type="text" name="matakuliah" class="form-control" id="matakuliah" placeholder="Masukan Matakuliah">
              </div>
               <div class="form group">
                <label for="sks">Sks</label>
                <input type="numeric" name="sks" class="form-control" id="sks" placeholder="Masukan Sks">
              </div>
               <div class="form group">
                <label for="semester">Semester</label>
                <input type="numeric" name="semester" class="form-control" id="semester" placeholder="Masukan Semester">
              </div>
              <div class="form group">
                <label for="jurusan">Jurusan</label>
                <select class="form-select" id="jurusan" name="jurusan">
                  <option value="">Pilih:</option>
                  <?php foreach($jurusan as $j): ?>
                  <option><?= $j['namajurusan']; ?></option>
                <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </form>
          </div>
        </div>
      </div>            

<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Kode</th>
      <th scope="col">Matakuliah</th>
      <th scope="col">Sks</th>
      <th scope="col">Semester</th>
      <th scope="col">Jurusan</th>
      <th scope="col">Edit Data</th>
    </tr>
  </thead>
  <tbody>
   <?php foreach($mahasiswa as $mhs): ?>
   	<tr>
   		<th scope="row"><?=$mhs['kode']; ?></th>
   		<td><?=$mhs['matakuliah']; ?></td>
   		<td><?=$mhs['sks']; ?></td>
   		<td><?=$mhs['semester']; ?></td>
   		<td><?=$mhs['jurusan']; ?></td>
   		<td>
   			<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal<?= $mhs['id']; ?>">
        Edit</button>
   			<a href="<?= base_url(); ?>mahasiswa/hapus/<?= $mhs['id']; ?>" class=" btn btn-danger" onclick="return confirm('Yakin Ingin Melanjutkan? Ini Tidak Dapat Dibatalkan!');">Hapus</a>
   		</td>
   	</tr>
    <?php endforeach; ?>
  </tbody>
</table>
		</div>
	</div>
</div>

<!-- awal modal edit -->
 <?php $no = 0 ; foreach($mahasiswa as $mhs) : $no++; ?>
      <div class="modal fade" id="editModal<?= $mhs['id']; ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="editModalLabel">Edit Data</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <?= form_open_multipart('mahasiswa/ubah'); ?>
               <input type="hidden" name="id" value="<?= $mhs['id']; ?>">

              <div class="form group">
                <label for="kode">Kode</label>
                <input type="numeric" name="kode" class="form-control" value="<?= $mhs['kode']; ?>" id="kode" placeholder="Masukan Kode" readonly>
              </div>
               <div class="form group">
                <label for="matakuliah">Matakuliah</label>
                <input type="text" name="matakuliah" class="form-control" value="<?= $mhs['matakuliah']; ?>" id="matakuliah" placeholder="Masukan Matakuliah">
              </div>
               <div class="form group">
                <label for="sks">Sks</label>
                <input type="numeric" name="sks" class="form-control" value="<?= $mhs['sks']; ?>" id="sks" placeholder="Masukan Sks">
              </div>
               <div class="form group">
                <label for="semester">Semester</label>
                <input type="numeric" name="semester" class="form-control" value="<?= $mhs['semester']; ?>" id="semester" placeholder="Masukan Semester">
              </div>
               <div class="form group">
                <label for="jurusan">Jurusan</label>
                <select class="form-select" id="jurusan" name="jurusan">
                  <option value="">Pilih:</option>
                  <?php foreach($jurusan as $j): ?>
                  <option><?= $j['namajurusan']; ?></option>
                <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </form>
          </div>
        </div>
      </div>
<?php endforeach; ?>
<!-- akhir modal edit -->

