<div class="card card-cascade narrower">

    <div class="col-lg-12">
        <div class="view gradient-card-header blue-gradient">
            <h2 class="h2-responsive mb-0">
                <i class="fa fa-plus"></i> ダンスチーム登録
            </h2>
            <p class="mb-0">
                <small class="none">
                    チーム情報を詳細に入力しましょう。オファーの可能性が高まります。
                </small>
            </p>
        </div>
    </div>

    <?= $this->Form->create() ?>
    <div class="card-body">

        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="md-form">
                    <?= $this->Form->control('name', ['id' => 'f--name', 'class' => 'form-control'])?>
                    <label for="f--name">チーム名</label>
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
            <div class="col-lg-12">
                <div class="md-form">
                    <?= $this->Form->control('intro', ['id' => 'f--intro', 'class' => 'form-control'])?>
                    <label for="f--intro">チーム自己紹介</label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="md-form">
                    <div class="file-field">
                        <div class="btn btn-primary btn-sm float-left">
                            <span>ファイル選択</span>
                            <?= $this->Form->control('image', ['type' => 'file']) ?>
                        </div>
                        <div class="file-path-wrapper">
                            <?= $this->Form->control('image',
                                [
                                    'id'          => 'f--image',
                                    'class'       => 'file-path validate',
                                    'placeholder' => 'チームイメージ'
                                ]
                            ) ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="md-form">
                    <?= $this->Form->control('youtube', ['id' => 'f--youtube', 'class' => 'form-control']) ?>
                    <label for="f--youtube">YoutubeURL</label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="md-form">
                    <?= $this->Form->control('url', ['id' => 'f--url', 'class' => 'form-control']) ?>
                    <label for="f--url">ホームページ</label>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="md-form">
                    <?= $this->Form->control('genre',
                        [
                            'id'      => 'f--genre',
                            'type'    => 'select',
                            'class'   => 'mdb-select colorful-select dropdown-primary',
                            'options' => $genres
                        ]
                    ) ?>
                    <label for="f--genre">ジャンル</label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="md-form">
                    <?= $this->Form->control('style', ['id' => 'f--style', 'class' => 'form-control']) ?>
                    <label for="f--style">チームスタイル</label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="md-form">
                    <?= $this->Form->textarea('history',
                        [
                            'id'    => 'f--history',
                            'class' => 'form-control md-textarea',
                            'rows'  => '6',
                        ]
                    ) ?>
                    <label for="f--intro">チーム経歴</label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="md-form">
                    <?= $this->Form->textarea('plan',
                        [
                            'id'    => 'f--plan',
                            'class' => 'form-control md-textarea',
                            'rows'  => '6',
                        ]
                    ) ?>
                    <label for="f--intro">今後の目標・活動予定など</label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="md-form">
                    <?= $this->Form->control('offer_flag',
                        [
                            'id'      => 'f--o_flag',
                            'type'    => 'select',
                            'class'   => 'mdb-select colorful-select dropdown-primary',
                            'options' => ['受ける', '受けない']
                        ]
                    ) ?>
                    <label for="f--o_flag">チームオファー</label>
                </div>
            </div>
        </div>

        <div class="row mt-3 mb-3">
            <div class="col-lg-12">
                <?= $this->Form->button('登録', ['class' => 'btn btn-success btn-block']) ?>
            </div>
        </div>
    </div><!-- /.card-body -->
    <?= $this->Form->end() ?>
</div><!-- /.card -->
