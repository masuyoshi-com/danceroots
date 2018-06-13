<?php $this->assign('title', 'イベント登録'); ?>

<div class="card card-cascade narrower mb-3">
    <div class="col-lg-12">
        <div class="view gradient-card-header purple-gradient">
            <h2 class="h2-responsive mb-0">
                <i class="fa fa-calendar-plus-o"></i> イベント
            </h2>
            <p class="mb-0">
                <small class="none">
                    <i class="fa fa-info-circle"></i> イベントに関する情報を詳しく入力しましょう。告知の質が高くなります。
                </small>
            </p>
        </div>
    </div>

    <div class="card-body">

        <div class="row">
            <div class="col-lg-12">
                <?= $this->Flash->render() ?>
            </div>
        </div>

        <?= $this->Form->create($event, ['type' => 'file']) ?>
        <?= $this->Form->hidden('user_id', ['value' => $user_id]) ?>

        <div class="row">
            <div class="col-lg-6 col-md-12">
                <label class="dark-gray-text w-100 text-left"><small>イベント名</small></label>
                <div class="md-form mt-0">
                    <?= $this->Form->control('event_name', ['class' => 'form-control'])?>
                </div>
            </div>

            <div class="col-lg-6 col-md-12">
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
            <div class="col-lg-6 col-md-12">
                <div class="form-group">
                    <label class="dark-gray-text w-100 text-left"><small>イベントイメージ</small></label>
                    <?= $this->Form->control('image_file', ['type' => 'file', 'class' => 'form-control']) ?>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="md-form">
                    <?= $this->Form->control('category',
                        [
                            'id'      => 'f--category',
                            'type'    => 'select',
                            'class'   => 'mdb-select colorful-select dropdown-primary',
                            'options' => $categories
                        ]
                    ) ?>
                    <label for="f--category">カテゴリ</label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 col-md-12">
                <label class="dark-gray-text w-100 text-left"><small>イベント簡易紹介</small> <span class="badge badge-info">検索一覧で表示されます</span></label>
                <div class="md-form mt-0">
                    <?= $this->Form->control('intro', ['class' => 'form-control'])?>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <label class="dark-gray-text w-100 text-left"><small>Youtube</small> <span class="badge badge-info">過去イベント動画URL</span></label>
                <div class="md-form mt-0">
                    <?= $this->Form->control('youtube', ['class' => 'form-control']) ?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4 col-md-6 col-xs-12">
                <label class="dark-gray-text w-100 text-left"><small>開催日</small></label>
                <div class="md-form mt-0">
                    <?= $this->Form->control('event_date',
                        [
                            'type'  => 'text',
                            'class' => 'form-control datepicker'
                        ]
                    ) ?>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-xs-12">
                <div class="md-form">
                    <?= $this->Form->control('start',
                        [
                            'id'          => 'f--start',
                            'class'       => 'form-control timepicker time',
                            'placeholder' => '開始時刻',
                            'required'
                        ]
                    ) ?>
                    <label for="f--start">Start</label>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="md-form">
                    <?= $this->Form->control('end',
                        [
                            'id'          => 'f--end',
                            'class'       => 'form-control timepicker time',
                            'placeholder' => '終了時刻',
                            'required'
                        ]
                    ) ?>
                    <label for="f--end">End</label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 col-md-12">
                <label class="dark-gray-text w-100 text-left"><small>開催場所</small></label>
                <div class="md-form mt-0">
                    <?= $this->Form->control('address', ['class' => 'form-control']) ?>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <label class="dark-gray-text w-100 text-left"><small>会場名</small></label>
                <div class="md-form mt-0">
                    <?= $this->Form->control('place', ['class' => 'form-control']) ?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="md-form">
                    <?= $this->Form->control('entry',
                        [
                            'id'    => 'f--entry',
                            'class' => 'form-control'
                        ]
                    ) ?>
                    <label for="f--entry">参加資格</label>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="md-form">
                    <?= $this->Form->control('entry_fee',
                        [
                            'id'    => 'f--e_fee',
                            'class' => 'form-control'
                        ]
                    ) ?>
                    <label for="f--e_fee">参加費</label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="md-form">
                    <?= $this->Form->textarea('guest',
                        [
                            'id'    => 'f--guest',
                            'class' => 'form-control md-textarea',
                            'rows'  => '8',
                        ]
                    ) ?>
                    <label for="f--guest">ゲスト</label>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="md-form">
                    <?= $this->Form->textarea('event_detail',
                        [
                            'id'    => 'f--e_detail',
                            'class' => 'form-control md-textarea',
                            'rows'  => '8',
                        ]
                    ) ?>
                    <label for="f--e_detail">イベント詳細説明</label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="md-form">
                    <?= $this->Form->control('recruit_flag',
                        [
                            'id'      => 'f--r_flg',
                            'type'    => 'select',
                            'class'   => 'mdb-select colorful-select dropdown-primary',
                            'options' => ['告知のみ', '参加者募集']
                        ]
                    ) ?>
                    <label for="f--r_flg">告知・募集</label>
                </div>
            </div>
        </div>

        <div class="row mt-3 mb-3">
            <div class="col-lg-12">
                <?= $this->Form->button('<i class="fa fa-plus"></i> 登録', ['class' => 'btn btn-success btn-block', 'escape' => false]) ?>
            </div>
        </div>
        <?= $this->Form->end() ?>
    </div><!-- /.card-body -->
</div><!-- /.card -->
