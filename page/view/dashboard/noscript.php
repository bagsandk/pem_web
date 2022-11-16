<?php
if (!DEFINED('FILE_ACCESS') or FILE_ACCESS !== TRUE) {
	exit("Sorry, you're doing something that is not normal! \r\n Please do normally.");
}
?><script>
	$(document).ready(function () {
		NioApp.Toast('This is a note for top right toast message.', 'success', {
			position: 'top-right'
		});
		NioApp.DataTable('.datatable', {
			responsive: {
				details: true
			}
		});
		$('.datepicker').datepicker({
			format: 'dd-mm-yyyy',
		});
		$('.select2').select2();
	});
</script>