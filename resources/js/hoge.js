$('#image1').change(
    function () {
        if (!this.files.length) {
            return;
        }

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
