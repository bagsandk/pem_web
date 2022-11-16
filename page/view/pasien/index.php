<?php
if (!DEFINED('FILE_ACCESS') or FILE_ACCESS !== TRUE) {
	exit("Sorry, you're doing something that is not normal! \r\n Please do normally.");
}
?>
<div id="my_table">
	<div class="card card-bordered card-full">
		<div class="card-inner-group">
			<div class="card-inner">
				<div class="card-title-group">
					<div class="card-title">
						<h6 class="title">Pasien</h6>
					</div>
					<div class="card-tools">
						<button id="add_btn" type="button" class="btn btn-sm btn-icon btn-primary" action="create"><em class="icon ni ni-plus"></em></button>
					</div>
				</div>
			</div>
			<div class="card-inner card-inner-md">
				<table class="datatable nowrap table">
					<thead>
						<tr>
							<th class="text-center">No.</th>
							<th class="text-center">NIK</th>
							<th class="text-center">Nama</th>
							<th class="text-center">JK</th>
							<th class="text-center">Lahir</th>
							<th class="text-center">Agama</th>
							<th class="text-center">Pekerjaan</th>
							<th class="text-center">Alamat</th>
							<th class="text-center">#</th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<div id="my_form"></div>