
<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
	<h5>Kelas : <?= $group['name']; ?></h5>
	<div class="col-lg-8">
		<?= $this->session->flashdata('message'); ?>
		<?= form_error('file', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
	</div>

	<div class="row">
		<div class="col-lg-8">
			<form enctype="multipart/form-data" action="user/upload/" method="POST">
				<div class="form-group row">
					<label for="email" class="col-sm-2 col-form-label">Email</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>
						<input type="hidden" name="group_id" value="<?= $group['id']; ?>">
					</div>
				</div>
				<div class="form-group row">
					<label for="email" class="col-sm-2 col-form-label">Student</label>
					<div class="col-sm-10">
						<select name="student_id" id="student_id" class="form-control">
							<option value="">Select Student</option>
							<?php foreach ( $student as $s ) : ?>
								<option value="<?= $s['id']; ?>"><?= $s['full_name']; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
				<div class="form-group row">
					<label for="email" class="col-sm-2 col-form-label">Report Type</label>
					<div class="col-sm-10">
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="r_type" id="r_type" value="k">
							<label class="form-check-label" for="inlineRadio1">Kemenag</label>
						</div>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="r_type" id="r_type" value="p">
							<label class="form-check-label" for="inlineRadio2">Pondok</label>
						</div>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-sm-2">File</div>
					<div class="col-sm-10">
						<div class="custom-file">
							<input type="file" class="custom-file-input" id="file" name="file" accept="application/pdf, application/vnd.openxmlformats-officedocument.presentationml.presentation, application/vnd.ms-powerpoint, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document, application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
							<label class="custom-file-label" for="file">Choose file</label>
						</div>
					</div>
				</div>
				<div class="form-group row justify-content-end">
					<div class="col-sm-10">
						<button type="submit" class="btn btn-primary">Upload</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="row">
		<div class="col-lg">
			<table class="table table-hover">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Nama Santri</th>
			      <th scope="col">Nama File</th>
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
			      <td><?= $f['student_id']; ?></td>
			      <td><?= $f['name']; ?></td>
			      <td><?= $f['file_type']; ?></td>
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
		  	window.location.href = 'hapusfile/' + id;
		}
	}
</script>
</div>



