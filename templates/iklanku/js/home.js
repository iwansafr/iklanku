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
	});
	$('#load_more').on('click',function(){
		$('#loading').removeClass('d-none');
		var page = parseInt($(this).attr('page'));
		var kota = $(this).attr('kota');
		var jalan = $(this).attr('jalan');
		var where = '';
		if(kota != ''){
			where = '&kota='+kota; 
		}

		if(jalan != ''){
			where = where.concat('&jalan='+jalan); 
		}
		page = page+1;
		$.getJSON(_URL+'home/iklan/json_list/?page='+page+where,function(result){
			console.log(result);
			if(result.data.length>1){
				for(i=0;i<result.data.length;i++){
					// console.log(result.data[i]);
					$('#product').append(`<div class="card mb-3 product_box">
				<span class="badge badge-success pull-right" style="width: 20vw;padding-top: 1vw; position: absolute;top: 2vw;right: 10px;font-size: 3vw;"> ${result.status[result.data[i]['status']]} </span>
				<a href="${_URL+'home/detail/'+result.data[i]['id']}" ><img style="border-top-right-radius: 10%;border-top-left-radius: 10%;" src="${_URL+'images/modules/iklan/'+result.data[i]['id']+'/'+result.data[i]['map_image']}" class="card-img-top" alt="..."></a>
			  <div class="card-body">
			  	<div class="row">
				    <div class="col">
				    	<h5 class="card-title" style="font-size: 4vw;">${result.data[i]['kota']}</h5>
				    </div>
				    <div class="col-7 description_product pl-0">
				    	<p style="font-size: 3vw;margin-bottom: -1vw;">${result.data[i]['jalan']}</p>
				    	<p class="card-text">
				    		<small style="font-size: 2vw;" class="text-muted">
				    			${result.data[i]['panjang']}x ${result.data[i]['lebar']}	 M / ${result.dimensi[result.data[i]['dimensi']]} / ${result.light[result.data[i]['light']]}
				    		</small>
				    	</p>
				    </div>
			  	</div>
			  </div>
			</div>`);
				}
			}else{
				$('#load_more').addClass('d-none');
			}
			$('#loading').addClass('d-none');
			$('#load_more').attr('page',page);
		});
	});
});