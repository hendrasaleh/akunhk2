
<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
	<h5>Kelas : <?= $group['name']; ?></h5>
	<div class="col-lg-8">
		<?= $this->session->flashdata('message'); ?>
		<?php if (validation_errors()) : ?>
  			<div class="alert alert-danger" role="alert">
  				<?= validation_errors(); ?>
  			</div>
  		<?php endif; ?>
	</div>
		<div class="row">
			<div class="col-lg-8">
				<form enctype="multipart/form-data" action="<?= base_url('user/uploadform/'). $group['id']; ?>" method="POST">
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
								<input type="radio" name="r_type" id="r_type" value="k">
								&nbsp;
								<label class="form-check-label" for="radio">Kemenag</label>
							</div>
							<div class="form-check form-check-inline">
								<input type="radio" name="r_type" id="r_type" value="p">
								&nbsp;
								<label class="form-check-label" for="radio">Pondok</label>
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
							<a href="<?= base_url('user/upload/'). $group['id']; ?>" class="btn btn-secondary">Cancel</a>
						</div>
					</div>
				</form>
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

