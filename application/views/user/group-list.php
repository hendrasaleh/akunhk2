
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

  <div class="row">
  	<div class="col-lg-8">

  		<?= $this->session->flashdata('message'); ?>

  		<table class="table table-hover">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Group</th>
		      <th scope="col">Action</th>
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
		      		<a href="upload/<?= $g['id']; ?>" class="badge badge-success">upload</a>
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


