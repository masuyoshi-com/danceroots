<?php $this->assign('title', 'プロフィール編集'); ?>

<div class="row">
    <div class="col-lg-12">
        <?= $this->Flash->render() ?>
    </div>
</div>

<?= $this->Form->create($general, ['type' => 'file']); ?>
<?= $this->Form->hidden('user_id', ['value' => h($general->user_id)]) ?>

<div class="row mb-3">

    <div class="col-lg-4 col-md-12 mt-5">
        <section class="card card-cascade card-avatar mb-4 mt-5">

            <?php
                if ($general->icon) {
                    print $this->Html->image($general->icon);
                } else {
                    print $this->Html->image('/img/sample/no_icon.jpg');
                }
            ?>

            <div class="card-body">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="dark-gray-text w-100 text-left">
                                <small>アイコン画像 </small>
                                <span class="badge badge-info">変更する場合のみ選択</span>
                            </label>
                            <?= $this->Form->control('icon_file', ['type' => 'file', 'class' => 'form-control']) ?>
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

            </div><!-- /.card-body -->
        </section>
    </div><!-- /.col-lg-4 -->


    <div class="col-lg-8 col-md-12">
        <div class="card card-cascade narrower">

            <div class="view gradient-card-header mdb-color lighten-2">
                <h5 class="mb-0 font-bold">プロフィール編集</h5>
                <small><i class="fa fa-info-circle"></i> 必要項目に入力してください。</small>
            </div>

            <div class="card-body mb-5">

                <div class="row">
                    <div class="col-lg-12">
                        <label class="dark-grey-text"><small>自己紹介</small></label>
                        <div class="md-form mt-0">
                            <?= $this->Form->control('self_intro', ['class' => 'form-control']) ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4 col-md-6 col-xs-12">
                        <div class="md-form">
                            <?= $this->Form->control('favorite_genre',
                                [
                                    'id'      => 'f--f_genre',
                                    'type'    => 'select',
                                    'class'   => 'mdb-select colorful-select dropdown-primary',
                                    'options' => $genres,
                                ]
                            ) ?>
                            <label for="f--f_genre">好きなジャンル</label>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-xs-12">
                        <div class="md-form">
                            <?= $this->Form->control('favorite_dancer', ['id' => 'f--f_dancer', 'class' => 'form-control']) ?>
                            <label for="f--f_dancer">好きなダンサー</label>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-xs-12">
                        <div class="md-form">
                            <?= $this->Form->control('favorite_artist', ['id' => 'f--f_artist', 'class' => 'form-control']) ?>
                            <label for="f--f_artist">好きなアーティスト</label>
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
                    <div class="col-lg-12 mb-5">
                        <div class="md-form">
                            <?= $this->Form->textarea('notes',
                                [
                                    'id'    => 'f--plan',
                                    'class' => 'form-control md-textarea',
                                    'rows'  => '8',
                                ]
                            ) ?>
                            <label for="f--plan">紹介詳細</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <?= $this->Form->button('編集する',
                            [
                                'type'  => 'submit',
                                'class' => 'btn btn-success btn-block'
                            ])
                        ?>
                    </div>
                </div>
            </div><!-- /.card-body -->
        </div><!-- /.card -->
    </div><!-- /.col-lg-8 -->
</div><!-- /. row -->
<?= $this->Form->end() ?>
