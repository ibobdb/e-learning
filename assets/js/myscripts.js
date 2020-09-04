$(document).ready(function () {
	$('.btn-hapus').click(function () {
		var no_induk = $(this).data('ni');
		var nama = $(this).data('nama');
		$('#no_induk').val(no_induk);
		$('#nama').val(nama);
	})
	console.log('jquery ok');

})
