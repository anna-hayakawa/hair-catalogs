
//保存済みの画像を、編集画面で表示する
$(function(){
    if ($('#image').data('image') != null ) {
        $('.image-box').css('background-image', 'url(' + $('#image').data('image') + ')');
    }

    //input type="file"で、選択した画像をプレビュー表示する
    $('#image').on('change',
        function () {
            if (!this.files.length) {
                return;
            }
            console.log('image')
            var file = $(this).prop('files')[0];
            var fr = new FileReader();
            $('.image-box').css('background-image', 'none');
            fr.onload = function() {
                $('.image-box').css('background-image', 'url(' + fr.result + ')');
            }
            fr.readAsDataURL(file);
            $(".image-box img").css('opacity', 0);
        }
    );

    //remove-btnによる、プレビュー画像のクリア
    $('#remove').on('click', function() {
        var obj = document.getElementById("image");
        obj.value = "";

        var flag = document.getElementById("remove-flag");
        flag.value = "1";

        $('.image-box').css('background-image', 'url(/images/lady_icon.png?2e0dc4e2d2be745f45a3a5310b00a9bf)');
    });
});
