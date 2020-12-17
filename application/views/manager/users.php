
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
		      <th scope="col">Email</th>
		      <th scope="col">Name</th>
		      <th scope="col">Action</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php
		  		$i = 1;
		  		foreach ($users as $user) :
		  	?>
		    <tr>
		      <th scope="row"><?= $i; ?></th>
		      <td><?= $user['email']; ?></td>
		      <td><?= $user['name']; ?></td>
		      <td>
		      		<a href="assignuser/<?= $user['id']; ?>" class="badge badge-success">assign</a>
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

<script language="JavaScript" type="text/javascript">
	function hapusData(id){
		if (confirm("Apakah anda yakin akan menghapus data ini?")){
		  	window.location.href = 'deleteuser/' + id;
		}
	}
</script>

</div>
<!-- End of Main Content -->


