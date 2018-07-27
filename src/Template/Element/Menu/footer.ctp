<footer class="page-footer center-on-small-only unique-color-dark">
    <div class="container mt-5 mb-4 text-center text-md-left">
        <div class="row">
            <div class="col-md-3 col-lg-4 col-xl-3 mb-r">
                <h6 class="title font-bold">
                    <strong>Member Menu1</strong>
                </h6>
                <hr class="blue mb-4 pb-1 mt-0 d-inline-block mx-auto" style="width: 60px;">
                <p>
                    マイプロフィール作成
                </p>
                <!--
                <p>
                    ダンスチーム登録・検索
                </p>
                -->
                <p>
                    ダンスサークル作成・検索
                </p>
                <p>
                    スタジオ検索
                </p>
            </div>
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-r">
                <h6 class="title font-bold">
                    <strong>Member Menu2</strong>
                </h6>
                <hr class="blue mb-4 pb-1 mt-0 d-inline-block mx-auto" style="width: 60px;">
                <p>
                    ダンス動画
                </p>
                <p>
                    ミュージック
                </p>
                <p>
                    イベント登録・検索
                </p>
                <p>
                    ダンス関連求人
                </p>
            </div>
            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-r">
                <h6 class="title font-bold">
                    <strong>Top Menu</strong>
                </h6>
                <hr class="blue mb-4 pb-1 mt-0 d-inline-block mx-auto" style="width: 60px;">
                <p>
                    <?= $this->Html->link('HOME', '/') ?>
                </p>
                <p>
                    <?= $this->Html->link('Dancer', ['controller' => 'Pages', 'action' => 'dancer']) ?>
                </p>
                <p>
                    <?= $this->Html->link('Studio', ['controller' => 'Pages', 'action' => 'studio']) ?>
                </p>
                <p>
                    <?= $this->Html->link('Organaizer', ['controller' => 'Pages', 'action' => 'organizer']) ?>
                </p>
                <p>
                    <?= $this->Html->link('General', ['controller' => 'Pages', 'action' => 'general']) ?>
                </p>
                <p>
                    <?= $this->Html->link('Webダンス講座', ['controller' => 'Lectures', 'action' => 'index']) ?>
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
                <!--
                <p>
                    <?= $this->Html->link('サイトマップ', ['action' => 'sitemap']) ?>
                </p>
                -->
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
