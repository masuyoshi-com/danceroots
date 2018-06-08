<?php
namespace App\Mailer;

use Cake\Mailer\Mailer;

class CircleMailer extends Mailer
{
    /**
     * サークル削除時 サークルメンバーへメール通知
     *
     * @param array $to_user   送信先ユーザー
     * @param array $from_user 差出人ユーザー
     * @param array $circle    サークル内容
     * @return void
     */
    public function circle_delete_message($to_user, $from_user, $circle)
    {
        $this
            ->from([ADMIN_EMAIL => SITE_NAME])
            ->to($to_user->email)
            ->subject('【' . SITE_NAME . '】' . h($from_user->username) . 'さんが' . h($circle->name) . 'を解散しました。')
            ->viewVars(['user' => $from_user, 'circle' => $circle]);
    }

}
