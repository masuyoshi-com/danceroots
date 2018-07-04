<?php $this->assign('title', 'ダンス動画登録'); ?>

<div class="row">

    <div class="col-lg-2">
    </div>

    <div class="col-lg-8">
        <div class="jumbotron text-center pt-4 pb-4">
            <h2 class="h2-responsive"><i class="fa fa-youtube-play yt-ic"></i> お気に入りダンス動画</h2>
            <hr class="my-2">
            <p class="lead grey-text">
                <small><i class="fa fa-info-circle" aria-hidden="true"></i> 共有するダンス動画 (YouTubeURL) を入力してください。</small>
            </p>
            <hr class="my-2">
        </div>

        <div class="row">
            <div class="col-lg-12">
                <?= $this->Flash->render() ?>
            </div>
        </div>

        <?= $this->Form->create($danceVideo) ?>
        <?= $this->Form->hidden('user_id', ['value' => h($user_id)]) ?>

        <div class="card card-body mb-3">
            <div class="row">
                <div class="col-lg-12">
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
                <div class="col-lg-12">
                    <div class="md-form">
                        <?= $this->Form->control('tag',
                            [
                                'id'          => 'f--tag',
                                'class'       => 'form-control',
                                'placeholder' => '複数ワード可(半角カンマ区切り)'
                            ]
                        ) ?>
                        <label for="f--tag">タグ</label>
                    </div>
                </div>
                <div class="col-lg-12">
                    <label class="dark-gray-text w-100 text-left"><small>タイトル</small></label>
                    <div class="md-form mt-0">
                        <?= $this->Form->control('title', ['id' => 'f--title', 'class' => 'form-control']) ?>
                    </div>
                </div>
                <div class="col-lg-12">
                    <label class="dark-gray-text w-100 text-left"><small>Youtube</small> <span class="badge badge-info">動画URLをコピペ</span></label>
                    <div class="md-form mt-0">
                        <?= $this->Form->control('youtube', ['class' => 'form-control']) ?>
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-lg-12">
                    <?= $this->Form->button('<i class="fa fa-plus"></i> 登録',
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
