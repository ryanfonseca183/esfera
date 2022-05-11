function filePreview(input, target) {
    if(input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
          target.attr('src', e.target.result)
      };
      reader.readAsDataURL(input.files[0]);
    }
}
$(document).on('change', '.img-upload', function(){
  // Carrega a imagem para pré-visualização
  let preview = $(this).parent('.img-container').find('.img-preview');
  filePreview($(this)[0], preview);
  preview.addClass('img-selected');
})
$(function(){
  $(".toast").toast('show');
})
