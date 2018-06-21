<?php
namespace App\Mailer;

use Cake\Mailer\Mailer;

class UserMailer extends Mailer
{
    /**
     * 仮登録完了・本登録手続き認証メール
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
     * パスワードを忘れた場合の認証メール
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
     * パスワード変更通知メール
     * 第三者の不正なパスワード変更かを知るきっかけになる
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


    /**
     * メールアドレス変更の認証メール(メールアドレスが有効かどうか)
     * 宛先は一時認証メールに飛ばす
     *
     * @param  object $user ユーザー
     * @return void
     */
    public function user_email_edit($user)
    {
        $this
            ->from([INFO_EMAIL => SITE_NAME])
            ->to($user->tmp_email)
            ->subject('【' . SITE_NAME . '】メール認証 - メール変更手続きのお知らせ')
            ->viewVars(['user' => $user]);
    }

}
