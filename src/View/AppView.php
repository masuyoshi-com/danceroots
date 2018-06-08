<?php
namespace App\View;

use Cake\View\View;

/**
 * Application View
 *
 * @link https://book.cakephp.org/3.0/en/views.html#the-app-view
 */
class AppView extends View
{

    /**
     * 初期化
     *
     * @return void
     */
    public function initialize()
    {
        // フォームヘルパー制御
        $this->loadHelper('Form', ['templates' => 'app_form']);
        // ページネーターテンプレート指定
        $this->loadHelper('Paginator', ['templates' => 'paginator-templates']);
    }
}
