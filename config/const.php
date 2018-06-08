<?php
use Cake\Core\Configure;

if (isset($_SERVER['PHP_ENV']) && $_SERVER['PHP_ENV'] === 'production') {
    return
    [
        // 広告フラグ 0 => 表示 1 => 非表示
        define('AD', 0),

        // メール送信機能 0 => 各処理後送信 1 => 送信しない
        define('SEND_MAIL_FUNCTION', 0),

        // メールFrom(管理メール)
        define('ADMIN_EMAIL', 'info@danceroots.net'),

        // サイト名
        define('SITE_NAME', 'Danceroots'),

        // URL
        define('URL', 'https://danceroots.net/'),

    ];
} elseif (isset($_SERVER['PHP_ENV']) && $_SERVER['PHP_ENV'] === 'development') {
} else {
    return
    [
        // 広告フラグ 0 => 表示 1 => 非表示
        define('AD', 0),

        // メール送信機能 0 => 各処理後送信 1 => 送信しない
        define('SEND_MAIL_FUNCTION', 0),

        // メールFrom(管理メール)
        define('ADMIN_EMAIL', 'shoichi@masuyoshi.com'),

        // サイト名
        define('SITE_NAME', 'Danceroots'),

        // サイトサブタイトル
        define('SITE_SUB_TITLE', 'ストリートダンス総合プラットフォーム'),

        // url
        define('URL', 'http://localhost/danceroots.net/'),
    ];
}
