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
								<h6 class="title">Add pasien</h6>
							</div>
							<div class="card-tools">
								<button id="close_btn" type="button" class="btn btn-sm btn-icon btn-danger"><em class="icon ni ni-cross"></em></button>
							</div>
						</div>
					</div>
					<div class="card-inner card-inner-md">
						<form id="form" method="post">
							<div class="form-group">
								<label class="form-label">NIK</label>
								<div class="form-control-wrap">
									<input id="old" type="hidden">
									<input id="nik" type="text" maxlength="16" name="nik" class="form-control" autocomplete="off" required="required">
									<span id="helper" class="text-danger"></span>
								</div>
							</div>
							<div class="form-group">
								<label class="form-label">Nama</label>
								<div class="form-control-wrap">
									<input id="nmpasien" type="text" name="nmpasien" class="form-control" autocomplete="off" required="required">
									<span id="helper" class="text-danger"></span>
								</div>
							</div>
							<div class="form-group">
								<label class="form-label">Tempat Lahir</label>
								<div class="form-control-wrap">
									<input id="tempat_lahir" type="text" name="tempat_lahir" class="form-control" autocomplete="off" required="required">
									<span id="helper" class="text-danger"></span>
								</div>
							</div>
							<div class="form-group">
								<label class="form-label">Tanggal Lahir</label>
								<div class="form-control-wrap">
									<input id="tanggal_lahir" type="date" name="tanggal_lahir" class="form-control" autocomplete="off" required="required">
									<span id="helper" class="text-danger"></span>
								</div>
							</div>
							<div class="form-group">
								<label class="form-label">Jenis Kelamin</label>
								<div class="form-control-wrap">
									<select id="jk" class="form-control select2" name="jk" required="required">
										<option></option>
										<option value="L">Laki-laki</option>
										<option value="P">Perempuan</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="form-label">Agama</label>
								<div class="form-control-wrap">
									<select id="agama" class="form-control select2" name="agama" required="required">
										<option></option>
										<option value="Islam">Islam</option>
										<option value="Hindu">Hindu</option>
										<option value="Kristen">Kristen</option>
										<option value="Katholik">Katholik</option>
										<option value="Budha">Budha</option>
										<option value="Konghucu">Konghucu</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="form-label">Pekerjaan</label>
								<div class="form-control-wrap">
									<input id="pekerjaan" type="text" name="pekerjaan" class="form-control" autocomplete="off" required="required">
									<span id="helper" class="text-danger"></span>
								</div>
							</div>
							<div class="form-group">
								<label class="form-label">Alamat</label>
								<div class="form-control-wrap">
									<input id="alamat" type="text" name="alamat" class="form-control" autocomplete="off" required="required">
									<span id="helper" class="text-danger"></span>
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
			$query = mysqli_query($con, "select * from pasien where idpasien = '$id'");
			$data = mysqli_fetch_array($query, MYSQLI_ASSOC);
		?>
			<div class="card card-bordered card-full">
				<div class="card-inner-group">
					<div class="card-inner">
						<div class="card-title-group">
							<div class="card-title">
								<h6 class="title">Edit pasien</h6>
							</div>
							<div class="card-tools">
								<button id="close_btn" type="button" class="btn btn-sm btn-icon btn-danger"><em class="icon ni ni-cross"></em></button>
							</div>
						</div>
					</div>
					<div class="card-inner card-inner-md">
						<form id="form" method="post">
							<div class="form-group">
								<label class="form-label">NIK</label>
								<div class="form-control-wrap">
									<input id="old" type="hidden" value="<?php echo $data['nik']; ?>">
									<input id="nik" type="text" maxlength="16" name="nik" class="form-control" autocomplete="off" required="required" value="<?php echo $data['nik']; ?>">
									<span id="helper" class="text-danger"></span>
								</div>
							</div>
							<div class="form-group">
								<label class="form-label">Nama</label>
								<div class="form-control-wrap">
									<input id="nmpasien" type="text" name="nmpasien" class="form-control" autocomplete="off" required="required" value="<?php echo $data['nmpasien']; ?>">
									<span id="helper" class="text-danger"></span>
								</div>
							</div>
							<div class="form-group">
								<label class="form-label">Tempat Lahir</label>
								<div class="form-control-wrap">
									<input id="tempat_lahir" type="text" name="tempat_lahir" class="form-control" autocomplete="off" required="required" value="<?php echo $data['tempat_lahir']; ?>">
									<span id="helper" class="text-danger"></span>
								</div>
							</div>
							<div class="form-group">
								<label class="form-label">Tanggal Lahir</label>
								<div class="form-control-wrap">
									<input id="tanggal_lahir" type="date" name="tanggal_lahir" class="form-control" autocomplete="off" required="required" value="<?php echo $data['tanggal_lahir']; ?>">
									<span id="helper" class="text-danger"></span>
								</div>
							</div>
							<div class="form-group">
								<label class="form-label">Jenis Kelamin</label>
								<div class="form-control-wrap">
									<select id="jk" class="form-control select2" name="jk" required="required">
										<option></option>
										<option <?= $data['jk'] == 'L' ? 'selected' : '' ?> value="L">Laki-laki</option>
										<option <?= $data['jk'] == 'P' ? 'selected' : '' ?> value="P">Perempuan</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="form-label">Agama</label>
								<div class="form-control-wrap">
									<select id="agama" class="form-control select2" name="agama" required="required">
										<option></option>
										<option <?= $data['agama'] == 'Islam' ? 'selected' : '' ?> value="Islam">Islam</option>
										<option <?= $data['agama'] == 'Islam' ? 'selected' : '' ?> value="Islam">Islam</option>
										<option <?= $data['agama'] == 'Hindu' ? 'selected' : '' ?> value="Hindu">Hindu</option>
										<option <?= $data['agama'] == 'Hindu' ? 'selected' : '' ?> value="Hindu">Hindu</option>
										<option <?= $data['agama'] == 'Kristen' ? 'selected' : '' ?> value="Kristen">Kristen</option>
										<option <?= $data['agama'] == 'Kristen' ? 'selected' : '' ?> value="Kristen">Kristen</option>
										<option <?= $data['agama'] == 'Katholik' ? 'selected' : '' ?> value="Katholik">Katholik</option>
										<option <?= $data['agama'] == 'Katholik' ? 'selected' : '' ?> value="Katholik">Katholik</option>
										<option <?= $data['agama'] == 'Budha' ? 'selected' : '' ?> value="Budha">Budha</option>
										<option <?= $data['agama'] == 'Budha' ? 'selected' : '' ?> value="Budha">Budha</option>
										<option <?= $data['agama'] == 'Konghucu' ? 'selected' : '' ?> value="Konghucu">Konghucu</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="form-label">Pekerjaan</label>
								<div class="form-control-wrap">
									<input id="pekerjaan" type="text" name="pekerjaan" class="form-control" autocomplete="off" required="required" value="<?php echo $data['pekerjaan']; ?>">
									<span id="helper" class="text-danger"></span>
								</div>
							</div>
							<div class="form-group">
								<label class="form-label">Alamat</label>
								<div class="form-control-wrap">
									<input id="alamat" type="text" name="alamat" class="form-control" autocomplete="off" required="required" value="<?php echo $data['alamat']; ?>">
									<span id="helper" class="text-danger"></span>
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
			$query = mysqli_query($con, "select * from pasien where idpasien = '$id'");
			$data = mysqli_fetch_array($query, MYSQLI_ASSOC);
		?>
			<div class="card card-bordered card-full">
				<div class="card-inner-group">
					<div class="card-inner">
						<div class="card-title-group">
							<div class="card-title">
								<h6 class="title">Remove pasien</h6>
							</div>
							<div class="card-tools">
								<button id="close_btn" type="button" class="btn btn-sm btn-icon btn-danger"><em class="icon ni ni-cross"></em></button>
							</div>
						</div>
					</div>
					<div class="card-inner card-inner-md">
						<form id="form" method="post">
							<p>Are you sure to delete <strong><?php echo $data['nmpasien']; ?></strong> from database?</p>
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
		if ($action == 'validate') {
			$id = $_POST['id'];
			$old = $_POST['old'];
			if ($id == $old) {
				echo 'ok';
			}
			if ($id <> $old) {
				$query = mysqli_query($con, "select * from pasien where nik = '$id'");
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