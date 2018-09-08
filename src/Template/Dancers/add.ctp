<?php $this->assign('title', 'ダンサープロフィール作成'); ?>

<div class="row">
    <div class="col-lg-12">
        <?= $this->Flash->render() ?>
    </div>
</div>

<?= $this->Form->create($dancer, ['type' => 'file']) ?>
<?= $this->Form->hidden('user_id', ['value' => $logins['id']]) ?>
<div class="row">

    <div class="col-lg-4 col-md-12 mt-4">
        <section class="card card-cascade card-avatar mb-4 mt-5">

            <?= $this->Html->image('/img/sample/no_icon.jpg') ?>
            <div class="card-body">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="dark-gray-text w-100 text-left">
                                <small>アイコン画像</small>
                                <span class="badge badge-info">正方形サイズ</span>
                                <span class="badge badge-primary">対応拡張子 - jpg png gif</span>
                            </label>
                            <?= $this->Form->control('icon_file', ['type' => 'file', 'class' => 'form-control']) ?>
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
                                    'options' => $genres,
                                ]
                            ) ?>
                            <label for="f--genre">ジャンル <span class="red-text">※</span></label>
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
                                    'options' => $prefs,
                                ]
                            ) ?>
                            <label for="f--pref">都道府県 <span class="red-text">※</span></label>
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

                <div class="row">
                    <div class="col-lg-12">
                        <div class="md-form">
                            <?= $this->Form->control('public_flag',
                                [
                                    'id'      => 'f--public',
                                    'type'    => 'select',
                                    'class'   => 'mdb-select colorful-select dropdown-success',
                                    'options' => ['公開', '会員のみ']
                                ]
                            ) ?>
                            <label for="f--offer">一般公開・会員のみ公開</label>
                        </div>
                    </div>
                </div>
            </div><!-- /.card-body -->
        </section>
    </div><!-- /.col-lg-4 -->


    <div class="col-lg-8 col-md-12 mb-3">
        <div class="card card-cascade narrower">

            <div class="view gradient-card-header mdb-color lighten-2">
                <h5 class="mb-0 font-bold"><i class="fa fa-address-card" aria-hidden="true"></i> プロフィール作成</h5>
                <small><i class="fa fa-info-circle"></i> 閲覧者の印象に残るように詳細に項目を入力しましょう。</small>
            </div>

            <div class="card-body text-center">

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
                            <label for="f--career">ダンス年数 <span class="red-text">※</span></label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="md-form">
                            <?= $this->Form->control('self_intro', ['id' => 'f--self_intro', 'class' => 'form-control']) ?>
                            <label for="f--self_intro">自己紹介 <span class="red-text">※</span></label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <label class="dark-gray-text w-100 text-left mt-2"><small>ダンス画像①</small></label>
                            <?= $this->Form->control('image1_file', ['type' => 'file', 'class' => 'form-control']) ?>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <label class="dark-gray-text w-100 text-left mt-2"><small>ダンス画像②</small></label>
                            <?= $this->Form->control('image2_file', ['type' => 'file', 'class' => 'form-control']) ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="dark-gray-text w-100 text-left mt-2"><small>ダンス画像③</small></label>
                            <?= $this->Form->control('image3_file', ['type' => 'file', 'class' => 'form-control']) ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-xs-12">
                        <label class="dark-gray-text w-100 text-left"><small>Youtube①</small> <span class="badge badge-info">ダンス動画URLをコピペ</span></label>
                        <div class="md-form mt-0">
                            <?= $this->Form->control('youtube1', ['class' => 'form-control']) ?>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xs-12">
                        <label class="dark-gray-text w-100 text-left"><small>Youtube②</small></label>
                        <div class="md-form mt-0">
                            <?= $this->Form->control('youtube2', ['id' => 'f--youtube2', 'class' => 'form-control']) ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <label class="dark-gray-text w-100 text-left"><small>Youtube③</small></label>
                        <div class="md-form mt-0">
                            <?= $this->Form->control('youtube3', ['class' => 'form-control']) ?>
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
                            <label for="f--history">経歴 <span class="red-text">※</span></label>
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
                        <label class="dark-gray-text w-100 text-left mt-3"><small>Twitter</small></label>
                        <div class="md-form mt-0">
                            <?= $this->Form->control('twitter', ['class' => 'form-control']) ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-xs-12">
                        <label class="dark-gray-text w-100 text-left mt-3"><small>Facebook</small></label>
                        <div class="md-form mt-0">
                            <?= $this->Form->control('facebook', ['class' => 'form-control']) ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-xs-12">
                        <label class="dark-gray-text w-100 text-left mt-3"><small>Instagram</small></label>
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
                    <div class="col-lg-12 mb-3">
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

                <div class="row">
                    <div class="col-lg-12">
                        <?= $this->Form->button('<i class="fa fa-plus"></i> プロフィール作成', [
                                'type'   => 'submit',
                                'class'  => 'btn btn-success btn-block',
                                'escape' => false,
                            ])
                        ?>
                    </div>
                </div>
            </div><!-- /.card-body -->
        </div><!-- /.card -->
    </div><!-- /.col-lg-8 -->
</div><!-- /.row -->
<?= $this->Form->end() ?>
