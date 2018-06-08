/*jslint browser :true, continue : true,
  devel  : true, indent : 4, maxerr      : 50,
  newcap : true, nomen  : true, plusplus : true,
  regexp : true, sloppy : true, vars     : true,
  white  : true
*/
/*global jQuery */
var initRun = (function( $ ) {

    'use strict';

    // 各init
    $("#mdb-lightbox-ui").load('<?= $this->Url->build("/mdb-addons/mdb-lightbox-ui.html") ?>');
    $('[data-toggle="tooltip"]').tooltip();
    $(".button-collapse").sideNav();
    $('.mdb-select').material_select();

    $('.datepicker').pickadate({

        monthsFull:    ['1月', '2月', '3月', '4月', '5月', '6月', '7月', '8月', '9月', '10月', '11月', '12月'],
        monthsShort:   ['1月', '2月', '3月', '4月', '5月', '6月', '7月', '8月', '9月', '10月', '11月', '12月'],
        weekdaysFull:  ['日曜日', '月曜日', '火曜日', '水曜日', '木曜日', '金曜日', '土曜日'],
        weekdaysShort: ['日', '月', '火', '水', '木', '金', '土'],
        // Buttons
        today: '本日',
        clear: 'クリア',
        close: '閉じる',
        // Format
        format: 'yyyy-mm-dd',
    });

    $('.time').pickatime({donetext: '完了'});
    new WOW().init();
    
    /**
    * feedback 登録
    *
    * @param  {string} url PHP側urlBuilderヘルパーのURL文字列
    * @return {json} response
    */
    var feedbackSubmit = function ( url ) {

        $('#feedback-submit').click(function() {

            var user_id = $('#feedback-id').val();
            var subject = $('#f--subject').val();
            var body    = $('#f--body').val();

            if (subject !== '' && body !== '') {
                $.ajax({
                    url: url,
                    type: 'post',
                    dataType: 'json',
                    data: {
                        user_id: user_id,
                        subject: subject,
                        body:    body
                    }
                }).done(function ( response ) {
                    $('#modalContactForm').modal('hide');
                    $('#f--subject').val('');
                    $('#f--body').val('');
                    toastr.success('誠にありがとうございました。', '送信しました');
                }).fail(function () {
                    toastr.error('再度確認してください。', '送信できません');
                });
            } else {
                toastr.error('再度確認してください。', 'データ未入力です');
            }

        });
    };


    /**
     * サークル削除
     *
     * @param {string} url PHP側urlBuilderヘルパーのURL文字列
     * @param {string} redirect リダイレクト先
     * @return {json} response
     */
    var circleDeleteSubmit = function ( url, redirect ) {

        $('#circle-delete-submit').click(function() {

            var circle_id     = $('#circle-id').val();
            var user_id       = $('#user-id').val();
            var delete_reason = $('#f--delete_reason').val();
            var delete_flag   = 1;

            if (delete_reason !== '') {

                $.ajax({
                    url: url,
                    type: 'post',
                    dataType: 'json',
                    data: {
                        circle_id:     circle_id,
                        user_id:       user_id,
                        delete_flag:   delete_flag,
                        delete_reason: delete_reason
                    }
                }).done(function ( response ) {

                    $('#f--delete_reason').val('');

                    toastr.success('ページを移動します。', 'サークル削除しました。');

                    setTimeout (function() {
                        window.location.href = redirect;
                    }, 1700);

                }).fail(function () {
                    toastr.error('再度確認してください。', '送信できません');
                });

            } else {
                toastr.error('再度確認してください。', 'データ未入力です');
            }
        });
    };


    return {
        feedbackSubmit     : feedbackSubmit,
        circleDeleteSubmit : circleDeleteSubmit
    }

}( jQuery ));
