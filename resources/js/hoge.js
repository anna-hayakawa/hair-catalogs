//動作確認
// $(document).ready(function(){
//     $('#hoge').on('click', function (e) {
//         console.log('hello')
//     });
// });
// console.log('hello')

const { css } = require("jquery");


//input type="file"で、選択した画像をプレビュー表示する
$(function(){
    if ($('#image1').data('image') != '') {
        $('.image-box1').css('background-image', 'url(' + $('#image1').data('image') + ')');
    }
    if ($('#image2').data('image') != '') {
        $('.image-box2').css('background-image', 'url(' + $('#image2').data('image') + ')');
    }
    if ($('#image3').data('image') != '') {
        $('.image-box3').css('background-image', 'url(' + $('#image3').data('image') + ')');
    }
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
