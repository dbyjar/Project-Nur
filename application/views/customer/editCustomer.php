<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

<!-- Isi content -->
  <div class="row">
  	<div class="col-lg">
  		<?= form_error('customer', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
      <?= $this->session->flashdata('message'); ?>

      <form method="post" action="<?= base_url('customer/updateCustomer'); ?>">
      <div class="row">
        <div class="form-group col">
				<label>Nama</label>
          <input type="hidden" name="id" id="id" value="<?= $editCustomer['id_customer']; ?>">
          <input type="text" name="nama" id="nama" class="form-control" value="<?= $editCustomer['nama']; ?>">
        </div>
        <div class="form-group col">
				<label>Umur</label>
          <input type="text" name="umur" id="umur" class="form-control" value="<?= $editCustomer['umur']; ?>">
        </div>
        <div class="form-group col">
				<label>Nomor Telp.</label>
          <input type="text" name="no" id="no" class="form-control" value="<?= $editCustomer['no_telp']; ?>">
        </div>
      </div>
        
        <div class="form-group">
				<label>Alamat</label>
					<textarea class="form-control" id="alamat" name="alamat" rows="3"><?= $editCustomer['alamat']; ?></textarea>
        </div>
        
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </form>

      <table class="table table-hover">
  			<thead>
  				<tr>
  					<th scope="col">#</th>
  					<th scope="col">Nama</th>
  					<th scope="col">Tanggal</th>
  					<th scope="col">Keluhan</th>
  					<th scope="col">Diagnosa</th>
  					<th scope="col">Terapi</th>
  					<th scope="col" colspan="2">Action</th>
  				</tr>
  			</thead>
  			<tbody>
  				<?php $i = 1; ?>
  				<?php foreach ($data_customer as $dc) : ?>
  				<tr>
  					<th scope="row"><?= $i; ?></th>
  					<td scope="row"><?= $dc['nama']; ?></td>
  					<td scope="row"><?= $dc['tanggal']; ?></td>
  					<td scope="row"><?= $dc['keluhan']; ?></td>
  					<td scope="row"><?= $dc['diagnosa']; ?></td>
  					<td scope="row"><?= $dc['terapi']; ?></td>
  					<td width="50">
              <?= anchor('menu/editMenu/'.$dc['id_customer'], '<div class="badge badge-secondary">edit</div>') ?>
            </td>
            <td onclick="javascript: return confirm('Are you serious for delete this Menu?')">
              <?= anchor('menu/deleteMenu/'.$dc['id_customer'], '<div class="badge badge-danger">delete</div>') ?>
            </td>
  				</tr>
  				<?php $i++; ?>
  				<?php endforeach; ?>
  			</tbody>
  		</table>

    </div>
  </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->