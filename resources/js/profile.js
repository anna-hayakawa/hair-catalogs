
$(function(){
    $("[name='image']").on('change', function (e) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $("#img1").attr('src', e.target.result);
        }
        reader.readAsDataURL(e.target.files[0]);
    });
});
