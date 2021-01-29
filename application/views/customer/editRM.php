<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

<!-- Isi content -->
  <div class="row">
  	<div class="col-lg-6">
  		<?= form_error('customer', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
      <?= $this->session->flashdata('message'); ?>

      <form method="post" action="<?= base_url('customer/updateRM'); ?>">
        <div class="form-group">
				<label>Tanggal</label>
          <input type="hidden" name="id" id="id" value="<?= $editRM['id_data_customer']; ?>">
          <input type="date" name="tanggal" id="tanggal" class="form-control" value="<?= $editRM['tanggal']; ?>">
        </div>
        <div class="form-group">
				<label>Keluhan</label>
          <input type="text" name="keluhan" id="keluhan" class="form-control" value="<?= $editRM['keluhan']; ?>">
        </div>
        <div class="form-group">
				<label>Diagnosa</label>
          <input type="text" name="diagnosa" id="diagnosa" class="form-control" value="<?= $editRM['diagnosa']; ?>">
        </div>
        <div class="form-group">
				<label>Terapi</label>
          <input type="text" name="terapi" id="terapi" class="form-control" value="<?= $editRM['terapi']; ?>">
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