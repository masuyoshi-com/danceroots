<?php $this->assign('title', $dancer->name . 'プロフィール編集') ?>

<div class="row">
    <div class="col-lg-12">
        <?= $this->Flash->render() ?>
    </div>
</div>

<?= $this->Form->create($dancer, ['type' => 'file']); ?>
<?= $this->Form->hidden('user_id', ['value' => h($dancer->user_id)]); ?>

<div class="row">

    <div class="col-lg-4 col-md-12 mt-5">
        <section class="card card-cascade card-avatar mt-5">

            <?php
                if ($dancer->icon) {
                    print $this->Html->image($dancer->icon);
                } else {
                    print $this->Html->image('/img/sample/no_icon.jpg');
                }
            ?>

            <div class="card-body">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="dark-gray-text w-100 text-left">アイコン画像 <span class="badge badge-info">変更する場合のみ選択</span></label>
                            <?= $this->Form->control('icon_file', ['type' => 'file', 'class' => 'form-control']) ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <label class="dark-gray-text w-100 text-left"><small>ダンサー名</small></label>
                        <div class="md-form mt-0">
                            <?= $this->Form->control('name', ['class' => 'form-control']) ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <label class="dark-gray-text w-100 text-left"><small>ダンスチーム名</small></label>
                        <div class="md-form mt-0">
                            <?= $this->Form->control('team_name', ['class' => 'form-control']) ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="md-form">
                            <?= $this->Form->control('genre',
                                [
                                    'id'      => 'f--genre',
                                    'type'    => 'select',
                                    'class'   => 'mdb-select colorful-select dropdown-primary',
                                    'options' => $genres
                                ]
                            ) ?>
                            <label for="f--genre">ジャンル</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="md-form">
                            <?= $this->Form->control('pref',
                                [
                                    'id'      => 'f--pref',
                                    'type'    => 'select',
                                    'class'   => 'mdb-select colorful-select dropdown-primary',
                                    'options' => $prefs
                                ]
                            ) ?>
                            <label for="f--pref">都道府県</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="md-form">
                            <?= $this->Form->control('offer_flag',
                                [
                                    'id'      => 'f--offer',
                                    'type'    => 'select',
                                    'class'   => 'mdb-select colorful-select dropdown-primary',
                                    'options' => ['許可する', '許可しない']
                                ]
                            ) ?>
                            <label for="f--offer">オファー</label>
                        </div>
                    </div>
                </div>
            </div><!-- /.card-body -->
        </section>
    </div><!-- /.col-lg-4 -->

    <div class="col-lg-8 col-md-12">
        <section class="section mb-3">
            <div class="row">
                <div class="col-lg-12 mb-r mt-4">
                    <div class="card card-cascade narrower">

                        <div class="view gradient-card-header mdb-color lighten-2">
                            <h5 class="mb-0 font-bold">プロフィール編集</h5>
                            <small>
                                <i class="fa fa-info-circle"></i> 閲覧者の印象に残るように詳細に項目を入力しましょう。
                            </small>
                        </div>

                        <div class="card-body text-center mb-3">

                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-xs-12">
                                    <div class="md-form">
                                        <?= $this->Form->control('age', ['id' => 'f--age', 'class' => 'form-control', 'min' => 1, 'max' => 60]) ?>
                                        <label for="f--age">年齢</label>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-xs-12">
                                    <div class="md-form">
                                        <?= $this->Form->control('career', ['id' => 'f--career', 'class' => 'form-control', 'min' => 1, 'max' => 60]) ?>
                                        <label for="f--age">ダンス年数</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="md-form">
                                        <?= $this->Form->control('self_intro', ['id' => 'f--self_intro', 'class' => 'form-control']) ?>
                                        <label for="f--self_intro">自己紹介</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="md-form">
                                        <?= $this->Form->textarea('history',
                                            [
                                                'id'          => 'f--history',
                                                'class'       => 'form-control md-textarea',
                                                'rows'        => '7',
                                                'placeholder' => 'コンテストやクラブゲスト歴など'
                                            ]
                                        ) ?>
                                        <label for="f--history">経歴</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-xs-12">
                                    <div class="md-form">
                                        <?= $this->Form->control('practice_place', ['id' => 'f--p_place', 'class' => 'form-control']) ?>
                                        <label for="f--p_place">練習場所</label>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-xs-12">
                                    <div class="md-form">
                                        <?= $this->Form->control('favorite_brand', ['id' => 'f--f_brand', 'class' => 'form-control']) ?>
                                        <label for="f--f_brand">好きなブランド</label>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-xs-12">
                                    <div class="md-form">
                                        <?= $this->Form->control('url', ['id' => 'f--url', 'class' => 'form-control']) ?>
                                        <label for="f--url">サイト</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-xs-12">
                                    <label class="dark-gray-text w-100 text-left"><small>Twitter</small></label>
                                    <div class="md-form mt-0">
                                        <?= $this->Form->control('twitter', ['class' => 'form-control']) ?>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-xs-12">
                                    <label class="dark-gray-text w-100 text-left"><small>Facebook</small></label>
                                    <div class="md-form mt-0">
                                        <?= $this->Form->control('facebook', ['class' => 'form-control']) ?>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12 col-xs-12">
                                    <label class="dark-gray-text w-100 text-left"><small>Instagram</small></label>
                                    <div class="md-form mt-0">
                                        <?= $this->Form->control('instagram', ['class' => 'form-control']) ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-xs-12">
                                    <div class="md-form">
                                        <?= $this->Form->control('respect_dancer', ['id' => 'f--r_dancer', 'class' => 'form-control']) ?>
                                        <label for="f--r_dancer">リスペクトダンサー</label>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-xs-12">
                                    <div class="md-form">
                                        <?= $this->Form->control('favorite_artist', ['id' => 'f--f_artist', 'class' => 'form-control']) ?>
                                        <label for="f--f_artist">好きなアーティスト</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="md-form">
                                        <?= $this->Form->textarea('plan',
                                            [
                                                'id'    => 'f--plan',
                                                'class' => 'form-control md-textarea',
                                                'rows'  => '7',
                                            ]
                                        ) ?>
                                        <label for="f--history">PR・今後の予定</label>
                                    </div>
                                </div>
                            </div>

                        </div><!-- /.card-body -->
                    </div><!-- /.card -->
                </div><!-- /.col-lg-12 -->
            </div><!-- /.row -->
        </section>
    </div><!-- /.col-lg-8 -->
