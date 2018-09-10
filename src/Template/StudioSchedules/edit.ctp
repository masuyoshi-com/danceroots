<?php $this->assign('title', 'スタジオレッスンスケジュール編集'); ?>

<div class="row">

    <div class="col-lg-2">
    </div>

    <div class="col-lg-8">
        <div class="jumbotron text-center pt-4 pb-4">
            <h2 class="h2-responsive">
                <i class="fa fa-calendar"></i> レッスンスケジュール <i class="fa fa-pencil pink-text"></i>
            </h2>
            <hr class="my-2">
            <p class="lead grey-text">
                <small><i class="fa fa-info-circle" aria-hidden="true"></i> 同じ時間帯のスケジュールは登録できません。</small>
            </p>
            <hr class="my-2">
        </div>

        <div class="row">
            <div class="col-lg-12">
                <?= $this->Flash->render() ?>
            </div>
        </div>

        <?= $this->Form->create($studioSchedule, ['type' => 'file']) ?>

        <div class="card card-body mb-3">

            <div class="row">
                <div class="col-lg-6 col-md-12 col-xs-12">
                    <label class="dark-gray-text w-100 text-left"><small>インストラクター名 <span class="red-text">※</span></small></label>
                    <div class="md-form mt-0">
                        <?= $this->Form->control('name', ['class' => 'form-control']) ?>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-xs-12">
                    <label class="dark-gray-text w-100 text-left"><small>チーム名</small></label>
                    <div class="md-form mt-0">
                        <?= $this->Form->control('team', ['class' => 'form-control']) ?>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="md-form">
                        <?= $this->Form->control('genre',
                            [
                                'id'      => 'f--genre',
                                'type'    => 'select',
                                'class'   => 'mdb-select colorful-select dropdown-primary',
                                'options' => $genres
                            ]
                        ) ?>
                        <label for="f--genre">ジャンル <span class="red-text">※</span></label>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="md-form">
                        <?= $this->Form->control('difficulty',
                            [
                                'id'      => 'f--difficulty',
                                'type'    => 'select',
                                'class'   => 'mdb-select colorful-select dropdown-primary',
                                'options' => $difficulties
                            ]
                        ) ?>
                        <label for="f--difficulty">レッスン難易度 <span class="red-text">※</span></label>
                    </div>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label class="dark-gray-text w-100 text-left"><small>インストラクターイメージ</small> <span class="badge badge-primary">正方形サイズ</span></label>
                        <?= $this->Form->control('image_file', ['type' => 'file', 'class' => 'form-control']) ?>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="md-form">
                        <?= $this->Form->control('week',
                            [
                                'id'      => 'f--week',
                                'type'    => 'select',
                                'class'   => 'mdb-select colorful-select dropdown-primary',
                                'options' => $weeks,
                            ]
                        ) ?>
                        <label for="f--week">曜日選択 <span class="red-text">※</span></label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="md-form">
                        <?= $this->Form->control('start',
                            [
                                'id'      => 'f--start',
                                'type'    => 'select',
                                'class'   => 'mdb-select colorful-select dropdown-primary',
                                'options' => $times
                            ]
                        ) ?>
                        <label for="f--start">開始時間 <span class="red-text">※</span></label>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="md-form">
                        <?= $this->Form->control('time',
                            [
                                'id'      => 'f--time',
                                'type'    => 'select',
                                'class'   => 'mdb-select colorful-select dropdown-primary',
                                'options' => ['1 hour' => '1時間', '1 hour 30 minute' => '1時間30分'],
                            ]
                        ) ?>
                        <label for="f--time">レッスン時間帯 <span class="red-text">※</span></label>
                    </div>
                </div>
            </div>

            <div class="row mt-2 mb-3">
                <div class="col-lg-12">
                    <label class="dark-gray-text w-100 text-left"><small>Youtube</small> <span class="badge badge-primary">動画URLをコピペ</span></label>
                    <div class="md-form mt-0">
                        <?= $this->Form->control('youtube', ['class' => 'form-control']) ?>
                    </div>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-lg-12">
                    <label class="dark-gray-text w-100 text-left"><small>Danceroots プロフィールURL</small></label>
                    <div class="md-form mt-0">
                        <?= $this->Form->control('profile', ['class' => 'form-control']) ?>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-lg-12">
                    <div class="md-form">
                        <?= $this->Form->textarea('comment',
                            [
                                'id'          => 'f--comment',
                                'class'       => 'form-control md-textarea',
                                'rows'        => '8',
                                'placeholder' => 'レッスンに関する情報や、インストラクター情報など'
                            ]
                        ) ?>
                        <label for="f--comment">コメント・情報</label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <?= $this->Form->button('<i class="fa fa-edit"></i> 編集',
                        ['class' => 'btn btn-success btn-block', 'escape' => false]
                    ) ?>
                </div>
            </div>

            <?= $this->Form->end() ?>
        </div><!-- /.card -->
    </div><!-- /.col-lg-8 -->

    <div class="col-lg-2">
    </div>
</div><!-- /.row -->
