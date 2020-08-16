function openNav() {
  document.getElementById("myNav").style.width = "100%";
}

function closeNav() {
  document.getElementById("myNav").style.width = "0%";
}
$(document).ready(function(){
	$.getJSON(_URL+'home/iklan/json_kota/',function(result){
		$('input[name="kota"]').autocomplete({
			source: result
		});
	});
	$('input[name="jalan"]').on('keyup',function(){
		var a = $(this).val();
		console.log(a);
		$.getJSON(_URL+'home/iklan/json_jalan/'+a,function(result){
			console.log(result);
			$('input[name="jalan"]').autocomplete({
				source: result
			});
		});
	});
	$('.media-iklan').on('click',function(){
		var a = $(this).val();
		var b = $(this).html();
		$('#media-opsi').html(b);
		$('input[name="media"]').val(a);
		set_size(a);
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
				    			Billboard / ${result.data[i]['panjang']}x ${result.data[i]['lebar']}	 M / ${result.dimensi[result.data[i]['dimensi']]} / ${result.light[result.data[i]['light']]}
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
	$(document).on('click','.dimensi_iklan',function(){
		$('#dimensi-opsi').html($(this).html());
	});
	function set_size(a){
		if(a==2){
			$('#size_filter').html(`
				<button data-dismiss="modal" value="1" class="dimensi_iklan w-100 btn btn-sm btn-secondary">Semua Ukuran</button>
	      <button data-dismiss="modal" value="2" class="dimensi_iklan w-100 btn btn-sm btn-secondary">10 X 20</button>
	      <button data-dismiss="modal" value="3" class="dimensi_iklan w-100 btn btn-sm btn-secondary">6 X 12</button>
	      <button data-dismiss="modal" value="4" class="dimensi_iklan w-100 btn btn-sm btn-secondary">4 X 8</button>
	      <button data-dismiss="modal" value="5" class="dimensi_iklan w-100 btn btn-sm btn-secondary">8 X 16</button>
	      <button data-dismiss="modal" value="6" class="dimensi_iklan w-100 btn btn-sm btn-secondary">5 X 10</button>

				`);
		}else if(parseInt(a)==parseInt(3)){
			$('#size_filter').html(`
				<button data-dismiss="modal" value="1" class="dimensi_iklan w-100 btn btn-sm btn-secondary">Semua Ukuran</button>
		    <button data-dismiss="modal" value="2" class="dimensi_iklan w-100 btn btn-sm btn-secondary">4 X 6</button>
				`);
		}else if(parseInt(a)==parseInt(4)){
			$('#size_filter').html(`
				<button data-dismiss="modal" value="1" class="dimensi_iklan w-100 btn btn-sm btn-secondary">Semua Ukuran</button>
	      <button data-dismiss="modal" value="2" class="dimensi_iklan w-100 btn btn-sm btn-secondary">4 X 2</button>
	      <button data-dismiss="modal" value="3" class="dimensi_iklan w-100 btn btn-sm btn-secondary">1 X 2</button>
				`);
		}else if(parseInt(a)==parseInt(5)){
			$('#size_filter').html(`
				<button data-dismiss="modal" value="1" class="dimensi_iklan w-100 btn btn-sm btn-secondary">Semua Ukuran</button>
		    <button data-dismiss="modal" value="2" class="dimensi_iklan w-100 btn btn-sm btn-secondary">8 X 16</button>
				`);
		}else{
			$('#size_filter').html(`
				<button data-dismiss="modal" value="1" class="dimensi_iklan w-100 btn btn-sm btn-secondary">Semua Ukuran</button>
				`);
		}
	}
});