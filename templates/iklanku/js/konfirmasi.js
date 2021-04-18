$(document).ready(function(){
	function readURL(input, a) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        $(a).attr('src', e.target.result);
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
  $('#imageUpload').on('change', function () {
    var a = $(this).siblings('#image_place');
    readURL(this, a);
    $('#absen_btn').html('<button type="submit" class="btn btn-lg btn-info"><i class="fa fa-paper-plane"></i> Upload</button><hr>');
  });
});