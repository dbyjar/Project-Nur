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
		<a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modalAddMenu">Add New Menu</a>

  		<table class="table table-hover">
  			<thead>
  				<tr>
  					<th scope="col">#</th>
  					<th scope="col">Menu</th>
  					<th scope="col" colspan="2">Action</th>
  				</tr>
  			</thead>
  			<tbody>
  				<?php $i = 1; ?>
  				<?php foreach ($menu as $mn) : ?>
  				<tr>
  					<th scope="row"><?= $i; ?></th>
  					<td scope="row"><?= $mn['menu']; ?></td>
  					<td width="50">
              <?= anchor('menu/editMenu/'.$mn['id'], '<div class="badge badge-secondary">edit</div>') ?>
            </td>
            <td onclick="javascript: return confirm('Are you serious for delete this Menu?')">
              <?= anchor('menu/deleteMenu/'.$mn['id'], '<div class="badge badge-danger">delete</div>') ?>
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
<div class="modal fade" id="modalAddMenu" tabindex="-1" role="dialog" aria-labelledby="modalAddMenu" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalAddMenuLabel">
					Add New Menu
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="post" action="<?= base_url('menu'); ?>">
				<div class="modal-body">
					<div class="form-group">
						<input type="text" name="menu" id="menu" class="form-control" placeholder="Input New Menu...">
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