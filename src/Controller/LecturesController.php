<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;


class LecturesController extends AppController
{
    /**
     * 初期化メソッド - Lecturesは全てパブリック(アクセス許可)
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow();
    }


    /**
     * Webダンス講座 メインメニュー
     *
     */
    public function index()
    {
        $this->viewBuilder()->setLayout('public');
    }


    /**
     * 初級編 - ダンス仲間を探そう
     */
    public function dancefriend()
    {
        $this->viewBuilder()->setLayout('public');
    }


    
}
