<?php
namespace App\Mailer;

use Cake\Mailer\Mailer;

class InquiryMailer extends Mailer
{
    public function inquiry($user)
    {
        $this
            ->from([ADMIN_EMAIL => SITE_NAME])
            ->to($user->email)
            ->subject('【' . SITE_NAME . '】自動返信 - お問い合わせありがとうございます。')
            ->viewVars(['user' => $user]);
    }


    public function admin_inquiry($user)
    {
        $this
            ->from($user->email)
            ->to(ADMIN_EMAIL)
            ->subject('【' . SITE_NAME . '】お問い合わせがありました。')
            ->viewVars(['user' => $user]);
    }
}
