<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

<!-- Isi content -->

  <div class="row">
  	<div class="col-lg-6">
  		<?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
      <?= $this->session->flashdata('message'); ?>
		<!-- Button Modal -->
		<!-- <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modalAddRole">Add New Role</a> -->

  		<table class="table table-hover">
  			<thead>
  				<tr>
  					<th scope="col">#</th>
  					<th scope="col">Role</th>
  					<th scope="col">Action</th>
  				</tr>
  			</thead>
  			<tbody>
  				<?php $i = 1; ?>
  				<?php foreach ($role as $r) : ?>
  				<tr>
  					<th scope="row"><?= $i; ?></th>
  					<td scope="row"><?= $r['role']; ?></td>
  					<td scope="row">
  						<a href="<?= base_url('admin/roleaccess/') . $r['id']; ?>" class="badge badge-warning">Access</a>
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
<div class="modal fade" id="modalAddRole" tabindex="-1" role="dialog" aria-labelledby="modalAddRole" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalAddRoleLabel">
					Add New Role
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="post" action="<?= base_url('admin/role'); ?>">
				<div class="modal-body">
					<div class="form-group">
						<input type="text" name="role" id="role" class="form-control" placeholder="Input New Role...">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Add</button>
				</div>
			</form>
		</div>
	</div>
</div>