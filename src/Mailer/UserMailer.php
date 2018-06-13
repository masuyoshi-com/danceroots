<?php
namespace App\Mailer;

use Cake\Mailer\Mailer;

class UserMailer extends Mailer
{
    public function user_regist($user)
    {
        $this
            ->from([INFO_EMAIL => SITE_NAME])
            ->to($user->email)
            ->subject('【' . SITE_NAME . '】仮登録完了 - 本登録手続きのお知らせ')
            ->viewVars(['user' => $user]);
    }


    public function user_pass_forgot($user)
    {
        $this
            ->from([INFO_EMAIL => SITE_NAME])
            ->to($user->email)
            ->subject('【' . SITE_NAME . '】パスワード再発行手続きのお知らせ')
            ->viewVars(['user' => $user]);
    }
}
