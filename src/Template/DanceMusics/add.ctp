<div class="row">

    <div class="col-lg-12">
        <div class="jumbotron">
            <h1 class="h1-responsive"><i class="fa fa-music pink-text"></i> Favorite Dance Musics - Add</h1>
            <hr class="my-2">
            <p class="lead grey-text">
                <small>Youtube埋め込みに関する説明はこちら</small>
            </p>
            <hr class="my-2">
        </div>
    </div>

    <div class="col-lg-12">
        <div class="card card-body">
            <div class="row">
                <div class="col-lg-6 col-xs-12">
                    <div class="md-form">
                        <?= $this->Form->control('genre',
                            [
                                'id'      => 'f--genre',
                                'type'    => 'select',
                                'class'   => 'mdb-select colorful-select dropdown-primary',
                                'options' => $genres,
                                'empty'   => '選択してください'
                            ]
                        ) ?>
                        <label for="f--genre">ジャンル</label>
                    </div>
                </div>
                <div class="col-lg-6 col-xs-12">
                    <div class="md-form">
                        <?= $this->Form->control('tag',
                            [
                                'id'          => 'f--tag',
                                'class'       => 'form-control',
                                'placeholder' => 'アーティスト名 など'
                            ]
                        ) ?>
                        <label for="f--tag">タグ</label>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="md-form">
                        <?= $this->Form->control('title', ['id' => 'f--title', 'class' => 'form-control']) ?>
                        <label for="f--title">タイトル</label>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="md-form">
                        <?= $this->Form->control('youtube', ['id' => 'f--youtube', 'class' => 'form-control']) ?>
                        <label for="f--youtube">YoutubeURL</label>
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-lg-12">
                    <?= $this->Form->button('<i class="fa fa-plus"></i> 登録',
                        ['class' => 'btn btn-success btn-block', 'escape' => false]
                    ) ?>
                </div>
                <p>登録後、エディットで登録済み動画一覧表示</p>
            </div>
        </div>
    </div>
</div>
