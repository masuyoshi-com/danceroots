【<?= SITE_NAME ?>】 - 仮登録完了しました。

以下のリンクをクリックし、本登録を完了してください。
リンクの有効期限は48時間以内です。
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

<?= h($user->username) ?> さん - 本登録リンク

<?= URL . 'users/complete?u=' . h($user->tmp_hash) ?>


このメッセージに関するお問い合わせは以下の連絡先EMAILより、ご連絡ください。

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

<?= SITE_NAME ?> - <?= SITE_SUB_TITLE ?>

URL: <?= URL ?>

お問い合わせ先: <?= CONTACT_EMAIL ?>


━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
