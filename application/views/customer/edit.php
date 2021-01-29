<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

<!-- Isi content -->
  <div class="row">
  	<div class="col-lg-6">
  		<?= form_error('customer', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
      <?= $this->session->flashdata('message'); ?>

      <form method="post" action="<?= base_url('customer/updateCustomer'); ?>">
        <div class="form-group">
				<label>ID Medis</label>
          <input type="hidden" name="id" id="id" value="<?= $editCustomer['id_customer']; ?>">
          <input type="text" name="nomor" id="nomor" class="form-control" value="<?= $editCustomer['nomor']; ?>">
        </div>
        <div class="form-group">
				<label>NIK</label>
          <input type="text" name="nik" id="nik" class="form-control" value="<?= $editCustomer['nik']; ?>">
        </div>
        <div class="form-group">
				<label>Nama</label>
          <input type="text" name="nama" id="nama" class="form-control" value="<?= $editCustomer['nama']; ?>">
        </div>
        <div class="form-group">
				<label>Tempat Tanggal Lahir</label>
          <input type="text" name="ttl" id="ttl" class="form-control" value="<?= $editCustomer['ttl']; ?>">
        </div>
        <div class="form-group">
				<label>Umur</label>
          <input type="text" name="umur" id="umur" class="form-control" value="<?= $editCustomer['umur']; ?>">
        </div>
        <div class="form-group">
				<label>Nomor Telp.</label>
          <input type="text" name="no" id="no" class="form-control" value="<?= $editCustomer['no_telp']; ?>">
        </div>
        
        <div class="form-group">
				<label>Alamat</label>
					<textarea class="form-control" id="alamat" name="alamat" rows="3"><?= $editCustomer['alamat']; ?></textarea>
        </div>
        
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </form>

    </div>
  </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->