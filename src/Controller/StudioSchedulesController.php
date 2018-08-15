<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\Query;
use Cake\Database\Expression\QueryExpression;
use Cake\Network\Exception\NotFoundException;

/**
 * StudioSchedules Controller
 *
 * @property \App\Model\Table\StudioSchedulesTable $StudioSchedules
 *
 * @method \App\Model\Entity\StudioSchedule[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StudioSchedulesController extends AppController
{

    public $times = [
        '10:00', '10:30', '11:00', '11:30', '12:00', '12:30', '13:00', '13:30', '14:00', '14:30',
        '15:00', '15:30', '16:00', '16:30', '17:00', '17:30', '18:00', '18:30', '19:00', '19:30',
        '20:00', '20:30', '21:00', '21:30', '22:00', '22:30', '23:00', '23:30', '24:00'
    ];

    public $weeks = [
        '日曜日', '月曜日', '火曜日', '水曜日', '木曜日', '金曜日', '土曜日'
    ];

    public $difficulties = ['超入門', '入門', '初級', '中級', '上級'];

    // 可変変数用曜日名 - 配列強制複数名
    public $val_weeks = [
        'suns', 'mons', 'tues', 'weds', 'thus', 'fris', 'sats'
    ];


    /**
     * 初期化メソッド
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['public']);
    }


    /**
     * スタジオレッスンスケジュール一覧
     * @todo 曜日全体のクエリ処理が重ければ、最初にカウントがあるものだけをループすることを検討する
     *
     * @param string $id ユーザーID
     * @return \Cake\Http\Response|void
     * @throws \Cake\Network\Exception\NotFoundException スタジオが存在しない場合
     */
    public function index($id = null)
    {
        // スタジオプロフィール取得
        $this->loadModel('Studios');
        $studio = $this->Studios->findByUserId($id)->contain(['Users'])->first();

        if ($studio) {
            // 各曜日スケジュールをセレクト。$times配列の時間系列にスケジュールの開始時間を合わせる
            for ($i = 0; $i < count($this->times); $i++) {

                for ($j = 0; $j < count($this->val_weeks); $j++) {
                    ${$this->val_weeks[$j]}[$this->times[$i]] = $this->StudioSchedules->findByUserIdAndWeekAndStart($id, $j, $this->times[$i])->first();

                    if (is_null(${$this->val_weeks[$j]}[$this->times[$i]])) {
                        ${$this->val_weeks[$j]}[$this->times[$i]] = $this->StudioSchedules->findByUserIdAndWeek($id, $j)
                            ->where(function (QueryExpression $exp, Query $q) use ($i) {
                                return $exp->like('zone', '%' . $this->times[$i] . '%');
                            })
                            ->count();
                    } else {
                        // YouTubeID取得
                        ${$this->val_weeks[$j]}[$this->times[$i]]['youtube'] = $this->Common->getYoutubeId(${$this->val_weeks[$j]}[$this->times[$i]]['youtube']);
                    }
                }
            }

            $this->set('studio', $studio);
            $this->set(compact('suns', 'mons', 'tues', 'weds', 'thus', 'fris', 'sats'));
            $this->set('times', $this->times);
        } else {
            throw new NotFoundException(__('404 不正なアクセスまたはページが見つかりません。'));
        }
    }


    /**
     * 一般公開スタジオレッスンスケジュール一覧
     *
     * @param string $id ユーザーID
     * @return \Cake\Http\Response|void
     * @throws \Cake\Network\Exception\NotFoundException スタジオが存在しない場合
     */
    public function public($id = null)
    {
        $this->viewBuilder()->setLayout('public');

        // スタジオプロフィール取得
        $this->loadModel('Studios');
        // 一般公開を許可しているスタジオのみ検索
        $studio = $this->Studios->findByUserIdAndPublicFlag($id, 0)->contain(['Users'])->first();

        if ($studio) {
            // 各曜日スケジュールをセレクト。$times配列の時間系列にスケジュールの開始時間を合わせる
            for ($i = 0; $i < count($this->times); $i++) {

                for ($j = 0; $j < count($this->val_weeks); $j++) {
                    ${$this->val_weeks[$j]}[$this->times[$i]] = $this->StudioSchedules->findByUserIdAndWeekAndStart($id, $j, $this->times[$i])->first();

                    if (is_null(${$this->val_weeks[$j]}[$this->times[$i]])) {
                        ${$this->val_weeks[$j]}[$this->times[$i]] = $this->StudioSchedules->findByUserIdAndWeek($id, $j)
                            ->where(function (QueryExpression $exp, Query $q) use ($i) {
                                return $exp->like('zone', '%' . $this->times[$i] . '%');
                            })
                            ->count();
                    } else {
                        // YouTubeID取得
                        ${$this->val_weeks[$j]}[$this->times[$i]]['youtube'] = $this->Common->getYoutubeId(${$this->val_weeks[$j]}[$this->times[$i]]['youtube']);
                    }
                }
            }

            $this->set('studio', $studio);
            $this->set(compact('suns', 'mons', 'tues', 'weds', 'thus', 'fris', 'sats'));
            $this->set('times', $this->times);
        } else {
            throw new NotFoundException(__('404 不正なアクセスまたはページが見つかりません。'));
        }
    }


    /**
     * マイ スタジオスケジュール
     *
     * @return \Cake\Http\Response|void
     */
     public function mySchedule()
     {
         // 各曜日スケジュールをセレクト。$times配列の時間系列にスケジュールの開始時間を合わせる
         for ($i = 0; $i < count($this->times); $i++) {

             for ($j = 0; $j < count($this->val_weeks); $j++) {
                 ${$this->val_weeks[$j]}[$this->times[$i]] = $this->StudioSchedules->findByUserIdAndWeekAndStart($this->Auth->user('id'), $j, $this->times[$i])->first();

                 if (is_null(${$this->val_weeks[$j]}[$this->times[$i]])) {
                     ${$this->val_weeks[$j]}[$this->times[$i]] = $this->StudioSchedules->findByUserIdAndWeek($this->Auth->user('id'), $j)
                     ->where(function (QueryExpression $exp, Query $q) use ($i) {
                         return $exp->like('zone', '%' . $this->times[$i] . '%');
                     })
                     ->count();
                 } else {
                     // YouTubeID取得
                     ${$this->val_weeks[$j]}[$this->times[$i]]['youtube'] = $this->Common->getYoutubeId(${$this->val_weeks[$j]}[$this->times[$i]]['youtube']);
                 }
             }
         }

         $this->set(compact('suns', 'mons', 'tues', 'weds', 'thus', 'fris', 'sats'));
         $this->set('times', $this->times);
     }


    /**
     * スタジオレッスンスケジュール登録
     *
     * @return \Cake\Http\Response|null
     */
    public function add()
    {
        $this->Common->referer();
        $studioSchedule = $this->StudioSchedules->newEntity();

        if ($this->request->is('post')) {

            $this->request->data = $this->StudioSchedules->createEndAndZoneTime($this->request->getData());
            $studioSchedule = $this->StudioSchedules->patchEntity($studioSchedule, $this->request->getData());

            // 選択されたstart - zone時間帯に既にスケジュールがないか判定
            $schedule_error_count = $this->StudioSchedules->findByScheduleCount($studioSchedule);

            if ($schedule_error_count === 0) {
                if ($this->StudioSchedules->save($studioSchedule)) {
                    $this->Flash->success(__('レッスンスケジュールを登録しました。'));

                    return $this->redirect(['action' => 'mySchedule']);
                }
                $this->Flash->error(__('エラーがあります。再度確認してください。'));
            } else {
                $this->Flash->error(__('選択された曜日時間帯は既にスケジュールがあります。再度確認してください。'));
            }
        }

        // 登録時23:00 23:30 24:00 は選択させない
        $times = array_splice($this->times, -3);
        $this->set('difficulties', $this->Common->valueToKey($this->difficulties));
        $this->set('times',  $this->Common->valueToKey($this->times));
        $this->set('genres', $this->Common->valueToKey($this->genres));
        $this->set('weeks',  $this->weeks);
        $this->set(compact('studioSchedule'));
    }


    /**
     * レッスンスケジュール編集
     *
     * @param string|null $id スケジュールID
     * @return \Cake\Http\Response|null
     * @throws \Cake\Network\Exception\NotFoundException レコードが存在しない場合
     */
    public function edit($id = null)
    {
        $this->Common->referer();
        $studioSchedule = $this->StudioSchedules->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {

            $this->request->data = $this->StudioSchedules->createEndAndZoneTime($this->request->getData());
            $studioSchedule = $this->StudioSchedules->patchEntity($studioSchedule, $this->request->getData());

            // 選択されたstart - zone時間帯が指定Id以外でスケジュールがないか判定
            $schedule_error_count = $this->StudioSchedules->findByScheduleCountNotID($studioSchedule);

            if ($schedule_error_count === 0) {
                if ($this->StudioSchedules->save($studioSchedule)) {
                    $this->Flash->success(__('レッスンスケジュールを編集しました。'));

                    return $this->redirect(['action' => 'mySchedule']);
                }
                $this->Flash->error(__('エラーがあります。再度確認してください。'));
            } else {
                $this->Flash->error(__('選択された曜日時間帯は既にスケジュールがあります。再度確認してください。'));
            }
        }

        $times = array_splice($this->times, -3);
        $this->set('difficulties', $this->Common->valueToKey($this->difficulties));
        $this->set('times',  $this->Common->valueToKey($this->times));
        $this->set('genres', $this->Common->valueToKey($this->genres));
        $this->set('weeks',  $this->weeks);
        $this->set(compact('studioSchedule'));
    }


    /**
     * レッスンスケジュール削除
     *
     * @param string|null $id スケジュールID
     * @return \Cake\Http\Response|null myScheduleへ
     * @throws \Cake\Datasource\Exception\RecordNotFoundException レコードがない場合
     */
    public function delete($id = null)
    {
        $this->Common->referer();
        $this->request->allowMethod(['post', 'delete']);
        $studioSchedule = $this->StudioSchedules->get($id);
        if ($this->StudioSchedules->delete($studioSchedule)) {
            $this->Flash->success(__('スケジュールを削除しました。'));
        } else {
            $this->Flash->error(__('スケジュールを削除できません。解決しない場合フィードバックよりお問い合わせください。'));
        }
        return $this->redirect(['action' => 'mySchedule']);
    }
}
