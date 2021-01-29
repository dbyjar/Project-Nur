<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

<!-- Isi content -->

  <div class="row">
  	<div class="col-lg">
  		<?= form_error('customer', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
      <?= $this->session->flashdata('message'); ?>

			<form class="row g-3" method="post" action="<?= base_url() ?>customer/search">
				<div class="col-auto">
					<input type="text" class="form-control" name="keyword" id="keyword" placeholder="Cari Nama Customer">
				</div>
				<div class="col-auto">
					<button type="submit" class="btn btn-primary mb-3">Cari</button>
				</div>
			</form>

			<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">NIK</th>
      <th scope="col">Nama</th>
      <th scope="col">Tempat Tanggal Lahir</th>
      <th scope="col">Umur</th>
      <th scope="col">Alamat</th>
      <th scope="col">No. Telp</th>
      <th scope="col" colspan="2">Aksi</th>
    </tr>
  </thead>
  <tbody>   
			<?php
				if(!empty($customer)){ // Jika data pada database tidak sama dengan empty (alias ada datanya)
					$i = 1;
					foreach($customer as $customers){ // Lakukan looping pada variabel siswa dari controller
			?>
				<tr>
				<th scope="row"><?= $i; ?></th>
				<td scope="row"><?= $customers['nik']; ?></td>
				<td scope="row"><?= $customers['nama']; ?></td>
				<td scope="row"><?= $customers['ttl']; ?></td>
				<td scope="row"><?= $customers['umur']; ?></td>
				<td scope="row"><?= $customers['alamat']; ?></td>
				<td scope="row"><?= $customers['no_telp']; ?></td>
				<td>
					<?= anchor('customer/rekamMedis/'.$customers['id_customer'], '<div class="badge badge-primary">rekam</div>') ?>
				</td>
				<td>
					<?= anchor('customer/editCustomer/'.$customers['id_customer'], '<div class="badge badge-warning">lihat</div>') ?>
				</td>
				<td onclick="javascript: return confirm('Are you serious for delete this Menu?')">
					<?= anchor('customer/deleteCustomer/'.$customers['id_customer'], '<div class="badge badge-danger">delete</div>') ?>
				</td>
			</tr>
			<?php $i++; ?>
			<?php
					}
				}else{ // Jika data tidak ada
					echo "<th scope='row'>Data tidak ada!</th>";
				}
			?>



		</tbody>
	</table>
		</div>
  </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->