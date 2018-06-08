<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\MailerAwareTrait;

/**
 * Inquiries Controller
 *
 * @property \App\Model\Table\InquiriesTable $Inquiries
 *
 * @method \App\Model\Entity\Inquiry[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class InquiriesController extends AppController
{
    use MailerAwareTrait;

    /**
     * 初期化メソッド
     * @return [type] [description]
     */
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['index', 'thanks']);
    }


    /**
     * お問い合わせ
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->viewBuilder()->setLayout('public');

        $inquiry = $this->Inquiries->newEntity();

        if ($this->request->is('post')) {
            $inquiry = $this->Inquiries->patchEntity($inquiry, $this->request->getData());
            if ($this->Inquiries->save($inquiry)) {
                $this->getMailer('Inquiry')->send('inquiry', [$inquiry]);
                $this->getMailer('Inquiry')->send('admin_inquiry', [$inquiry]);
                // $this->Mail->contactSendMail($inquiry);
                return $this->redirect(['action' => 'thanks']);
            }
            $this->Flash->error(__('送信できませんでした。 info@danceroots.net までご連絡ください。'));
        }

        $this->set(compact('inquiry'));
    }


    /**
     * 送信完了
     */
    public function thanks()
    {
        // リフェラー処理必要
        $this->viewBuilder()->setLayout('public');
    }

}
