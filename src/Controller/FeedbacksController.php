<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Feedbacks Controller
 *
 * @property \App\Model\Table\FeedbacksTable $Feedbacks
 *
 * @method \App\Model\Entity\Feedback[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FeedbacksController extends AppController
{
    /**
     * 各アクション前に発動 レイアウト設定
     *
     * @param object Event $event
     * @return void
     */
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);

        $this->Security->config('unlockedActions', ['add']);

        // 特定のアクションのみCSRF無効化
        if (in_array($this->request->action, ['add'])) {
            $this->eventManager()->off($this->Csrf);
        }
    }


    /**
     * フィードバック登録
     *
     * @return \Cake\Http\Response|null
     */
    public function add()
    {
        $this->Common->referer();
        $this->autoRender = false;

        $feedback = $this->Feedbacks->newEntity();

        if ($this->request->is('ajax')) {

            $feedback = $this->Feedbacks->patchEntity($feedback, $this->request->data, ['validate' => false]);

            if ($this->Feedbacks->save($feedback)) {
                $this->response->body(json_encode($this->request->data));
                return $this->response;
            }

            return false;
        }
    }
}
