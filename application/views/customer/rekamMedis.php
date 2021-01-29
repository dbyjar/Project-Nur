<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

<!-- Isi content -->
  <div class="row">
  	<div class="col-lg">

			<table>
				<tr>
					<td>ID Medis</td>
					<td width="20"><center>:</center></td>
					<td><?= $userRM['nomor']; ?></td>
				</tr>
				<tr>
					<td>Nama</td>
					<td width="20"><center>:</center></td>
					<td><?= $userRM['nama']; ?></td>
				</tr>
				
			</table>

			<a href="" class="btn btn-primary my-3" data-toggle="modal" data-target="#modalAddRekam">Tambah</a>

      <table class="table table-hover">
  			<thead>
  				<tr>
  					<th scope="col">#</th>
  					<th scope="col">Tanggal</th>
  					<th scope="col">Keluhan</th>
  					<th scope="col">Diagnosa</th>
  					<th scope="col">Terapi</th>
  					<th scope="col" colspan="2">Action</th>
  				</tr>
  			</thead>
  			<tbody>
  				<?php $i = 1; ?>
  				<?php foreach ($rekamMedis as $row) : ?>
  				<tr>
  					<th scope="row"><?= $i; ?></th>
  					<td scope="row"><?= $row['tanggal']; ?></td>
  					<td scope="row"><?= $row['keluhan']; ?></td>
  					<td scope="row"><?= $row['diagnosa']; ?></td>
  					<td scope="row"><?= $row['terapi']; ?></td>
  					<td width="50">
              <?= anchor('customer/editRM/'.$row['id_data_customer'], '<div class="badge badge-secondary">edit</div>') ?>
            </td>
            <td onclick="javascript: return confirm('Are you serious for delete this Data?')">
              <?= anchor('customer/deleteRM/'.$row['id_data_customer'], '<div class="badge badge-danger">delete</div>') ?>
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
<div class="modal fade" id="modalAddRekam" tabindex="-1" role="dialog" aria-labelledby="modalAddRekam" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalAddRekamLabel">
					Tambah data rekam medis
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="post" action="<?= base_url('customer/tambahRM'); ?>">
				<div class="modal-body">
					<div class="form-group">
						<input type="hidden" name="id_customer" id="id_customer" class="form-control" value="<?= $userRM['id_customer']; ?>">
						<input type="date" name="tanggal" id="tanggal" class="form-control" placeholder="Input Tanggal...">
					</div>
					<div class="form-group">
						<input type="text" name="keluhan" id="keluhan" class="form-control" placeholder="Input Keluhan...">
					</div>
					<div class="form-group">
						<input type="text" name="diagnosa" id="diagnosa" class="form-control" placeholder="Input Diagnosa...">
					</div>
					<div class="form-group">
						<input type="text" name="terapi" id="terapi" class="form-control" placeholder="Input Terapi...">
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