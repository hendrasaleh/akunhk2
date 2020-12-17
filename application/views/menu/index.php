
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

  <div class="row">
  	<div class="col-lg-6">
		<?php if (validation_errors()) : ?>
			<div class="alert alert-danger" role="alert">
				<?= validation_errors(); ?>
			</div>
		<?php endif; ?>

  		<?= $this->session->flashdata('message'); ?>

  		<a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newMenuModal">Add New Menu</a>
  		<table class="table table-hover">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Menu</th>
		      <th scope="col">Sequence</th>
		      <th scope="col">Action</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php
		  		$i = 1;
		  		foreach ($menu as $m) :
		  	?>
		    <tr>
		      <th scope="row"><?= $i; ?></th>
		      <td><?= $m['menu']; ?></td>
		      <td><?= $m['sequence']; ?></td>
		      <td>
		      		<a href="menu/editmenu/<?= $m['id']; ?>" class="badge badge-success">edit</a>
		      		<a href="javascript:hapusData(<?= $m['id']; ?>)" class="badge badge-danger">delete</a>
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
		  	window.location.href = 'menu/hapusmenu/' + id;
		}
	}
</script>

</div>
<!-- End of Main Content -->

<!-- Modal -->
<div class="modal fade" id="newMenuModal" tabindex="-1" aria-labelledby="newMenuModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newMenuModalLabel">Add New Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('menu'); ?>" method="post">
	      <div class="modal-body">
	        <div class="form-group">
			    <input type="text" class="form-control" id="menu" name="menu" placeholder="Menu name">
		  	</div>
		  	<div class="form-group">
			    <input type="text" class="form-control" id="sequence" name="sequence" placeholder="Menu sequence">
		  	</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">Add</button>
	      </div>
      </form>
    </div>
  </div>
</div>

