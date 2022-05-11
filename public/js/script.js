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
    let preview = $(this).parent('.img-container').find('.img-preview');
    filePreview($(this)[0], preview);
    preview.addClass('img-selected');
})
$(function(){
    $(".toast").toast('show');
})
var SPMaskBehavior = function (val) {
  return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
},
spOptions = {
  onKeyPress: function(val, e, field, options) {
      field.mask(SPMaskBehavior.apply({}, arguments), options);
  }
};
$('.mask-cell').mask(SPMaskBehavior, spOptions);