<?php
ob_start();
session_start();
if (isset($_SESSION['iduser'])) {
	include '../../../config/db.php';
	if (isset($_POST['action'])) {
		$action = $_POST['action'];
		if ($action == 'create') {
?>
<div class="card card-bordered card-full">
	<div class="card-inner-group">
		<div class="card-inner">
			<div class="card-title-group">
				<div class="card-title">
					<h6 class="title">Add User</h6>
				</div>
				<div class="card-tools">
					<button id="close_btn" type="button" class="btn btn-sm btn-icon btn-danger"><em class="icon ni ni-cross"></em></button>
				</div>
			</div>
		</div>
		<div class="card-inner card-inner-md">
			<form id="form" method="post">
				<div class="form-group">
					<label class="form-label">Username</label>
					<div class="form-control-wrap">
						<input id="old" type="hidden">
						<input id="username" type="text" name="username" class="form-control" autocomplete="off" required="required">
						<span id="helper" class="text-danger"></span>
					</div>
				</div>
				<div class="form-group">
					<label class="form-label">Password</label>
					<div class="form-control-wrap">
						<input id="password" type="password" name="password" class="form-control" autocomplete="off" required="required">
					</div>
				</div>
				<div class="form-group">
					<label class="form-label">Name</label>
					<div class="form-control-wrap">
						<input id="name" type="text" name="name" class="form-control" autocomplete="off" required="required">
					</div>
				</div>
				<div class="form-group">
					<label class="form-label">Role</label>
					<div class="form-control-wrap">
						<select id="role" class="form-control select2" name="role" required="required">
							<option></option>
							<option value="Super Admin">Super Admin</option>
							<option value="Admin">Admin</option>
							<option value="Pegawai">Pegawai</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<input id="action" type="hidden" name="action" value="<?php echo $action; ?>">
					<button id="submit_btn" type="submit" class="btn btn-primary">Save</button>
				</div>
			</form>
		</div>
	</div>
</div>
<?php
		}
		if ($action == 'update') {
			$id = $_POST['id'];
			$query = mysqli_query($con, "select * from users where iduser = '$id'");
			$data = mysqli_fetch_array($query, MYSQLI_ASSOC);
?>
<div class="card card-bordered card-full">
	<div class="card-inner-group">
		<div class="card-inner">
			<div class="card-title-group">
				<div class="card-title">
					<h6 class="title">Edit User</h6>
				</div>
				<div class="card-tools">
					<button id="close_btn" type="button" class="btn btn-sm btn-icon btn-danger"><em class="icon ni ni-cross"></em></button>
				</div>
			</div>
		</div>
		<div class="card-inner card-inner-md">
			<form id="form" method="post">
				<div class="form-group">
					<label class="form-label">Username</label>
					<div class="form-control-wrap">
						<input id="old" type="hidden" value="<?php echo $data['username']; ?>">
						<input id="username" type="text" name="username" class="form-control" autocomplete="off" required="required" value="<?php echo $data['username']; ?>">
						<span id="helper" class="text-danger"></span>
					</div>
				</div>
				<div class="form-group">
					<label class="form-label">Name</label>
					<div class="form-control-wrap">
						<input id="name" type="text" name="name" class="form-control" autocomplete="off" required="required" value="<?php echo $data['name']; ?>">
					</div>
				</div>
				<div class="form-group">
					<label class="form-label">Role</label>
					<div class="form-control-wrap">
						<select id="role" class="form-control select2" name="role" required="required">
							<option></option>
							<option value="Super Admin"<?php if ($data['role'] == 'Super Admin') { echo ' selected'; } ?>>Superadmin</option>
							<option value="Admin"<?php if ($data['role'] == 'Admin') { echo ' selected'; } ?>>Admin</option>
							<option value="Pegawai"<?php if ($data['role'] == 'Pegawai') { echo ' selected'; } ?>>Admin</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<input id="id" type="hidden" name="id" value="<?php echo $id; ?>">
					<input id="action" type="hidden" name="action" value="<?php echo $action; ?>">
					<button id="submit_btn" type="submit" class="btn btn-primary">Save</button>
				</div>
			</form>
		</div>
	</div>
</div>
<?php
		}
		if ($action == 'delete') {
			$id = $_POST['id'];
			$query = mysqli_query($con, "select * from users where iduser = '$id'");
			$data = mysqli_fetch_array($query, MYSQLI_ASSOC);
?>
<div class="card card-bordered card-full">
	<div class="card-inner-group">
		<div class="card-inner">
			<div class="card-title-group">
				<div class="card-title">
					<h6 class="title">Remove User</h6>
				</div>
				<div class="card-tools">
					<button id="close_btn" type="button" class="btn btn-sm btn-icon btn-danger"><em class="icon ni ni-cross"></em></button>
				</div>
			</div>
		</div>
		<div class="card-inner card-inner-md">
			<form id="form" method="post">
				<p>Are you sure to delete <strong><?php echo $data['username']; ?></strong> from database?</p>
				<div class="form-group">
					<input id="id" type="hidden" name="id" value="<?php echo $id; ?>">
					<input id="action" type="hidden" name="action" value="<?php echo $action; ?>">
					<button id="submit_btn" type="submit" class="btn btn-danger">Yes</button>
					<button id="close_btn" type="button" class="btn btn-light">No</button>
				</div>
			</form>
		</div>
	</div>
</div>
<?php
		}
		if ($action == 'password') {
			$id = $_POST['id'];
			$query = mysqli_query($con, "select * from users where iduser = '$id'");
			$data = mysqli_fetch_array($query, MYSQLI_ASSOC);
?>
<div class="card card-bordered card-full">
	<div class="card-inner-group">
		<div class="card-inner">
			<div class="card-title-group">
				<div class="card-title">
					<h6 class="title">Change Password</h6>
				</div>
				<div class="card-tools">
					<button id="close_btn" type="button" class="btn btn-sm btn-icon btn-danger"><em class="icon ni ni-cross"></em></button>
				</div>
			</div>
		</div>
		<div class="card-inner card-inner-md">
			<form id="form" method="post">
				<div class="form-group">
					<label class="form-label">Username</label>
					<div class="form-control-wrap">
						<input id="username" type="text" name="username" class="form-control" autocomplete="off" required="required" value="<?php echo $data['username']; ?>" readonly>
					</div>
				</div>
				<div class="form-group">
					<label class="form-label">New Password</label>
					<div class="form-control-wrap">
						<input id="password" type="text" name="password" class="form-control" autocomplete="off" required="required">
					</div>
				</div>
				<div class="form-group">
					<input id="id" type="hidden" name="id" value="<?php echo $id; ?>">
					<input id="action" type="hidden" name="action" value="<?php echo $action; ?>">
					<button id="submit_btn" type="submit" class="btn btn-primary">Save</button>
				</div>
			</form>
		</div>
	</div>
</div>
<?php
		}
		if ($action == 'validate') {
			$id = $_POST['id'];
			$old = $_POST['old'];
			if ($id == $old) {
				echo 'ok';
			}
			if ($id <> $old) {
				$query = mysqli_query($con, "select * from users where username = '$id'");
				if (mysqli_num_rows($query) <> 0) {
					echo 'exist';
				}
				if (mysqli_num_rows($query) == 0) {
					echo 'ok';					
				}
			}
		}
	}
}
?>