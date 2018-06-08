<?php
namespace App\Mailer;

use Cake\Mailer\Mailer;

class MessageMailer extends Mailer
{
    /**
     * メッセージ登録・送信時 送信先相手へメール通知
     *
     * @param  array $to_user   送信先ユーザー
     * @param  array $from_user 差出人ユーザー
     * @param  array $message   メッセージ内容
     * @return void
     */
    public function message($to_user, $from_user, $message)
    {
        $this
            ->from([ADMIN_EMAIL => SITE_NAME])
            ->to($to_user->email)
            ->subject('【' . SITE_NAME . '】' . $from_user->username . 'さんからのメッセージがあります。')
            ->viewVars(['user' => $from_user, 'message' => $message]);
    }

}
