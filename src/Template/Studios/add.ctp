<?php $this->assign('title', 'ダンススタジオプロフィール作成'); ?>

<div class="row">
    <div class="col-lg-12">
        <?= $this->Flash->render() ?>
    </div>
</div>

<?= $this->Form->create($studio, ['type' => 'file']) ?>
<?= $this->Form->hidden('user_id', ['value' => $logins['id']]) ?>
<div class="row mb-3">

    <div class="col-lg-4 col-md-12 mt-4">
        <section class="card card-cascade card-avatar mb-3 mt-5">

            <?= $this->Html->image('/img/sample/noimage.png') ?>

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
                        <label class="dark-gray-text w-100 text-left"><small>スタジオ名 <span class="red-text">※</span></small></label>
                        <div class="md-form mt-0">
                            <?= $this->Form->control('studio_name', ['class' => 'form-control']) ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <label class="dark-gray-text w-100 text-left"><small>代表者名 <span class="red-text">※</span></small></label>
                        <div class="md-form mt-0">
                            <?= $this->Form->control('name', ['class' => 'form-control']) ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <label class="dark-gray-text w-100 text-left"><small>主なジャンル <span class="red-text">※</span></small></label>
                        <div class="md-form mt-0">
                            <?= $this->Form->control('main_genre', ['class' => 'form-control']) ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="md-form">
                            <?= $this->Form->control('establishment',
                                [
                                    'type'        => 'text',
                                    'id'          => 'f--est',
                                    'class'       => 'form-control',
                                    'placeholder' => ' 例) 2000年05月12日'
                                ]
                            ) ?>
                            <label for="f--est">設立日</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="md-form">
                            <?= $this->Form->control('tel', ['id' => 'f--tel', 'class' => 'form-control']) ?>
                            <label for="f--tel">電話番号</label>
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


    <div class="col-lg-8 col-md-12">
        <div class="card card-cascade narrower">

            <div class="view gradient-card-header mdb-color lighten-2">
                <h5 class="mb-0 font-bold"><i class="fa fa-address-card" aria-hidden="true"></i> プロフィール作成</h5>
                <small><i class="fa fa-info-circle"></i> 閲覧者の印象に残るように詳細に項目を入力しましょう。問い合わせの可能性が高くなります。</small>
            </div>

            <div class="card-body">

                <div class="row">
                    <div class="col-lg-12">
                        <label class="dark-gray-text w-100 text-left"><small>見出し紹介文 <span class="red-text">※</span></small></label>
                        <div class="md-form mt-0">
                            <?= $this->Form->control('self_intro', ['class' => 'form-control']) ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-6 col-xs-12">
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
                    <div class="col-lg-6 col-md-6 col-xs-12 mt-2">
                        <label class="dark-gray-text w-100 text-left"><small>市区町村 <span class="red-text">※</span></small></label>
                        <div class="md-form mt-0">
                            <?= $this->Form->control('city', ['class' => 'form-control']) ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-6 col-xs-12 mt-2">
                        <label class="dark-gray-text w-100 text-left"><small>以下所在地 <span class="red-text">※</span></small></label>
                        <div class="md-form mt-0">
                            <?= $this->Form->control('address', ['class' => 'form-control']) ?>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-xs-12">
                        <div class="md-form">
                            <?= $this->Form->control('station', ['id' => 'f--station', 'class' => 'form-control']) ?>
                            <label for="f--station">最寄り駅</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="md-form">
                            <?= $this->Form->textarea('access',
                                [
                                    'id'    => 'f--access',
                                    'class' => 'form-control md-textarea',
                                    'rows'  => '6',
                                ]
                            ) ?>
                            <label for="f--access">アクセス</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-12 col-xs-12">
                        <div class="md-form">
                            <?= $this->Form->control('bussines_hours', ['id' => 'f--b_hours', 'class' => 'form-control']) ?>
                            <label for="f--b_hours">営業時間</label>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-xs-12">
                        <div class="md-form">
                            <?= $this->Form->control('entry_fee', ['id' => 'f--e_fee', 'class' => 'form-control']) ?>
                            <label for="f--e_fee">入会費</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="md-form">
                            <?= $this->Form->control('monthly_tax', ['id' => 'f--m_tax', 'class' => 'form-control']) ?>
                            <label for="f--m_tax">レッスン料 / 形態</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="md-form">
                            <?= $this->Form->textarea('campaign',
                                [
                                    'id'    => 'f--campaign',
                                    'class' => 'form-control md-textarea',
                                    'rows'  => '6',
                                ]
                            ) ?>
                            <label for="f--campaign">キャンペーン</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-6 col-xs-12">
                        <div class="md-form">
                            <?= $this->Form->control('ex_lesson',
                                [
                                    'id'      => 'f--e_lesson',
                                    'type'    => 'select',
                                    'class'   => 'mdb-select colorful-select dropdown-primary',
                                    'options' => ['あり', 'なし']
                                ]
                            ) ?>
                            <label for="f--e_lesson">体験レッスン</label>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-xs-12">
                        <div class="md-form">
                            <?= $this->Form->control('instructors', ['id' => 'f--instructors', 'class' => 'form-control']) ?>
                            <label for="f--instructors">所属インストラクター数</label>
                        </div>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-lg-12">
                        <label class="dark-gray-text w-100 text-left"><small>Youtube</small> <span class="badge badge-info">スタジオ動画URLのコピペ</span></label>
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
                            <label class="dark-gray-text w-100 text-left mt-2"><small>スタジオ画像①</small></label>
                            <?= $this->Form->control('image1_file', ['type' => 'file', 'class' => 'form-control']) ?>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <label class="dark-gray-text w-100 text-left mt-2"><small>スタジオ画像②</small></label>
                            <?= $this->Form->control('image2_file', ['type' => 'file', 'class' => 'form-control']) ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="dark-gray-text w-100 text-left mt-2"><small>スタジオ画像③</small></label>
                            <?= $this->Form->control('image3_file', ['type' => 'file', 'class' => 'form-control']) ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 mt-2">
                        <?= $this->Form->unlockField('genre') ?>
                        <label class="dark-gray-text w-100 text-left"><small>対応ジャンル</small></label>
                        <?php for ($i = 0; $i < count($genres); $i++) : ?>
                            <div class="form-check form-check-inline">
                                <?php
                                    $checked = '';
                                    for ($j = 0; $j < count($studio->genres); $j++) {
                                        if ($genres[$i] === $studio->genres[$j]) {
                                            $checked = 1;
                                        }
                                    }

                                    if ($checked === 1) {
                                        print $this->Form->checkbox('genre[]', [
                                                'id'          => 'materialInline' . $i,
                                                'class'       => 'form-check-input',
                                                'value'       => $genres[$i],
                                                'hiddenField' => false,
                                                'checked'
                                            ]);
                                    } else {
                                        print $this->Form->checkbox('genre[]', [
                                                'id'          => 'materialInline' . $i,
                                                'class'       => 'form-check-input',
                                                'value'       => $genres[$i],
                                                'hiddenField' => false,
                                            ]);
                                    }
                                ?>
                                <label class="form-check-label" for="materialInline<?= $i ?>"><?= $genres[$i] ?></label>
                            </div>
                        <?php endfor; ?>
                    </div>
                </div>
                <hr>

                <div class="row mb-3">
                    <div class="col-lg-12">
                        <div class="md-form">
                            <?= $this->Form->textarea('introduction',
                                [
                                    'id'    => 'f--intro',
                                    'class' => 'form-control md-textarea',
                                    'rows'  => '8',
                                ]
                            ) ?>
                            <label for="f--intro">スタジオ紹介 <span class="red-text">※</span></label>
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
</div><!-- /. row -->
<?= $this->Form->end() ?>
