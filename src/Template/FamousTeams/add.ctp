<?php $this->assign('title', '有名チームプロフィール登録')  ?>

<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="d-flex">
            <div>
                <h5 class="h5-responsive font-weight-bold dark-grey-text">
                    <i class="fa fa-id-card mr-2"></i><span class="none">Famous</span> Team Profile
                </h5>
            </div>
            <div class="ml-auto">
                <p class="m-0 grey-text"><small>有名チームプロフィール作成</small></p>
            </div>
        </div>
        <hr class="mt-0">
    </div><!-- /.col-lg-12 -->
</div><!-- /.row -->

<div class="row">
    <div class="col-lg-12">
        <?= $this->Flash->render() ?>
    </div>
</div>

<?= $this->Form->create($famousTeam, ['type' => 'file']) ?>
<?= $this->Form->hidden('user_id', ['value' => $logins['id']]) ?>
<div class="row mb-3">
    <div class="col-lg-6 col-md-12 mb-3">
        <div class="card card-body">

            <div class="row">
                <div class="col-lg-12">
                    <label class="dark-grey-text w-100 text-left"><small>チーム名 <span class="red-text">※</span></small></label>
                    <div class="md-form mt-0">
                        <?= $this->Form->control('name', ['class' => 'form-control']) ?>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label class="dark-grey-text w-100 text-left">
                            <small>アイコン画像</small>
                            <span class="badge badge-info">正方形サイズ</span>
                            <span class="badge badge-primary">対応拡張子 - jpg png gif</span>
                        </label>
                        <?= $this->Form->control('icon_file', ['type' => 'file', 'class' => 'form-control']) ?>
                    </div>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label class="dark-grey-text w-100 text-left">
                            <small>チームイメージ</small>
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

            <div class="row mt-2">
                <div class="col-lg-12">
                    <label class="dark-grey-text w-100 text-left"><small>活動期間 <span class="red-text">※</span></small></label>
                    <div class="md-form mt-0">
                        <?= $this->Form->control('period', ['class' => 'form-control']) ?>
                    </div>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-lg-12">
                    <div class="md-form">
                        <?= $this->Form->textarea('profile',
                            [
                                'id'          => 'f--profile',
                                'class'       => 'form-control md-textarea',
                                'rows'        => '10',
                                'placeholder' => 'コンテスト実績 / ゲスト歴など'
                            ]
                        ) ?>
                        <label for="f--profile">経歴 <span class="red-text">※</span></label>
                    </div>
                </div>
            </div>

        </div><!-- /.card -->
    </div><!-- /.col-lg-6 -->

    <div class="col-lg-6 col-md-12 mb-3">
        <div class="card card-body">
            <div class="row">
                <div class="col-lg-12">
                    <label class="dark-grey-text w-100 text-left"><small>YouTube①</small> <span class="badge badge-info">ダンス動画URLをコピペ</span></label>
                    <div class="md-form mt-0">
                        <?= $this->Form->control('youtube1', ['class' => 'form-control']) ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <label class="dark-grey-text w-100 text-left"><small>YouTube②</small></label>
                    <div class="md-form mt-0">
                        <?= $this->Form->control('youtube2', ['class' => 'form-control']) ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <label class="dark-grey-text w-100 text-left"><small>YouTube③</small></label>
                    <div class="md-form mt-0">
                        <?= $this->Form->control('youtube3', ['class' => 'form-control']) ?>
                    </div>
                </div>
            </div>

            <div class="row mt-2">
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
                        <label for="f--style">スタイル <span class="red-text">※</span></label>
                    </div>
                </div>
            </div>
        </div><!-- /.card -->
    </div><!-- /.col-lg=6 -->


    <div class="col-lg-12">
        <?= $this->Form->button(__('<i class="fa fa-plus mr-2" aria-hidden="true"></i>登録'), ['class' => 'btn btn-primary btn-block']) ?>
    </div>
</div><!-- /.row -->
<?= $this->Form->end() ?>
