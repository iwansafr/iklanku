<?php if (!empty($data)): ?>
	<div id="product" style="padding: 20px;">
		<?php foreach ($data['data'] as $key => $value): ?>
			<?php $tipe = !empty($value['tipe']) ? '/'.$value['tipe'] : ''; ?>
			<a href="<?php echo base_url('home/media/order/'.$value['id'].$tipe) ?>" >
				<div class="card mb-3 product_box">
				  <div class="card-body">
						<div class="row">
							<div class="col-5">
								<img style="border-top-right-radius: 10%;border-top-left-radius: 10%; object-fit: contain;" src="<?php echo image_module('media',$value['id'].'/'.$value['photo']) ?>" class="card-img-top" alt="...">
							</div>
							<div class="col-7" style="margin: auto;">
								<span class="align-middle"><?= $value['nama'] ?></span>
							</div>
						</div>
				  </div>
				</div>
			</a>
		<?php endforeach ?>
	</div>
	<div id="loading" class="text-center d-none">
		<label for="">loading ...</label>
	</div>
	<?php
	$hiddenclass = 'd-none';
	if(!empty($data['pagination'] && !empty($full)))
	{
		$hiddenclass = '';
	}
	?>
	<div class="text-center">
		<button class="btn btn-sm btn-default <?php echo $hiddenclass ?>" id="load_more" page="1" tipe="<?php echo $tipe_id;?>" nama="<?php echo !empty($_GET['nama']) ? htmlentities($_GET['nama']) : ''; ?>" style="background: white;width: 90%;border-radius: 0.5rem;">Tampilkan Lainnya</button>
		<hr>
	</div>
<?php endif ?>
      
  