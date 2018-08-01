<footer class="page-footer center-on-small-only unique-color-dark">
    <div class="container mt-5 mb-4 text-center text-md-left">
        <div class="row">
            <div class="col-md-3 col-lg-4 col-xl-3 mb-r">
                <h6 class="title font-bold">
                    <strong>Top Menu1</strong>
                </h6>
                <hr class="blue mb-4 pb-1 mt-0 d-inline-block mx-auto" style="width: 60px;">
                <p>
                    <?= $this->Html->link('HOME', '/') ?>
                </p>
                <p>
                    <?= $this->Html->link('ストリートダンサー検索', ['controller' => 'Dancers', 'action' => 'public']) ?>
                </p>
                <p>
                    <?= $this->Html->link('スタジオ検索', ['controller' => 'Studios', 'action' => 'public']) ?>
                </p>
                <p>
                    <?= $this->Html->link('イベント検索', ['controller' => 'Events', 'action' => 'public']) ?>
                </p>
                <p>
                    <?= $this->Html->link('Webダンス講座', ['controller' => 'Lectures', 'action' => 'index']) ?>
                </p>
            </div>
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-r">
                <h6 class="title font-bold">
                    <strong>Top Menu2</strong>
                </h6>
                <hr class="blue mb-4 pb-1 mt-0 d-inline-block mx-auto" style="width: 60px;">
                <p>
                    ユーザー機能紹介
                </p>
                <p>
                    <?= $this->Html->link('ストリートダンサー', ['controller' => 'Pages', 'action' => 'dancer']) ?>
                </p>
                <p>
                    <?= $this->Html->link('ダンススタジオ', ['controller' => 'Pages', 'action' => 'studio']) ?>
                </p>
                <p>
                    <?= $this->Html->link('オーガナイザー・企業', ['controller' => 'Pages', 'action' => 'organizer']) ?>
                </p>
                <p>
                    <?= $this->Html->link('一般', ['controller' => 'Pages', 'action' => 'general']) ?>
                </p>
            </div>
            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-r">
                <h6 class="title font-bold">
                    <strong>Member Menu</strong>
                </h6>
                <hr class="blue mb-4 pb-1 mt-0 d-inline-block mx-auto" style="width: 60px;">
                <p>
                    マイプロフィール
                </p>
                <!--
                <p>
                    ダンスチーム
                </p>
                -->
                <p>
                    ダンスサークル
                </p>
                <p>
                    メッセージ
                </p>
                <p>
                    ダンス動画
                </p>
                <p>
                    ミュージック
                </p>
                <p>
                    イベント管理
                </p>
                <p>
                    ダンス関連求人
                </p>
            </div>
            <div class="col-md-4 col-lg-3 col-xl-3">
                <h6 class="title font-bold">
                    <strong>Contact / 他</strong>
                </h6>
                <hr class="blue mb-4 pb-1 mt-0 d-inline-block mx-auto" style="width: 60px;">
                <p>
                    <?= $this->Html->link('利用規約', ['controller' => 'Pages', 'action' => 'contract']) ?>
                </p>
                <p>
                    <?= $this->Html->link('プライバシーポリシー', ['controller' => 'Pages', 'action' => 'privacy']) ?>
                </p>
                <p>
                    <?= $this->Html->link('<i class="fa fa-sitemap mr-3"></i> サイトマップ',
                        ['controller' => 'Pages', 'action' => 'sitemap'],
                        ['escape' => false]
                    ) ?>
                </p>
                <p>
                    <?= $this->Html->link('<i class="fa fa-envelope mr-3"></i> お問い合わせ',
                        ['controller' => 'Inquiries', 'action' => 'index'],
                        ['escape' => false]
                    ) ?>
                </p>
                <hr>
                <p>
                    <span id="ss_gmo_img_wrapper_130-66_image_ja">
                        <a href="https://jp.globalsign.com/" target="_blank" rel="nofollow">
                            <img alt="SSL GMOグローバルサインのサイトシール" border="0" id="ss_img" src="//seal.globalsign.com/SiteSeal/images/gs_noscript_130-66_ja.gif">
                        </a>
                    </span>
                    <script type="text/javascript" src="//seal.globalsign.com/SiteSeal/gmogs_image_130-66_ja.js" defer="defer"></script>
                </p>
            </div>
        </div><!-- /.row -->
    </div><!-- /.container -->

    <div class="footer-copyright">
        <div class="container-fluid text-center">
            © <?= date('Y') ?> Copyright
            <span class="white-text">
                <strong> dancer<span class="blue-text">oo</span>ts.net</strong>
            </span>
        </div>
    </div>
</footer>
