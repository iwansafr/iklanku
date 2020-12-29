function openNav() {
  document.getElementById("myNav").style.width = "100%";
}

function closeNav() {
  document.getElementById("myNav").style.width = "0%";
}
$(document).ready(function(){
	$.getJSON(_URL+'home/media/json_list/',function(result){
		$('input[name="nama"]').autocomplete({
			source: result
		});
	});
	$('input[name="nama"]').on('keyup',function(){
		var a = $(this).val();
		console.log(a);
		$.getJSON(_URL+'home/media/json_list/'+a,function(result){
			console.log(result);
			$('input[name="nama"]').autocomplete({
				source: result
			});
		});
	});
	$('#load_more').on('click',function(){
		load_product(true,true);
	});

	function load_product(i = false,append = true){
		$('#loading').removeClass('d-none');
		var page = parseInt($('#load_more').attr('page'));
		var nama = $('#load_more').attr('nama');
		var tipe = $('#load_more').attr('tipe');
		where = '';
		if(nama != ''){
			where = '&nama='+nama; 
		}
		if(tipe != ''){
			where = '&tipe='+tipe; 
		}
		if(i==true){
			page = page+1;
		}
		$.getJSON(_URL+'home/media/json_list/?page='+page+where,function(result){
			console.log(result);
			console.log(result.data.length);
			if(result.data.length>0){
				if(append==false){
					$('#product').html('');
					console.log('ok bersih');
				}
				for(i=0;i<result.data.length;i++){
					$('#product').append(`<div class="card mb-3 product_box">
				<span class="badge badge-primary pull-right" style="width: 20vw;padding-top: 1vw; position: absolute;top: 2vw;right: 10px;font-size: 3vw;">${result.data[i]['tipe']}</span>
				<a href="${_URL+'home/media/order/'+result.data[i]['id']}" ><img style="border-top-right-radius: 10%;border-top-left-radius: 10%;" src="${_URL+'images/modules/media/'+result.data[i]['id']+'/'+result.data[i]['photo']}" class="card-img-top" alt="..."></a>
			  <div class="card-body">
			  	<div class="row">
				    <div class="col">
				    	<p style="margin-block-end: 0;font-size: 3vw; font-weight: bold;">${result.data[i]['nama']}</p>
				    </div>
				    <div class="col-7 description_product">
				    	<p style="font-size: 3vw;">${result.data[i]['alamat']}</p>
				    </div>
			  	</div>
			  </div>
			</div>`);
				}
				$('#load_more').removeClass('d-none');
			}else{
				if(append==false){
					$('#product').html('<div class="alert alert-info">Mohon Maaf keyword yang anda cari tidak ditemukan</div>');
				}
				$('#load_more').addClass('d-none');
			}
			$('#loading').addClass('d-none');
			$('#load_more').attr('page',page);
		});
	}
});