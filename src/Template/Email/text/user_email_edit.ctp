【<?= SITE_NAME ?>】 - メールアドレス変更の手続き

以下のリンクをクリックし、メールアドレス変更を完了してください。
━━━━━━━━━━━━━━━━━━━━━━

<?= h($user->username) ?> さん - メールアドレス変更リンク

<?= URL . 'users/email-edit?e=' . h($user->tmp_hash) ?>


このメッセージに関するお問い合わせは以下の連絡先EMAILより、ご連絡ください。

━━━━━━━━━━━━━━━━━━━━━━

<?= SITE_NAME ?> - <?= SITE_SUB_TITLE ?>

URL: <?= URL ?>

お問い合わせ先: <?= CONTACT_EMAIL ?>


━━━━━━━━━━━━━━━━━━━━━━
