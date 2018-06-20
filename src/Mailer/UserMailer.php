<?php
namespace App\Mailer;

use Cake\Mailer\Mailer;

class UserMailer extends Mailer
{
    /**
     * 仮登録完了メール
     *
     * @param  object $user ユーザー
     * @return void
     */
    public function user_regist($user)
    {
        $this
            ->from([INFO_EMAIL => SITE_NAME])
            ->to($user->email)
            ->subject('【' . SITE_NAME . '】仮登録完了 - 本登録手続きのお知らせ')
            ->viewVars(['user' => $user]);
    }


    /**
     * パスワードを忘れた場合のメール
     *
     * @param object $user
     * @return void
     */
    public function user_pass_forgot($user)
    {
        $this
            ->from([INFO_EMAIL => SITE_NAME])
            ->to($user->email)
            ->subject('【' . SITE_NAME . '】パスワード再発行手続きのお知らせ')
            ->viewVars(['user' => $user]);
    }


    /**
     * パスワード変更メール
     *
     * @param  object $user ユーザー
     * @return void
     */
    public function user_pass_edit($user)
    {
        $this
            ->from([INFO_EMAIL => SITE_NAME])
            ->to($user->email)
            ->subject('【' . SITE_NAME . '】パスワード変更のお知らせ')
            ->viewVars(['user' => $user]);
    }


}
