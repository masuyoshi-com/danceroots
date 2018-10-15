<?php $this->assign('title', '有名チームプロフィール登録')  ?>

<div class="row">
    <div class="col-lg-12">
        <?= $this->Flash->render() ?>
    </div>
</div>

<?= $this->Form->create($famousTeam, ['type' => 'file']) ?>
<?= $this->Form->hidden('user_id', ['value' => $user_id]) ?>
<div class="row">
    <div class="col-lg-6 col-md-12 mb-3">
        <div class="card card-body">

            <div class="row">
                <div class="col-lg-12">
                    <div class="md-form">
                        <?= $this->Form->control('name', ['id' => 'f--name', 'class' => 'form-control']) ?>
                        <label for="f--name">チーム名</label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label class="dark-gray-text w-100 text-left">
                            <small>イメージ</small>
                        </label>
                        <?= $this->Form->control('image_file', ['type' => 'file', 'class' => 'form-control']) ?>
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
                        <?= $this->Form->control('period', ['id' => 'f--period', 'class' => 'form-control']) ?>
                        <label for="f--period">活動期間</label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="md-form">
                        <?= $this->Form->textarea('profile',
                            [
                                'id'          => 'f--profile',
                                'class'       => 'form-control md-textarea',
                                'rows'        => '10',
                                'placeholder' => 'コンテストやクラブゲスト歴など'
                            ]
                        ) ?>
                        <label for="f--profile">経歴</label>
                    </div>
                </div>
            </div>

        </div><!-- /.card -->
    </div><!-- /.col-lg-6 -->

    <div class="col-lg-6 col-md-12">
        <div class="card card-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="md-form">
                        <?= $this->Form->control('youtube1', ['id' => 'f--youtube1', 'class' => 'form-control']) ?>
                        <label for="f--youtube1">YouTube1</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="md-form">
                        <?= $this->Form->control('youtube2', ['id' => 'f--youtube2', 'class' => 'form-control']) ?>
                        <label for="f--youtube2">youtube2</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="md-form">
                        <?= $this->Form->control('youtube3', ['id' => 'f--youtube3', 'class' => 'form-control']) ?>
                        <label for="f--youtube3">youtube3</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="md-form">
                        <?= $this->Form->textarea('style',
                            [
                                'id'          => 'f--style',
                                'class'       => 'form-control md-textarea',
                                'rows'        => '10',
                                'placeholder' => 'チームスタイル'
                            ]
                        ) ?>
                        <label for="f--style">スタイル</label>
                    </div>
                </div>
            </div>
        </div><!-- /.card -->
    </div><!-- /.col-lg=6 -->


    <div class="col-lg-12">
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary btn-block']) ?>
    </div>
</div>
<?= $this->Form->end() ?>
