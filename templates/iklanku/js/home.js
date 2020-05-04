$(document).ready(function(){
	$('.media-iklan').on('click',function(){
		var a = $(this).val();
		var b = $(this).html();
		$('#media-opsi').html(b);
		$('input[name="media"]').val(a);
	});
	$('#simpan_dimensi').on('click',function(){
		var a = $('#dimensi_lebar').val();
		var b = $('#dimensi_tinggi').val();
		var c = a+'x'+b+' M';
		if(a< 1 && b < 1)
		{
			c = 'Semua Ukuran';
			a = 0;
			b = 0;
		}
		$('#dimensi-opsi').html(c);
		$('input[name="dimensi_l"]').val(a);
		$('input[name="dimensi_t"]').val(b);
	})
});