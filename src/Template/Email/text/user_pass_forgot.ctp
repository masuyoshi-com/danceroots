【<?= SITE_NAME ?>】 - パスワード再発行のお知らせ

以下のリンクをクリックし、パスワードを再発行してください。
リンクの有効期限は48時間以内です。
━━━━━━━━━━━━━━━━━━━━━━

<?= h($user->username) ?> さん - パスワード再発行リンク

<?= URL . 'users/reissue?p=' . h($user->tmp_hash) ?>


このメッセージに関するお問い合わせは以下の連絡先EMAILより、ご連絡ください。

━━━━━━━━━━━━━━━━━━━━━━

<?= SITE_NAME ?> - <?= SITE_SUB_TITLE ?>

URL: <?= URL ?>

お問い合わせ先: <?= CONTACT_EMAIL ?>


━━━━━━━━━━━━━━━━━━━━━━
