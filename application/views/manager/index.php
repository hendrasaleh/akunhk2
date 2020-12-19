
<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
	<h5>Kelas : <?= $group['name']; ?></h5>
	<?php if ($group['id'] > 1) : ?>
		<a href="<?= base_url('manager/index/'). ($group['id']-1); ?>" class="btn btn-sm btn-info mb-3">Prev</a>
	<?php endif; ?>
	<?php
		if ($group['id'] > 2 && $group['id'] < 8) {
			for ($i = 2; $i < $group['id']; $i++){
				echo '&nbsp;';
				echo '<a href="' . base_url('manager/index/') . $i. '" class="btn btn-sm btn-info mb-3">' .$i .'</a>';
				echo '&nbsp;';
			}
		}

		if ($group['id'] >= 8 && $group['id'] < 25) {
			for ($i = 2; $i <= 5; $i++){
				echo '&nbsp;';
				echo '<a href="' . base_url('manager/index/') . $i. '" class="btn btn-sm btn-info mb-3">' .$i .'</a>';
				echo '&nbsp;';
			}
			echo '&nbsp;';
			echo '...';
			echo '&nbsp;';
			$id = $group['id']-1;
			for ($i = $id-1; $i < $group['id']; $i++){
				echo '&nbsp;';
				echo '<a href="' . base_url('manager/index/') . $i. '" class="btn btn-sm btn-info mb-3">' .$i .'</a>';
				echo '&nbsp;';
			}
		} 
	?>
	<?php if ($group['id'] < 24) : ?>
		<a href="<?= base_url('manager/index/'). ($group['id']+1); ?>" class="btn btn-sm btn-primary mb-3">Next</a>
	<?php endif; ?>
	<div class="col-lg-8">
		<?= $this->session->flashdata('message'); ?>
		<?= form_error('file', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
	</div>
	<div class="row">
		<div class="col-lg">
			<table class="table table-hover">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Nama Santri</th>
			      <th scope="col">Kelas</th>
			      <th scope="col">Jenis Raport</th>
			      <th scope="col">Tanggal Upload</th>
			      <th scope="col">Action</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php
			  		$i = 1;
			  		foreach ($file as $f) :
			  	?>
			    <tr>
			      <th scope="row"><?= $i; ?></th>
			      <td><?= $f['full_name']; ?></td>
			      <td><?= $f['group_name']; ?></td>
			      <td><?= $f['file_type'] == 'k' ? 'Kemenag' : 'Pondok' ; ?></td>
			      <td><?= date("d-m-Y", $f['date']); ?></td>
			      <td>
			      		<a href="<?= base_url('assets/files/') . $f['name']; ?>" class="badge badge-success">download</a>
			      		<a href="javascript:hapusData(<?= $f['id']; ?>)" class="badge badge-danger">delete</a>
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
		  	window.location.href = "<?= base_url('manager/hapusfile/'); ?>" + id;
		}
	}
</script>
</div>



