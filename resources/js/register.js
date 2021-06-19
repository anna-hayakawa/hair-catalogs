
$(function(){
    //input type="file"で、選択した画像をプレビュー表示する
    $('#profile_image').on('change',
        function () {
            if (!this.files.length) {
                return;
            }
            console.log('profile_image')
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
        var obj = document.getElementById("profile_image");
        obj.value = "";

        var flag = document.getElementById("remove-flag");
        flag.value = "1";

        $('.image-box').css('background-image', 'url(/images/default_profile_icon.png)');
    });
});
