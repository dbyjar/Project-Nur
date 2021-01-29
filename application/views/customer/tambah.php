<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

<!-- Isi content -->
  <div class="row">
    <div class="col-lg-6">
        <?= form_error('customer', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
        <?= $this->session->flashdata('message'); ?>
      <form method="post" action="<?= base_url('customer/tambahCustomer'); ?>">
        <div class="form-group">
				<label>ID Medis</label>
          <input type="text" name="nomor" id="nomor" class="form-control">
        </div>
        <div class="form-group">
				<label>NIK</label>
          <input type="text" name="nik" id="nik" class="form-control">
        </div>
        <div class="form-group">
				<label>Nama</label>
          <input type="text" name="nama" id="nama" class="form-control">
        </div>
        <div class="form-group">
				<label>Tempat Tanggal Lahir</label>
          <input type="text" name="ttl" id="ttl" class="form-control">
        </div>
        <div class="form-group">
				<label>Umur</label>
          <input type="text" name="umur" id="umur" class="form-control">
        </div>
        <div class="form-group">
				<label>Nomor Telp.</label>
          <input type="text" name="no" id="no" class="form-control">
        </div>
        <div class="form-group">
				<label>Alamat</label>
					<textarea class="form-control" id="alamat" name="alamat" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
      </form>

    </div>
  </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->