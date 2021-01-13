<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

<!-- Isi content -->
<div class="row">
	<div class="col-lg-6">

	<?php foreach ($editMenu as $id) : ?>

		<form method="post" action="<?= base_url('menu/updateMenu'); ?>">
			<div class="form-group">
				<input type="hidden" name="id" id="id" class="form-control" value="<?= $id['id']; ?>">
			</div>
			<div class="form-group">
				<label>Name</label>
				<input type="text" name="menu" id="menu" class="form-control" value="<?= $id['menu']; ?>">
			</div>
			<button type="submit" class="btn btn-primary">Update</button>
		</form>

	<?php endforeach; ?>

	</div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->