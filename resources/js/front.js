//もっと見るボタン
$(function() {
    $('.more-btn').on('click', function() {
        var page = $(this).data('page');
        console.log(page);
        displayCatalog(page);
        $(this).data('page', parseInt(page) + 1);
        $('.more-btn>span').html(parseInt(page) + 1);
    });
});
function displayCatalog(page) {
    var tag_ids = $('input[name="tag_ids[]"]:checked').each(function() {
        return 'tag_ids[]=' + $(this).val();
    });
    console.log(tag_ids);
    var url = '/api/catalog?'
    + 'page=' + page
    + '&' + tag_ids;
    $.ajax({
        url: url,
        type: 'GET',
    })

    .done(function(response) {
        // console.log(response);
        var now = $('.now');

        //取得するものと、表示方法を指定
        for(var i=0; i<response.length; i++){
            // console.log(response[i].title);
            var part = $('<div>')
                .append($('<a>').attr('href', '/catalogs/detail/' + response[i].id)
                .append(
                    $('<div>').addClass('style').append(
                        $('<div>').addClass('image').addClass('col-md-12').append(
                            $('<img>').attr('src', response[i].image_path1)
                            .attr('width', 255)
                            .attr('height', 300)
                        )
                    .add($('<div>').addClass('text').addClass('col-md-12').append(
                        $('<div>').addClass('title-label').text(response[i].title_short))))
                ));
            $('#more-list').append(part);
        }

        //もっと見るボタンを非表示にする
        if (response.length < 12) {
            $('.more-btn').hide();
        }
    })

    .fail(function() {
        alert('エラー');
    });
};

// $(function() {
//     const defaultStyleCnt = 12; // 初期表示件数
//     const addStyleCnt = 12;     // 追加表示件数

//     $(function () {
//         let maxStyleCnt = 0;     // 最大表示件数
//         let currentStyleCnt = 0; // 現在の表示件数
//         let styleList = $('.test'); // 一覧を取得

//         // 一覧の初期表示
//         $(styleList).each(function (i, elem) {
//           // 初期表示件数のみ表示
//             if (i < defaultStyleCnt) {
//                 $(this).show();
//                 currentStyleCnt++;
//             }
//             maxStyleCnt++;

//           // もっと見るボタンを表示
//             let displayed = 0;
//             if (maxStyleCnt > currentStyleCnt && !displayed) {
//                 $('#more-btn').show();
//                 displayed = 1;
//             }
//         });
//     });

//     $('#more-btn').on('click', function () {
//         $.ajax({
//             url: '/api/catalog',
//             type: 'GET',
//             data: {}
//         })

//         .done(function() {
//             let newCount = currentStyleCnt + addStyleCnt; // 新しく表示する件数

//              // 新しく表示する件数のみ表示
//             $(styleList).each(function (i, elem) {
//                 if (currentStyleCnt <= i && i < newCount) {
//                     $(this).show();
//                     currentStyleCnt++;
//                 }
//             });

//               // もっと見るボタンを非表示
//             if (maxStyleCnt <= newCount) {
//                 $(this).hide();
//             }

//             return false;
//         });
//     });
// });
