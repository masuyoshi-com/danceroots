<?php
    $this->assign('description', 'Danceroots.net - サイトマップ');
    $this->assign('title', 'サイトマップ');
?>
<div class="row mt-4">
</div>
<div class="card card-body mt-5 mb-4">
    <h2 class="h2-responsive text-center"><i class="fa fa-sitemap" aria-hidden="true"></i> サイトマップ</h2>
    <hr>

    <div class="row">
        <div class="col-lg-12">
            <h5 class="h5-responsive mt-2 mb-1">公開コンテンツ</h5>
            <hr class="success-color mb-2 pb-1 mt-0 d-inline-block mx-auto" style="width: 100px;">
            <div class="d-flex flex-wrap">
                <div class="p-2">
                    <?= $this->Html->link('ストリートダンサー検索', ['controller' => 'Dancers', 'action' => 'public'], ['class' => 'dark-grey-text']) ?>
                </div>
                <div class="p-2">
                    <?= $this->Html->link('ダンススタジオ・スクール検索', ['controller' => 'Studios', 'action' => 'public'], ['class' => 'dark-grey-text']) ?>
                </div>
                <div class="p-2">
                    <?= $this->Html->link('イベント検索', ['controller' => 'Events', 'action' => 'public'], ['class' => 'dark-grey-text']) ?>
                </div>
                <div class="p-2">
                    <?= $this->Html->link('おすすめミュージック', ['controller' => 'RecommendMusics', 'action' => 'public'], ['class' => 'dark-grey-text']) ?>
                </div>
                <div class="p-2">
                    <?= $this->Html->link('おすすめダンス動画', ['controller' => 'RecommendVideos', 'action' => 'public'], ['class' => 'dark-grey-text']) ?>
                </div>
                <div class="p-2">
                    <?= $this->Html->link('読んで学ぶWebストリートダンス講座', ['controller' => 'Lectures', 'action' => 'index'], ['class' => 'dark-grey-text']) ?>
                </div>
            </div>
        </div>
    </div>
    <hr>

    <div class="row">
        <div class="col-lg-12">
            <h5 class="h5-responsive mt-2 mb-1">各ユーザー区分機能紹介</h5>
            <hr class="blue mb-2 pb-1 mt-0 d-inline-block mx-auto" style="width: 170px;">
            <div class="d-flex flex-wrap">
                <div class="p-2">
                    <?= $this->Html->link('StreetDancer', ['controller' => 'Pages', 'action' => 'dancer'], ['class' => 'dark-grey-text']) ?>
                </div>
                <div class="p-2">
                    <?= $this->Html->link('DanceStudio / School', ['controller' => 'Pages', 'action' => 'studio'], ['class' => 'dark-grey-text']) ?>
                </div>
                <div class="p-2">
                    <?= $this->Html->link('Organizer / Company', ['controller' => 'Pages', 'action' => 'organizer'], ['class' => 'dark-grey-text']) ?>
                </div>
                <div class="p-2">
                    <?= $this->Html->link('General', ['controller' => 'Pages', 'action' => 'general'], ['class' => 'dark-grey-text']) ?>
                </div>
            </div>
        </div>
    </div>
    <hr>

    <div class="row">
        <div class="col-lg-12">
            <h5 class="h5-responsive mt-2 mb-1">会員メニュー</h5>
            <hr class="deep-orange mb-2 pb-1 mt-0 d-inline-block mx-auto" style="width: 100px;">
            <p class="m-0"><small><span class="red-text">※</span>会員登録で利用できます。</small></p>
            <div class="d-flex flex-wrap">
                <div class="p-2">マイプロフィール</div>
                <div class="p-2">全ストリートダンサー検索</div>
                <div class="p-2">ダンスサークル</div>
                <div class="p-2">全ダンススタジオ検索</div>
                <div class="p-2">レッスンスケジュール管理(<small><span class="red-text">※</span>スタジオユーザーのみ</small>)</div>
                <div class="p-2">ダンス動画</div>
                <div class="p-2">ミュージック</div>
                <div class="p-2">イベント</div>
                <div class="p-2">ダンス関連求人(<small><span class="red-text">※</span>スタジオ / 企業 ユーザーのみ</small>)</div>
            </div>
        </div>
    </div>
    <hr>

    <div class="row">
        <div class="col-lg-12">
            <h5 class="h5-responsive mt-2 mb-1">サイトについて</h5>
            <hr class="indigo mb-2 pb-1 mt-0 d-inline-block mx-auto" style="width: 100px;">
            <div class="d-flex flex-wrap">
                <div class="p-2">
                    <?= $this->Html->link('利用規約', ['controller' => 'Pages', 'action' => 'contract'], ['class' => 'dark-grey-text']) ?>
                </div>
                <div class="p-2">
                    <?= $this->Html->link('プライバシーポリシー', ['controller' => 'Pages', 'action' => 'privacy'], ['class' => 'dark-grey-text']) ?>
                </div>
                <div class="p-2">
                    <?= $this->Html->link('サイトマップ', ['controller' => 'Pages', 'action' => 'sitemap'], ['class' => 'dark-grey-text']) ?>
                </div>
                <div class="p-2">
                    <?= $this->Html->link('お問い合わせ', ['controller' => 'Inquiries', 'action' => 'index'], ['class' => 'dark-grey-text']) ?>
                </div>
            </div>
        </div>
    </div>
    <hr>
</div>
