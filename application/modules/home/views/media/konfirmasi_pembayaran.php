<style>
	.input{
    border-radius: 0.5rem!important;
    background-color: #bcbcbc!important;
    font-size: 3vw;
	}
	.form-control{
		font-size: 3vw!important;
	}
	.select{
    border-radius: 0.5rem!important;
	}
	.custom{
		height: 10vw!important;
    border-radius: 0.5rem!important;
    background-color: white!important;
    text-align: center;
    font-size: 4vw;
	}
	select {
	   text-align-last: center;
	   text-align: center;
	   -ms-text-align-last: center;
	   -moz-text-align-last: center;
	}
	.v3{
		font-size: 3vw;
	}
	.fileContainer [type=file] {
      cursor: inherit;
      display: block;
      font-size: 999px;
      filter: alpha(opacity=0);
      min-width: 100%;
      opacity: 0;
      position: absolute;
      right: 0;
      text-align: right;
      top: 50%;
  }
</style>
<div class="container mt-5 pt-5 " id="pageSewa">
	<?php 
	$form = new Zea();
	$form->init('edit');
	$form->setId($pembayaran['id']);
	$form->setTable('order_radio');
	$form->addInput('photo','file');
	// $form->form();
	if(!empty($_POST))
	{
		$form->action();
	}
	?>
	<?php $user = $this->session->userdata(base_url().'_logged_in') ?>
	<div class="title text-center">
		<div class="container">
			<a href="<?= base_url('home/radio') ?>" class="float-left">
				<i class="fa fa-arrow-left"></i>
			</a>
			<span class="font-weight-bold">
				Konfirmasi Pembayaran
			</span>
			<hr>
		</div>
	</div>
	<?php if (!empty($data)): ?>
		<?php if ($data['tipe'] == 1): ?>
			<form action="" method="post" name="form1" enctype="multipart/form-data">
				<div class="form-group text-center">
					<label for="bukti">Bukti Transfer</label>
					<label class="fileContainer">
            <input type="file" id="imageUpload" name="photo" class="form-control" accept="image/*" required>
            <?php if (!empty($pembayaran['photo'])): ?>
            	<img src="<?= image_module('order_radio',$pembayaran['id'].'/'.$pembayaran['photo']) ?>" class="img img-fluid" alt="" id="image_place">
            <?php else: ?>
            	<img src="https://cdn4.iconfinder.com/data/icons/ionicons/512/icon-camera-512.png" class="img img-fluid" alt="" id="image_place">
            <?php endif ?>
            <!-- <i class="fa fa-camera" style="font-size: 36px;"></i> -->
            <!-- <input type="file" id="imageUpload" name="photo" class="form-control" accept="image/*" required oninvalid="this.setCustomValidity('Anda Belum photo')" oninput="setCustomValidity('')" capture="capture"> -->
          </label>
				</div>
				<button class="btn btn-sm btn-primary btn-lg" name="form_1" value="true" id="submit" style="border-radius: 0.5rem;width: 100%;background-color:#0872ba;line-height: 8vw;font-size: 3.5vw;font-weight: bold;">
					<i class='fa fa-upload'></i> UPLOAD
				</button>
			</form>
			<hr>
			<a href="<?= base_url('home/media/status_pembayaran/'.$pembayaran['id']) ?>" class="btn btn-sm btn-primary btn-lg text-white" id="submit" style="border-radius: 0.5rem;width: 100%;background-color:#0872ba;line-height: 8vw;font-size: 3.5vw;font-weight: bold;">
				CEK STATUS PEMBAYARAN
			</a>
			<script>
				const imageUpload  = document.querySelector('#imageUpload');
				const submit  = document.querySelector('#submit');
				imageUpload.addEventListener('change',()=>{
					imageChange();
				});
				submit.addEventListener('click',()=>{
				    imageChange();
				});
				function imageChange(){
					if(imageUpload.validity.valueMissing){
			        imageUpload.setCustomValidity('Silahkan Upload Bukti Transfer Terlebih Dahulu');
			    }else{
			        imageUpload.setCustomValidity('');
			    }
				}
			</script>
		<?php elseif($data['tipe'] == 2): ?>
			
		<?php endif ?>
	<?php else: ?>
		<?php msg('Mohon Maaf Halaman yang anda minta tidak tersedia','info') ?>
	<?php endif ?>
</div>