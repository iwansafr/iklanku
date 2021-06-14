$(document).ready(function(){
	$('#venue').on('change',function(){
		let venue = $(this).val();
		location(venue);
	})
	function location(id = 0){
		$.getJSON(_URL+'home/digital_indoor/getLocation/'+id,function(result){
			$('#lokasi').html('<option value="">LOKASI</option>');
			console.log(result);
			for(i=0;i<result.data.length;i++){
				$('#lokasi').append(`<option value="${result.data[i]['id']}">${result.data[i]['location']}</option>`);
			}

		});
	}
})