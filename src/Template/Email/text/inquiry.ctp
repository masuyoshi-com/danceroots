この度は<?= SITE_NAME ?>にお問い合わせいただき、誠にありがとうございました。
下記の内容で送信されました。
━━━━━━━━━━━━━━━━━━━━━━

お名前： <?= h($user->name) ?>

Eメール： <?= h($user->email) ?>

ご要件: <?= h($user->subject) ?>

メッセージ: <?= h($user->message) ?>


━━━━━━━━━━━━━━━━━━━━━━

<?= SITE_NAME ?> - <?= SITE_SUB_TITLE ?>

URL: <?= URL ?>

お問い合わせ先: <?= CONTACT_EMAIL ?>


━━━━━━━━━━━━━━━━━━━━━━
