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
        format: 'yyyy/mm/dd',
    });

    $('.time').pickatime({donetext: '完了'});
    new WOW().init();

    /**
    * feedback 登録
    *
    * @param  {string} url PHP側urlBuilderヘルパーのURL文字列
    * @return {json} response
    */
    var feedback = function ( url ) {

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
    * Message 送信・登録
    *
    * @param  {string} url PHP側urlBuilderヘルパーのURL文字列
    * @return {json} response
    */
    var message = function ( url ) {

        $('#message-submit').click(function() {

            var to_user_id  = $('#to-user-id').val();
            var to_username = $('#to-username').val();
            var title       = $('#f--title').val();
            var body        = $('#f--body').val();
            var message_id  = $('#message-id').val();

            if (to_user_id !== '' && title !== '' && body !== '') {
                $.ajax({
                    url: url,
                    type: 'post',
                    dataType: 'json',
                    data: {
                        to_user_id: to_user_id,
                        message_id: message_id,
                        title: title,
                        body:  body
                    }
                }).done(function ( response ) {
                    $('#modalMessageForm').modal('hide');
                    $('#f--title').val('');
                    $('#f--body').val('');
                    toastr.success(to_username + 'さんにメッセージを送信しました');
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
    var circleDelete = function ( url, redirect ) {

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
                    toastr.error('再度確認してください。', '送信できません。');
                });

            } else {
                toastr.error('再度確認してください。', 'データ未入力です。');
            }
        });
    };


    /**
     * イベント削除
     *
     * @param {string} url PHP側urlBuilderヘルパーのURL文字列
     * @param {string} redirect リダイレクト先
     * @return {json} response
     */
    var eventDelete = function ( url, redirect ) {

        $('#event-delete-submit').click(function() {

            var event_id      = $('#event-id').val();
            var user_id       = $('#user-id').val();
            var delete_reason = $('#f--delete_reason').val();
            var delete_flag   = 1;

            if (delete_reason !== '') {

                $.ajax({
                    url: url,
                    type: 'post',
                    dataType: 'json',
                    data: {
                        event_id:      event_id,
                        user_id:       user_id,
                        delete_flag:   delete_flag,
                        delete_reason: delete_reason
                    }
                }).done(function ( response ) {

                    $('#f--delete_reason').val('');

                    toastr.success('ページを移動します。', 'イベント削除しました。');

                    setTimeout (function() {
                        window.location.href = redirect;
                    }, 1700);

                }).fail(function () {
                    toastr.error('再度確認してください。', '削除できません。');
                });

            } else {
                toastr.error('再度確認してください。', 'データ未入力です。');
            }
        });
    };


    /**
     * ダンス求人削除
     *
     * @param {string} url PHP側urlBuilderヘルパーのURL文字列
     * @param {string} redirect リダイレクト先
     * @return {json} response
     */
    var jobDelete = function ( url, redirect ) {

        $('#job-delete-submit').click(function() {

            var job_id        = $('#job-id').val();
            var user_id       = $('#user-id').val();
            var delete_reason = $('#f--delete_reason').val();
            var delete_flag   = 1;

            if (delete_reason !== '') {

                $.ajax({
                    url: url,
                    type: 'post',
                    dataType: 'json',
                    data: {
                        job_id:        job_id,
                        user_id:       user_id,
                        delete_flag:   delete_flag,
                        delete_reason: delete_reason
                    }
                }).done(function ( response ) {

                    $('#f--delete_reason').val('');

                    toastr.success('ページを移動します。', 'ダンス求人削除しました。');

                    setTimeout (function() {
                        window.location.href = redirect;
                    }, 1700);

                }).fail(function () {
                    toastr.error('再度確認してください。', '削除できません。');
                });

            } else {
                toastr.error('再度確認してください。', 'データ未入力です。');
            }
        });
    };


    /**
     * ミュージック登録アルファベット検索変更値GET
     *
     * @param  {string} url PHP urlヘルパー
     * @return {redirect} ジャンル変更あった場合にアーティスト検索変更
     */
    var genreChange = function (url) {
        $('#artist-genre').change(function () {
            var artist_genre = $('#artist-genre').val();
            window.location.href = url + artist_genre;
        });
    }

    return {
        feedback     : feedback,
        message      : message,
        circleDelete : circleDelete,
        eventDelete  : eventDelete,
        jobDelete    : jobDelete,
        genreChange  : genreChange
    }

}( jQuery ));
