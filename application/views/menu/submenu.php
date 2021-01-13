<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

<!-- Isi content -->

  <div class="row">
    <div class="col-lg-6">
      <?php if(validation_errors()) : ?>
        <div class="alert alert-danger" role="alert">
          <?= validation_errors(); ?>
        </div>
      <?php endif; ?>
    </div>
    <div class="col-lg">

      <?= $this->session->flashdata('message'); ?>

		<!-- Button Modal -->
		<a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modalAddsubMenu">Add New Sub Menu</a>

  		<table class="table table-hover">
  			<thead>
  				<tr>
  					<th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Menu</th>
            <th scope="col">URL</th>
            <th scope="col">Icon</th>
            <th scope="col">Active</th>
  					<th scope="col" colspan="2">Action</th>
  				</tr>
  			</thead>
  			<tbody>
  				<?php $i = 1; ?>
  				<?php foreach ($subMenu as $sm) : ?>
  				<tr>
  					<th scope="row"><?= $i; ?></th>
            <td scope="row"><?= $sm['title']; ?></td>
            <td scope="row"><?= $sm['menu']; ?></td>
            <td scope="row"><?= $sm['url']; ?></td>
            <td scope="row"><?= $sm['icon']; ?></td>
            <td scope="row"><?= $sm['is_active']; ?></td>
  					<td width="50">
              <?= anchor('menu/editSubMenu/'.$sm['id'], '<div class="badge badge-secondary">edit</div>') ?>
            </td>
            <td onclick="javascript: return confirm('Are you serious for delete this Menu?')">
              <?= anchor('menu/deleteSubMenu/'.$sm['id'], '<div class="badge badge-danger">delete</div>') ?>
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
<div class="modal fade" id="modalAddsubMenu" tabindex="-1" role="dialog" aria-labelledby="modalAddsubMenu" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalAddsubMenuLabel">
					Add New Sub Menu
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="post" action="<?= base_url('menu/submenu'); ?>">
				<div class="modal-body">
          <div class="form-group">
            <input type="text" name="title" id="title" class="form-control" placeholder="Submenu title">
          </div>
					<div class="form-group">
						<select class="form-control" id="menu_id" name="menu_id">
              <option value="">Select Menu</option>
              <?php foreach ($menu as $m) : ?>
                <option value="<?= $m['id'] ?>"><?= $m['menu'] ?></option>
              <?php endforeach; ?>
            </select>
					</div>
          <div class="form-group">
            <input type="text" name="url" id="url" class="form-control" placeholder="Submenu url">
          </div>
          <div class="form-group">
            <input type="text" name="icon" id="icon" class="form-control" placeholder="Submenu icon">
          </div>
          <div class="form-group">
            <div class="form-check">
              <input type="checkbox" name="is_active" class="form-check-input" value="1" id="is_active" checked>
              <label class="form-check-label" for="is_active">
                Active?
              </label>
            </div>
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