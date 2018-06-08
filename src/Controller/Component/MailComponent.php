<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/**
 * メールコンポーネント - メーラーでの読み込み時、インデントもスペースに含まれている。
 * メール本文レイアウトを崩さないため、本文に関してはインデントをしない。
 */
class MailComponent extends Component
{
    // const ADMIN_EMAIL = 'info@danceroots.net';
    const ADMIN_EMAIL = 'shoichi@masuyoshi.com';

    // 管理者向け変数
    public $admin_to       = self::ADMIN_EMAIL; // 管理宛先
    public $admin_from     = self::ADMIN_EMAIL; // 送り主
    public $admin_fromname = 'Danceroots';
    public $admin_subject  = '【Danceroots】お問い合わせがありました。';

    // ユーザー向け変数
    public $user_from       = self::ADMIN_EMAIL; // 送り主
    public $user_fromname   = 'Danceroots.net';
    public $contact_subject = '【Danceroots】お問い合わせありがとうございました。';


    /**
     * メール送信処理
     *
     * @param string $to
     * @param string $from
     * @param string $fromname
     * @param string $subject
     * @param string $body
     * @throws Exception
     */
    private function sendMail($to, $from, $fromname, $subject, $body)
    {
        $mail = new PHPMailer();
        try {

            $mail->CharSet  = 'UTF-8';
            $mail->Encoding = 'base64';
            $mail->AddAddress($to);
            $mail->From     = $from;
            $mail->FromName = $fromname;
            $mail->Subject  = $subject;
            $mail->Body     = $body;

            $mail->Send();

        } catch (Exception $e) {
            echo 'メール送信できませんでした。';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }
    }


    /**
     * お問い合わせ
     *
     * @param object $contact 保存後に取得するユーザデータ
     * @return void
     */
    public function contactSendMail($contact)
    {
        $this->sendMail(
            $this->admin_to,
            $this->admin_from,
            $this->admin_fromname,
            $this->admin_subject,
            $this->contactMailBodyAdmin($contact)
        );

        $this->sendMail(
            $contact->email,
            $this->user_from,
            $this->user_fromname,
            $this->contact_subject,
            $this->contactMailBodyUser($contact)
        );
    }


    /**
     * 共通メールヘッダ
     *
     * @return string
     */
    private function commonMailHeader()
    {
        return "
この度はDanceroots.netにお問い合わせいただき、誠にありがとうございました。
下記の内容で送信されました。
------------------------------------------
        ";
    }


    /**
     * 共通メールフッタ
     *
     * @return string
     */
    private function commonMailFooter()
    {
        return "
------------------------------------------

Danceroots - ストリートダンス総合プラットフォーム
URL: https://danceroots.net/
お問い合わせ先: info@danceroots.net

------------------------------------------
        ";
    }


    /**
     * お問い合わせ内容
     *
     * @param object $contact
     * @return string
     */
    private function contactMailBody($contact)
    {
        return "
名前： {$contact->name}
Eメール： {$contact->email}
ご要件: {$contact->subject}
メッセージ: " . $contact->message . "
        ";
    }


    /**
     * お問い合わせ - 管理者
     *
     * @param object $contact
     * @return string
     */
    private function contactMailBodyAdmin($contact)
    {
        return
            $this->contactMailBody($contact)
        ;
    }


    /**
     * お問い合わせ - ユーザー
     *
     * @param object $contact
     * @return string
     */
    private function contactMailBodyUser($contact)
    {
        return
            $this->commonMailHeader() .
            $this->contactMailBody($contact) .
            $this->commonMailFooter()
        ;
    }


}
