<?php
namespace App\Mailer;

use Cake\Mailer\Mailer;

class CircleMessageMailer extends Mailer
{
    /**
     * サークルメッセージ登録・送信時 送信先相手へメール通知
     *
     * @param array $to_user   送信先ユーザー
     * @param array $from_user 差出人ユーザー
     * @param array $message   メッセージ内容
     * @param array $circle    サークル内容
     * @return void
     */
    public function circle_message($to_user, $from_user, $message, $circle)
    {
        $this
            ->from([ADMIN_EMAIL => SITE_NAME])
            ->to($to_user->email)
            ->subject('【' . SITE_NAME . '】' . h($from_user->username) . 'さんから' . h($circle->name) . 'メンバーへメッセージがありました。')
            ->viewVars(['user' => $from_user, 'message' => $message, 'circle' => $circle]);
    }


    /**
     * メッセージ編集・送信時 送信先相手へメール通知
     *
     * @param array $to_user   送信先ユーザー
     * @param array $from_user 差出人ユーザー
     * @param array $message   メッセージ内容
     * @param array $circle    サークル内容
     * @return void
     */
    public function circle_edit_message($to_user, $from_user, $message, $circle)
    {
        $this
            ->from([ADMIN_EMAIL => SITE_NAME])
            ->to($to_user->email)
            ->subject('【' . SITE_NAME . '】' . h($from_user->username) . 'さんから' . h($circle->name) . 'メンバーへメッセージの変更がありました。')
            ->viewVars(['user' => $from_user, 'message' => $message, 'circle' => $circle]);
    }


}
