
<?php $this->assign('title', 'ダンス関連求人登録'); ?>

<div class="card card-cascade narrower">

    <div class="col-lg-12">
        <div class="view gradient-card-header blue-gradient">
            <h2 class="h2-responsive mb-0">
                <i class="fa fa-briefcase"></i> ダンス関連求人登録
            </h2>
            <p class="mb-0 none">
                <small>
                    <i class="fa fa-info-circle"></i> 求人に関する情報を詳細に入力することで質の高い求人が見込めます。
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

        <?= $this->Form->create($job, ['type' => 'file']) ?>
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
            <div class="col-lg-12">
                <label class="dark-gray-text w-100 text-left"><small>タイトル</small></label>
                <div class="md-form mt-0">
                    <?= $this->Form->control('title', ['class' => 'form-control'])?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <label class="dark-gray-text w-100 text-left">
                    <small>募集内容の簡単説明</small> <span class="badge badge-info">検索一覧で表示されます</span>
                </label>
                <div class="md-form mt-0">
                    <?= $this->Form->control('intro', ['class' => 'form-control'])?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="form-group">
                    <label class="dark-gray-text w-100 text-left mt-2">
                        <small>求人イメージ</small> &nbsp;
                        <span class="badge badge-info">スタジオ内など</span>
                    </label>
                    <?= $this->Form->control('image_file', ['type' => 'file', 'class' => 'form-control']) ?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="md-form">
                    <?= $this->Form->textarea('work_detail',
                        [
                            'id'    => 'f--w_detail',
                            'class' => 'form-control md-textarea',
                            'rows'  => '8',
                        ]
                    ) ?>
                    <label for="f--w_detail">仕事依頼詳細</label>
                </div>
            </div>
        </div>

        <div class="row">
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
                    <label for="f--category">募集カテゴリ</label>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
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
        </div>

        <div class="row">
            <div class="col-lg-6 col-md-6 col-xs-12">
                <label class="dark-gray-text w-100 text-left"><small>最寄り駅</small></label>
                <div class="md-form mt-0">
                    <?= $this->Form->control('station', ['class' => 'form-control']) ?>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-xs-12">
                <label class="dark-gray-text w-100 text-left"><small>週稼働時間</small></label>
                <div class="md-form mt-0">
                    <?= $this->Form->control('working_time', ['class' => 'form-control']) ?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 col-md-6 col-xs-12">
                <div class="md-form">
                    <?= $this->Form->control('people', ['id' => 'f--people', 'class' => 'form-control']) ?>
                    <label for="f--people">募集人数</label>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-xs-12">
                <label class="dark-gray-text w-100 text-left"><small>報酬形式</small></label>
                <div class="md-form mt-0">
                    <?= $this->Form->control('compensation', ['class' => 'form-control']) ?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <label class="dark-gray-text w-100 text-left"><small>応募資格</small></label>
                <div class="md-form mt-0">
                    <?= $this->Form->control('q_required', ['class' => 'form-control']) ?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="md-form">
                    <?= $this->Form->textarea('question',
                        [
                            'id'    => 'f--question',
                            'class' => 'form-control md-textarea',
                            'rows'  => '8',
                        ]
                    ) ?>
                    <label for="f--question">応募者への質問</label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="md-form">
                    <?= $this->Form->textarea('etc',
                        [
                            'id'    => 'f--etc',
                            'class' => 'form-control md-textarea',
                            'rows'  => '8',
                        ]
                    ) ?>
                    <label for="f--etc">その他</label>
                </div>
            </div>
        </div>

        <div class="row mt-3 mb-3">
            <div class="col-lg-12">
                <?= $this->Form->button('<i class="fa fa-plus" aria-hidden="true"></i> 登録',
                        ['class' => 'btn btn-success btn-block', 'escape' => false]
                ) ?>
            </div>
        </div>

        <?= $this->Form->end() ?>
    </div><!-- /.card-body -->
</div><!-- /.card -->
