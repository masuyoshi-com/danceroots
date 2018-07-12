<?php $this->assign('title', 'オーガナイザー/企業プロフィール作成'); ?>

<div class="row">
    <div class="col-lg-12">
        <?= $this->Flash->render() ?>
    </div>
</div>

<?= $this->Form->create($organizer, ['type' => 'file']); ?>
<?= $this->Form->hidden('user_id', ['value' => h($user_id)]) ?>
<div class="row">

    <div class="col-lg-8 col-md-12">
        <section class="section mb-3">

            <div class="row">
                <div class="col-lg-12 mb-r mt-4">
                    <div class="card card-cascade narrower">

                        <div class="view gradient-card-header mdb-color lighten-2">
                            <h5 class="mb-0 font-bold"><i class="fa fa-address-card" aria-hidden="true"></i> プロフィール作成</h5>
                            <small><i class="fa fa-info-circle"></i> 詳細に項目を入力しましょう。</small>
                        </div>

                        <div class="card-body mb-3">

                            <div class="row">
                                <div class="col-lg-12">
                                    <label class="dark-gray-text w-100 text-left"><small>自己紹介</small></label>
                                    <div class="md-form mt-0">
                                        <?= $this->Form->control('self_intro', ['class' => 'form-control']) ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="md-form">
                                        <?= $this->Form->textarea('organaized',
                                            [
                                                'id'    => 'f--organaized',
                                                'class' => 'form-control md-textarea',
                                                'rows'  => '8',
                                            ]
                                        ) ?>
                                        <label for="f--organaized">主催イベント実績</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12 mt-2">
                                    <label class="dark-gray-text w-100 text-left"><small>Youtube</small> <span class="badge badge-info">イベント動画URLのコピペ</span></label>
                                    <div class="md-form mt-0">
                                        <?= $this->Form->control('youtube', ['class' => 'form-control']) ?>
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
                                    <div class="form-group">
                                        <label class="dark-gray-text w-100 text-left mt-2"><small>イベント画像①</small></label>
                                        <?= $this->Form->control('image1_file', ['type' => 'file', 'class' => 'form-control']) ?>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="dark-gray-text w-100 text-left mt-2"><small>イベント画像②</small></label>
                                        <?= $this->Form->control('image2_file', ['type' => 'file', 'class' => 'form-control']) ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="dark-gray-text w-100 text-left mt-2"><small>イベント画像③</small></label>
                                        <?= $this->Form->control('image3_file', ['type' => 'file', 'class' => 'form-control']) ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="md-form">
                                        <?= $this->Form->textarea('introduction',
                                            [
                                                'id'    => 'f--intro',
                                                'class' => 'form-control md-textarea',
                                                'rows'  => '8',
                                            ]
                                        ) ?>
                                        <label for="f--intro">企業紹介・各種イベントコンセプト</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-lg-12">
                                    <div class="md-form">
                                        <?= $this->Form->textarea('plan',
                                            [
                                                'id'    => 'f--plan',
                                                'class' => 'form-control md-textarea',
                                                'rows'  => '8',
                                            ]
                                        ) ?>
                                        <label for="f--plan">今後のイベント予定など</label>
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
                </div><!-- /.col-lg-12 -->
            </div><!-- /.row -->
        </section>
    </div><!-- /.col-lg-8 -->


    <div class="col-lg-4 col-md-12 mt-5">
        <section class="card card-cascade card-avatar mb-4 mt-5">

            <?= $this->Html->image('/img/sample/no_icon.jpg') ?>

            <div class="card-body">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="dark-gray-text w-100 text-left"><small>アイコン画像</small>  <span class="badge badge-info">正方形サイズ</span></label>
                            <?= $this->Form->control('icon_file', ['type' => 'file', 'class' => 'form-control']) ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="md-form">
                            <?= $this->Form->control('company', ['id' => 'f--company', 'class' => 'form-control']) ?>
                            <label for="f--company">会社・企業名</label>
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
                            <?= $this->Form->control('city', ['id' => 'f--city', 'class' => 'form-control']) ?>
                            <label for="f--city">市区町村</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="md-form">
                            <?= $this->Form->control('url', ['id' => 'f--url', 'class' => 'form-control']) ?>
                            <label for="f--url">ホームページ</label>
                        </div>
                    </div>
                </div>

            </div><!-- /.card-body -->
        </section>
    </div><!-- /.col-lg-4 -->
</div><!-- /. row -->
<?= $this->Form->end() ?>