</div><!-- /.row -->

<div class="card card-body mb-3">
    <div class="row">
        <div class="col-lg-12">
            <p><i class="fa fa-youtube-play yt-ic"></i> Youtube</p>
        </div>
        <?php for ($i = 0; $i < count($videos); $i++) : ?>
        <div class="col-lg-4 col-md-12 mb-3">
            <?php if ($videos[$i]) : ?>
                <div class="embed-responsive embed-responsive-16by9 z-depth-1">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= h($videos[$i]) ?>?rel=0" style="height: 100%" allowfullscreen></iframe>
                </div>
            <?php else : ?>
                <?= $this->Html->image('/img/sample/no_video.jpg', ['class' => 'img-fluid']) ?>
            <?php endif; ?>
        </div>
        <?php endfor; ?>
    </div><!-- /.row -->

    <div class="row">
        <div class="col-lg-4 col-md-6 col-xs-12">
            <label class="dark-gray-text w-100 text-left"><small>Youtube①</small></label>
            <div class="md-form mt-0">
                <?= $this->Form->control('youtube1', ['class' => 'form-control']) ?>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-xs-12">
            <label class="dark-gray-text w-100 text-left"><small>Youtube②</small></label>
            <div class="md-form mt-0">
                <?= $this->Form->control('youtube2', ['class' => 'form-control']) ?>
            </div>
        </div>
        <div class="col-lg-4 col-md-12 col-xs-12">
            <label class="dark-gray-text w-100 text-left"><small>Youtube③</small></label>
            <div class="md-form mt-0">
                <?= $this->Form->control('youtube3', ['class' => 'form-control']) ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 mt-4">
            <p><i class="fa fa-image"></i> Image <span class="badge badge-info">変更する場合のみ選択</span></p>
        </div>

        <div id="mdb-lightbox-ui"></div>

        <div class="mdb-lightbox">

            <?php if ($dancer->image1) : ?>
                <figure class="col-lg-4 col-md-12">
                    <?= $this->Html->link($this->Html->image($dancer->image1, ['class' => 'img-fluid']),
                        $dancer->image1,
                        ['data-size' => '1600x1067', 'escape' => false]
                    ) ?>
                </figure>
            <?php endif; ?>

            <?php if ($dancer->image2) : ?>
                <figure class="col-lg-4 col-md-12">
                    <?= $this->Html->link($this->Html->image($dancer->image2, ['class' => 'img-fluid']),
                        $dancer->image2,
                        ['data-size' => '1600x1067', 'escape' => false]
                    ) ?>
                </figure>
            <?php endif; ?>

            <?php if ($dancer->image3) : ?>
                <figure class="col-lg-4 col-md-12">
                    <?= $this->Html->link($this->Html->image($dancer->image3, ['class' => 'img-fluid']),
                        $dancer->image3,
                        ['data-size' => '1600x1067', 'escape' => false]
                    ) ?>
                </figure>
            <?php endif; ?>
        </div>
    </div><!-- /.row -->

    <div class="row">
        <div class="col-lg-4 col-md-12">
            <div class="form-group">
                <label class="dark-gray-text w-100 text-left mt-2"><small>ダンス画像①</small></label>
                <?= $this->Form->control('image1_file', ['type' => 'file', 'class' => 'form-control']) ?>
            </div>
        </div>
        <div class="col-lg-4 col-md-12">
            <div class="form-group">
                <label class="dark-gray-text w-100 text-left mt-2"><small>ダンス画像②</small></label>
                <?= $this->Form->control('image2_file', ['type' => 'file', 'class' => 'form-control']) ?>
            </div>
        </div>
        <div class="col-lg-4 col-md-12">
            <div class="form-group">
                <label class="dark-gray-text w-100 text-left mt-2"><small>ダンス画像③</small></label>
                <?= $this->Form->control('image3_file', ['type' => 'file', 'class' => 'form-control']) ?>
            </div>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-lg-12">
            <?= $this->Form->button('編集する', [
                    'type'   => 'submit',
                    'class'  => 'btn btn-success btn-block',
                ])
            ?>
        </div>
    </div>
</div><!-- /.card -->
<?= $this->Form->end() ?>
