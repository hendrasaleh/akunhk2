
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
          		<div class="card">
					<div class="card-header">
					Manage User
					</div>
					<div class="card-body">
						
						<form action="<?= base_url('admin/manageuser'); ?>/<?= $user['id'] ?>" method="post">
					      <div class="modal-body">
					        <div class="form-group row">
								<label for="email" class="col-sm-4 col-form-label">Email</label>
								<div class="col-sm-8">
							    	<input type="text" class="form-control" id="email" name="email" placeholder="" value="<?= $user['email']; ?>" readonly>
							    </div>
						  	</div>
						  	<div class="form-group row">
								<label for="email" class="col-sm-4 col-form-label">Name</label>
								<div class="col-sm-8">
							    	<input type="text" class="form-control" id="name" name="name" placeholder="" value="<?= $user['name']; ?>">
							    </div>
						  	</div>
						  	<div class="form-group row">
								<label for="email" class="col-sm-4 col-form-label">Role</label>
								<div class="col-sm-8">
									<select name="role_id" id="role_id" class="form-control">
										<option value="<?= $user['role_id']; ?>"><?= $user['role']; ?></option>
										<?php foreach ($role as $r) : ?>
											<option value="<?= $r['id']; ?>"><?= $r['role']; ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<div class="form-group">
						  		<div class="form-check">
									<input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
									<label class="form-check-label" for="is_active">
										Active?
									</label>
								</div>
						  	</div>
					      </div>
						<a href="<?= base_url('admin/users'); ?>" class="btn btn-secondary">Cancel</a>
						<button type="submit" class="btn btn-primary">Save</button>
						</form>
						
					</div>
				</div>
          	</div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
