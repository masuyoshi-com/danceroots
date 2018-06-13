<?php $this->assign('title', 'ダンスサークル登録'); ?>

<div class="card card-cascade narrower mb-3">

    <div class="col-lg-12">
        <div class="view gradient-card-header aqua-gradient">
            <h2 class="h2-responsive mb-0">
                <i class="fa fa-user-plus"></i> ダンスサークル登録
            </h2>
            <p class="mb-0 none">
                <small>
                    <i class="fa fa-info-circle"></i>  サークル情報を詳細に入力しましょう。多くの情報はよりダンサーが集まる可能性が高まります。
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

        <?= $this->Form->create($circle, ['type' => 'file']) ?>
        <?= $this->Form->hidden('user_id', ['value' => h($user_id)]) ?>

        <div class="row">
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
            <div class="col-lg-6 col-md-12">
                <label class="dark-gray-text w-100 text-left"><small>市区町村</small></label>
                <div class="md-form mt-0">
                    <?= $this->Form->control('city', ['class' => 'form-control']) ?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 col-md-6 col-xs-12">
                <div class="md-form">
                    <?= $this->Form->control('station',
                        [
                            'id'    => 'f--station',
                            'class' => 'form-control'
                        ]
                    ) ?>
                    <label for="f--station">最寄り駅</label>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="md-form">
                    <?= $this->Form->control('place', ['id' => 'f--place', 'class' => 'form-control'])?>
                    <label for="f--place">主な集合場所</label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <label class="dark-gray-text w-100 text-left"><small>タイトル</small></label>
                <div class="md-form mt-0">
                    <?= $this->Form->control('title', ['class' => 'form-control'])?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 col-md-12">
                <label class="dark-gray-text w-100 text-left"><small>サークル名</small></label>
                <div class="md-form mt-0">
                    <?= $this->Form->control('name', ['class' => 'form-control'])?>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="form-group">
                    <label class="dark-gray-text w-100 text-left mt-2"><small>サークルイメージ</small> </label>
                    <?= $this->Form->control('image_file', ['type' => 'file', 'class' => 'form-control']) ?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <label class="dark-gray-text w-100 text-left">
                    <small>サークルの簡単説明</small> <span class="badge badge-info">検索一覧で表示されます</span>
                </label>
                <div class="md-form mt-0">
                    <?= $this->Form->control('intro', ['class' => 'form-control'])?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="md-form">
                    <?= $this->Form->textarea('circle_detail',
                        [
                            'id'    => 'f--c_detail',
                            'class' => 'form-control md-textarea',
                            'rows'  => '8',
                        ]
                    ) ?>
                    <label for="f--c_detail">サークル詳細説明</label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4 col-md-6 col-md-12">
                <div class="md-form">
                    <?= $this->Form->control('genre',
                        [
                            'id'      => 'f--genre',
                            'type'    => 'select',
                            'class'   => 'mdb-select colorful-select dropdown-primary',
                            'options' => $genres,
                            'empty'   => 'ジャンルは問わない'
                        ]
                    ) ?>
                    <label for="f--genre">ジャンル</label>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-xs-12">
                <div class="md-form">
                    <?= $this->Form->control('age',
                        [
                            'id'      => 'f--age',
                            'type'    => 'select',
                            'class'   => 'mdb-select colorful-select dropdown-primary',
                            'options' => $ages
                        ]
                    ) ?>
                    <label for="f--age">平均年齢</label>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="md-form">
                    <?= $this->Form->control('distinction',
                        [
                            'id'      => 'f--distinction',
                            'type'    => 'select',
                            'class'   => 'mdb-select colorful-select dropdown-primary',
                            'options' => $distinctions
                        ]
                    ) ?>
                    <label for="f--distinction">紹介・募集</label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <label class="dark-gray-text w-100 text-left mt-2"><small>参加条件</small> </label>
                <div class="md-form mt-0">
                    <?= $this->Form->control('conditions', ['class' => 'form-control']) ?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="md-form">
                    <?= $this->Form->textarea('purpose',
                        [
                            'id'    => 'f--purpose',
                            'class' => 'form-control md-textarea',
                            'rows'  => '8',
                        ]
                    ) ?>
                    <label for="f--purpose">目的</label>
                </div>
            </div>
        </div>

        <div class="row mt-3 mb-3">
            <div class="col-lg-12">
                <?= $this->Form->button('<i class="fa fa-plus"></i> 登録', ['class' => 'btn btn-success btn-block', 'escape' => false]) ?>
            </div>
        </div>
        <?= $this->Form->end() ?>
    </div><!-- ./card-body -->
</div><!-- /.card -->
