<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

<!-- Isi content -->

  <div class="row">
  	<div class="col-lg-6">
  		<?= form_error('customer', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
      <?= $this->session->flashdata('message'); ?>
		<!-- Button Modal -->
		<a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modalAddCustomer">Tambah Customer</a>

  		<table class="table table-hover">
  			<thead>
  				<tr>
  					<th scope="col">#</th>
  					<th scope="col">Nama</th>
  					<th scope="col">Umur</th>
  					<th scope="col">Alamat</th>
  					<th scope="col">No. Telp</th>
  					<th scope="col" colspan="2">Aksi</th>
  				</tr>
  			</thead>
  			<tbody>
  				<?php $i = 1; ?>
  				<?php foreach ($customer as $cs) : ?>
  				<tr>
  					<th scope="row"><?= $i; ?></th>
  					<td scope="row"><?= $cs['nama']; ?></td>
  					<td scope="row"><?= $cs['umur']; ?></td>
  					<td scope="row"><?= $cs['alamat']; ?></td>
  					<td scope="row"><?= $cs['no_telp']; ?></td>
  					<td width="50">
              <?= anchor('customer/editCustomer/'.$cs['id_customer'], '<div class="badge badge-secondary">lihat</div>') ?>
            </td>
            <td onclick="javascript: return confirm('Are you serious for delete this Menu?')">
              <?= anchor('customer/deleteCustomer/'.$cs['id_customer'], '<div class="badge badge-danger">delete</div>') ?>
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


<!-- Modal -->
<div class="modal fade" id="modalAddCustomer" tabindex="-1" role="dialog" aria-labelledby="modalAddCustomer" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalAddCustomerLabel">
					Tambah Customer
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="post" action="<?= base_url('customer'); ?>">
				<div class="modal-body">
					<div class="form-group">
						<input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Pelanggan">
					</div>
					<div class="form-group">
						<input type="text" name="umur" id="umur" class="form-control" placeholder="Umur">
					</div>
					<div class="form-group">
						<input type="text" name="alamat" id="alamat" class="form-control" placeholder="Alamat">
					</div>
					<div class="form-group">
						<input type="text" name="no" id="no" class="form-control" placeholder="Nomor Telp.">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-dark" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn btn-primary">Tambah</button>
				</div>
			</form>
		</div>
	</div>
</div>