<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

<!-- Isi content -->

  <div class="row">
  	<div class="col-lg">
  		<?= form_error('customer', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
      <?= $this->session->flashdata('message'); ?>

  		<table class="table table-hover">
  			<thead>
  				<tr>
  					<th scope="col">#</th>
  					<th scope="col">ID Medis</th>
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
  					<td scope="row"><?= $cs['nomor']; ?></td>
  					<td scope="row"><?= $cs['nama']; ?></td>
  					<td scope="row"><?= $cs['umur']; ?></td>
  					<td scope="row"><?= $cs['alamat']; ?></td>
  					<td scope="row"><?= $cs['no_telp']; ?></td>
  					<td width="50">
              <?= anchor('customer/rekamMedis/'.$cs['id_customer'], '<div class="badge badge-primary">lihat</div>') ?>
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