<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

<!-- Isi content -->
<div class="row">
	<div class="col-lg-6">

	<?php foreach ($editSubMenu as $id) : ?>

		<form method="post" action="<?= base_url('menu/updateSubMenu'); ?>">
			<input type="hidden" name="id" id="id" class="form-control" value="<?= $id['id']; ?>">
			<div class="form-group">
				<label>Title</label>
				<input type="text" name="title" id="title" class="form-control" value="<?= $id['title']; ?>">
			</div>
			<div class="form-group">
				<label>Menu</label>
				<select class="form-control" id="menu_id" name="menu_id">
					<option value="">Select Menu</option>
					<?php foreach ($menu as $m) : ?>
					<option value="<?= $m['id'] ?>"><?= $m['menu'] ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="form-group">
				<label>URL</label>
				<input type="text" name="url" id="url" class="form-control" value="<?= $id['url']; ?>">
			</div>
			<div class="form-group">
				<label>Icon</label>
				<input type="text" name="icon" id="icon" class="form-control" value="<?= $id['icon']; ?>">
			</div>
			<input type="hidden" name="is_active" class="form-control" value="<?= $id['is_active']; ?>">
			<button type="submit" class="btn btn-primary">Update</button>
		</form>

	<?php endforeach; ?>

	</div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content