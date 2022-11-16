<?php
if (!DEFINED('FILE_ACCESS') or FILE_ACCESS !== TRUE) {
	exit("Sorry, you're doing something that is not normal! \r\n Please do normally.");
}
?>
<script>
	$(document).ready(function () {
		fetch_db();
		function fetch_db() {
			$('.datatable').DataTable().destroy();
			NioApp.DataTable('.datatable', {
				'responsive' : {
					'details' : true
				},
				'processing' : true,
				'serverSide' : true,
				'order' : [0, 'desc'],
				'columnDefs' : [{
					'visible' : false,
					'targets' : 0
				}, {
					'targets' : 1,
					'data' : 1,
					'render' : function (data, type, row, meta) {
						return '<div class="text-center">'+data+'</div>';
					}
				}, {
					'targets' : 2,
					'data' : 2,
					'render' : function (data, type, row, meta) {
						return '<div class="text-center"><button id="password_btn" type="button" class="btn btn-sm btn-icon btn-light" action="password" value="'+data+'"><em class="icon ni ni-lock"></em></button></div>';
					}
				}, {
					'targets' : 3,
					'data' : 3,
					'render' : function (data, type, row, meta) {
						return '<div class="text-center">'+data+'</div>';
					}
				}, {
					'targets' : 4,
					'data' : 4,
					'render' : function (data, type, row, meta) {
						return '<div class="text-center">'+data+'</div>';
					}
				}, {
					'targets' : 5,
					'data' : 5,
					'render' : function (data, type, row, meta) {
						return '<div class="text-center"><button id="edit_btn" type="button" class="btn btn-sm btn-icon btn-warning" action="update" value="'+data+'"><em class="icon ni ni-edit"></em></button> <button id="remove_btn" type="button" class="btn btn-sm btn-icon btn-danger" action="delete" value="'+data+'"><em class="icon ni ni-cross"></em></button></div>';
					}
				}],
				'ajax' : 'page/view/<?php echo $p; ?>/action/ssp.php'
			});
		}
		$('body').on('click', '#close_btn', function() {
			$('#my_form').html('');
			$('#my_table').show();
			fetch_db();
		});
		$('body').on('click', '#add_btn', function() {
			var action = $(this).attr('action');
			$.ajax({
				'url' : 'page/view/<?php echo $p; ?>/action/fetch.php',
				'method' : 'POST',
				'data' : {action:action},
				'success' : function(data) {
					$('#my_form').html(data);
					$('#my_table').hide();
					$('.select2').select2({
						'placeholder' : ''
					});
				}
			});
		});
		$('body').on('click', '#edit_btn', function() {
			var action = $(this).attr('action');
			var id =  $(this).val();
			$.ajax({
				'url' : 'page/view/<?php echo $p; ?>/action/fetch.php',
				'method' : 'POST',
				'data' : {action:action, id:id},
				'success' : function(data) {
					$('#my_form').html(data);
					$('#my_table').hide();
					$('.select2').select2({
						'placeholder' : ''
					});
				}
			});
		});
		$('body').on('click', '#remove_btn', function() {
			var action = $(this).attr('action');
			var id =  $(this).val();
			$.ajax({
				'url' : 'page/view/<?php echo $p; ?>/action/fetch.php',
				'method' : 'POST',
				'data' : {action:action, id:id},
				'success' : function(data) {
					$('#my_form').html(data);
					$('#my_table').hide();
				}
			});
		});
		$('body').on('click', '#password_btn', function() {
			var action = $(this).attr('action');
			var id =  $(this).val();
			$.ajax({
				'url' : 'page/view/<?php echo $p; ?>/action/fetch.php',
				'method' : 'POST',
				'data' : {action:action, id:id},
				'success' : function(data) {
					$('#my_form').html(data);
					$('#my_table').hide();
				}
			});
		});
		$('body').on('input', '#username', function() {
			var action = 'validate';
			var id =  $(this).val();
			var old =  $('#old').val();
			$.ajax({
				'url' : 'page/view/<?php echo $p; ?>/action/fetch.php',
				'method' : 'POST',
				'data' : {action:action, id:id, old:old},
				'success' : function(data) {
					if (data == 'exist') {
						$('#helper').text('Username sudah digunakan!');
						$('#submit_btn').attr('disabled', true);
					}
					else {
						$('#helper').text('');
						$('#submit_btn').attr('disabled', false);
					}
				}
			});
		});
		$('body').on('submit', '#form', function(e) {
			e.preventDefault();
			$.ajax({
				'url' : 'page/view/<?php echo $p; ?>/action/post.php',
				'method' : 'POST',
				'data' : $('#form').serialize(),
				'beforeSend' : function() {
					$('#submit_btn').text('Loading');
					$('#submit_btn').attr('disabled', true);
				},
				'success' : function(data) {
					$('#close_btn').click();
					NioApp.Toast(data, 'success', {
						'position' : 'top-right'
					});
					fetch_db();
				}
			});
		});
	});
</script>