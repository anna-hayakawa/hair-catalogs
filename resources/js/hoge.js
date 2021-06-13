//動作確認
// $(document).ready(function(){
//     $('#hoge').on('click', function (e) {
//         console.log('hello')
//     });
// });
// console.log('hello')

const { css } = require("jquery");


//保存済みの画像を、編集画面で表示する
$(function(){
    if ($('#image1').data('image') != null ) {
        $('.image-box1').css('background-image', 'url(' + $('#image1').data('image') + ')');
    }
    if ($('#image2').data('image') != null ) {
        $('.image-box2').css('background-image', 'url(' + $('#image2').data('image') + ')');
    }
    if ($('#image3').data('image') != null ) {
        $('.image-box3').css('background-image', 'url(' + $('#image3').data('image') + ')');
    }

    //input type="file"で、選択した画像をプレビュー表示する
    $('#image1').on('change',
        function () {
            if (!this.files.length) {
                return;
            }
            console.log('image1')
            var file = $(this).prop('files')[0];
            var fr = new FileReader();
            $('.image-box1').css('background-image', 'none');
            fr.onload = function() {
                $('.image-box1').css('background-image', 'url(' + fr.result + ')');
            }
            fr.readAsDataURL(file);
            $(".image-box1 img").css('opacity', 0);
        }
    );
    $('#image2').on('change',
        function () {
            if (!this.files.length) {
                return;
            }
            console.log('image2')
            var file = $(this).prop('files')[0];
            var fr = new FileReader();
            $('.image-box2').css('background-image', 'none');
            fr.onload = function() {
                $('.image-box2').css('background-image', 'url(' + fr.result + ')');
            }
            fr.readAsDataURL(file);
            $(".image-box2 img").css('opacity', 0);
        }
    );
    $('#image3').on('change',
        function () {
            if (!this.files.length) {
                return;
            }
            console.log('image3')
            var file = $(this).prop('files')[0];
            var fr = new FileReader();
            $('.image-box3').css('background-image', 'none');
            fr.onload = function() {
                $('.image-box3').css('background-image', 'url(' + fr.result + ')');
            }
            fr.readAsDataURL(file);
            $(".image-box3 img").css('opacity', 0);
        }
    );
});


//remove-btnによる、プレビュー画像のクリア
$(function() {
    $('#remove1').on('click', function() {
        var obj = document.getElementById("image1");
        // console.log(obj.value);
        obj.value = "";
        // console.log(obj.value);
        $('.image-box1').css('background-image', 'url(/images/lady_icon.png?2e0dc4e2d2be745f45a3a5310b00a9bf)');
    });
    $('#remove2').on('click', function() {
        var obj = document.getElementById("image2");
        obj.value = "";
        $('.image-box2').css('background-image', 'url(/images/lady_icon.png?2e0dc4e2d2be745f45a3a5310b00a9bf)');
    });
    $('#remove3').on('click', function() {
        var obj = document.getElementById("image3");
        obj.value = "";
        $('.image-box3').css('background-image', 'url(/images/lady_icon.png?2e0dc4e2d2be745f45a3a5310b00a9bf)');
    });
});

