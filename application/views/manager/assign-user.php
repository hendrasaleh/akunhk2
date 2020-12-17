
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

  <div class="row">
  	<div class="col-lg-6">

  		<?= $this->session->flashdata('message'); ?>
  		<h5><?= $user['name']; ?></h5>
  		<table class="table table-hover">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Group</th>
		      <th scope="col">Assign</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php
		  		$i = 1;
		  		foreach ($group as $g) :
		  	?>
		    <tr>
		      <th scope="row"><?= $i; ?></th>
		      <td><?= $g['name']; ?></td>
		      <td>
				<div class="form-check">
					<input class="form-check-group" type="checkbox" <?= check_assignment($user['id'], $g['id']); ?> data-user="<?= $user['id']; ?>" data-group="<?= $g['id']; ?>">
				</div>
		      </td>
		    </tr>
			<?php
				$i++;
				endforeach;
			?>
		  </tbody>
		</table>
  	</div>
  </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

