//もっと見るボタン
$(function() {
    $('.more-btn').on('click', function() {
        var page = $(this).data('page');
        console.log(page);
        displayCatalog();
    });
});
function displayCatalog(page) {
    var url = '/api/catalog?'
    + 'page=' + page;
    $.ajax({
        url: url,
        type: 'GET',
    })

    .done(function(response) {
        console.log(response);
        var now = $('.now');

        for(var i=0; i<12; i++){
            console.log(response[i].title);
        }
        $('.test').append(now);
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
