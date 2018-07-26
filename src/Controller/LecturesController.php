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
        $this->viewBuilder()->setLayout('public');
    }


    /**
     * Webダンス講座 メインメニュー
     *
     */
    public function index()
    {
    }


    /**
     * 初級編 - ダンス仲間を探そう
     */
    public function dancefriend()
    {
    }


    /**
     * 初級編 - 初期練習はダンスの基礎だけでよい
     */
    public function initialPractice()
    {
    }


    /**
     * 初級編 - 毎日決めた練習時間は守る
     */
    public function practiceTime()
    {
    }


    /**
     * 初級編 - 色んなストリートダンサーを見る
     */
    public function variousDancers()
    {
    }


    /**
     * 初級編 - 色んなストリートダンサーを見る
     */
    public function notAiming()
    {
    }


    /**
     * 初級編 - 基礎を突き詰める
     */
    public function foundation()
    {
    }


    /**
     * 初級編 - 周りがダンスをやめていってもあなたは続けられるか
     */
    public function continueDancing()
    {
    }


    /**
     * 初級編 - とりあえずサンプリングする
     */
    public function sampling()
    {
    }


    /**
     * 初級編 - ストリートダンス動画と一緒に踊る
     */
    public function streetdanceVideo()
    {
    }


    /**
     * 初級編 - ダンスインストラクターに過剰な憧れは禁物
     */
    public function noLonging()
    {
    }


    /**
     * 中級編 - バリデーションを自分なりに考える
     */
    public function validation()
    {
    }


    /**
     * 中級編 - 音楽を知る
     */
    public function knowMusic()
    {
    }


    /**
     * 中級編 - 服装に気を使う
     */
    public function clothing()
    {
    }


    /**
     * 中級編 - ストリートダンスルーツを辿る
     */
    public function danceRoots()
    {
    }


    /**
     * 中級編 - 自分の知っていることを人に教える
     */
    public function teachPeople()
    {
    }


    /**
     * 中級編 - 壁にぶつかってからが勝負
     */
    public function wallGame()
    {
    }


    /**
     * 中級編 - ストリートダンスショーまたはコンテストに挑戦する
     */
    public function challengeContest()
    {
    }


    /**
     * 中級編 - 他のダンサーのスタイルを理解する
     */
    public function understandStyle()
    {
    }


    /**
     * 上級編 - プロ意識を持つ
     */
    public function professionalism()
    {
    }


    /**
     * 上級編 - ダンスインストラクターになる
     */
    public function danceInstructor()
    {
    }


    /**
     * 上級編 - 謙虚であること
     */
    public function humility()
    {
    }


    /**
     * 上級編 - 自分のスタイルを持つ
     */
    public function havingStyle()
    {
    }


    /**
     * 上級編 - ダンス活動で忙しくても、自分一人の練習を設ける
     */
    public function onePracticeTime()
    {
    }


    /**
     * 上級編 - HipHop文化自体に触れる
     */
    public function hiphopCulture()
    {
    }


    /**
     * 上級編 - ダンス以外にもう一つ武器を持つ
     */
    public function haveWeapon()
    {
    }


    /**
     * 上級編 - スタイルを貫く
     */
    public function pierceStyle()
    {
    }
}
