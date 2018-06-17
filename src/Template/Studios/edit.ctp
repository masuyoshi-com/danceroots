<?php $this->assign('title', 'ダンススタジオ編集') ?>

<div class="row">
    <div class="col-lg-12">
        <?= $this->Flash->render() ?>
    </div>
</div>

<?= $this->Form->create($studio, ['type' => 'file']) ?>
<?= $this->Form->hidden('user_id', ['value' => h($studio->user_id)]) ?>
<div class="row">

    <div class="col-lg-4 col-md-12 mt-5">
        <section class="card card-cascade card-avatar mb-3 mt-5">

            <?php
                if ($studio->icon) {
                    print $this->Html->image($studio->icon);
                } else {
                    print $this->Html->image('/img/sample/noimage.png');
                }
            ?>

            <div class="card-body">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="dark-gray-text w-100 text-left"><small>アイコン画像</small></label>
                            <?= $this->Form->control('icon_file', ['type' => 'file', 'class' => 'form-control']) ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <label class="dark-gray-text w-100 text-left"><small>スタジオ名</small></label>
                        <div class="md-form mt-0">
                            <?= $this->Form->control('studio_name', ['class' => 'form-control']) ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <label class="dark-gray-text w-100 text-left"><small>代表者名</small></label>
                        <div class="md-form mt-0">
                            <?= $this->Form->control('name', ['class' => 'form-control']) ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="md-form">
                            <?= $this->Form->control('establishment',
                                [
                                    'id'    => 'f--est',
                                    'class' => 'form-control'
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

            </div><!-- /.card-body -->
        </section>
    </div><!-- /.col-lg-4 -->


    <div class="col-lg-8 col-md-12 mb-3">
        <div class="card card-cascade narrower">

            <div class="view gradient-card-header mdb-color lighten-2">
                <h5 class="mb-0 font-bold"><i class="fa fa-pencil" aria-hidden="true"></i> プロフィール編集</h5>
                <small><i class="fa fa-info-circle"></i> 閲覧者の印象に残るように詳細に項目を入力しましょう。問い合わせの可能性が高くなります。</small>
            </div>

            <div class="card-body">

                <div class="row">
                    <div class="col-lg-6 col-md-6 col-xs-12">
                        <div class="md-form">
                            <?= $this->Form->control('pref',
                                [
                                    'id'      => 'f--pref',
                                    'type'    => 'select',
                                    'class'   => 'mdb-select colorful-select dropdown-primary',
                                    'options' => $prefs,
                                    'empty'   => '選択してください'
                                ]
                            ) ?>
                            <label for="f--pref">都道府県</label>
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
                        <label class="dark-gray-text w-100 text-left"><small>以下住所</small></label>
                        <div class="md-form mt-0">
                            <?= $this->Form->control('address', ['class' => 'form-control']) ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <label class="dark-gray-text w-100 text-left"><small>自己紹介</small></label>
                        <div class="md-form mt-0">
                            <?= $this->Form->control('self_intro', ['class' => 'form-control']) ?>
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
                    <div class="col-lg-12">
                        <div class="md-form">
                            <?= $this->Form->textarea('introduction',
                                [
                                    'id'    => 'f--intro',
                                    'class' => 'form-control md-textarea',
                                    'rows'  => '8',
                                ]
                            ) ?>
                            <label for="f--intro">スタジオ紹介</label>
                        </div>
                    </div>
                </div>

            </div><!-- /.card-body -->
        </div><!-- /.card -->
    </div><!-- /.col-lg-8 -->
</div><!-- /. row -->

<div class="card card-body mb-3">
    <p><i class="fa fa-youtube-play yt-ic"></i> Youtube</p>
    <div class="row">
        <div class="col-lg-6 col-md-12 mb-3">
            <?php if ($videos) : ?>
                <div class="embed-responsive embed-responsive-16by9 z-depth-1">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= h($videos) ?>?rel=0" style="height: 100%" allowfullscreen></iframe>
                </div>
            <?php else : ?>
                <?= $this->Html->image('/img/sample/no_video.jpg', ['class' => 'img-fluid']) ?>
            <?php endif; ?>
        </div>
    </div><!-- /.row -->

    <div class="row">
        <div class="col-lg-6 col-xs-12">
            <label class="dark-gray-text w-100 text-left"><small>Youtube</small></label>
            <div class="md-form mt-0">
                <?= $this->Form->control('youtube', ['class' => 'form-control']) ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 mt-4">
            <p><i class="fa fa-image"></i> Image <span class="badge badge-info">変更する場合のみ選択</span></p>
        </div>

        <div id="mdb-lightbox-ui"></div>

        <div class="mdb-lightbox">
            <?php if ($studio->image1) : ?>
                <figure class="col-lg-4 col-md-12">
                    <?= $this->Html->link($this->Html->image($studio->image1, ['class' => 'img-fluid']),
                        $studio->image1,
                        ['data-size' => '1600x1067', 'escape' => false]
                    ) ?>
                </figure>
            <?php endif; ?>

            <?php if ($studio->image2) : ?>
                <figure class="col-lg-4 col-md-12">
                    <?= $this->Html->link($this->Html->image($studio->image2, ['class' => 'img-fluid']),
                        $studio->image2,
                        ['data-size' => '1600x1067', 'escape' => false]
                    ) ?>
                </figure>
            <?php endif; ?>

            <?php if ($studio->image3) : ?>
                <figure class="col-lg-4 col-md-12">
                    <?= $this->Html->link($this->Html->image($studio->image3, ['class' => 'img-fluid']),
                        $studio->image3,
                        ['data-size' => '1600x1067', 'escape' => false]
                    ) ?>
                </figure>
            <?php endif; ?>
        </div><!-- /.mdb-lightbox -->
    </div><!-- /.row -->

    <div class="row">
        <div class="col-lg-4 col-md-12">
            <div class="form-group">
                <label class="dark-gray-text w-100 text-left mt-2"><small>スタジオ画像①</small></label>
                <?= $this->Form->control('image1_file', ['type' => 'file', 'class' => 'form-control']) ?>
            </div>
        </div>
        <div class="col-lg-4 col-md-12">
            <div class="form-group">
                <label class="dark-gray-text w-100 text-left mt-2"><small>スタジオ画像②</small></label>
                <?= $this->Form->control('image2_file', ['type' => 'file', 'class' => 'form-control']) ?>
            </div>
        </div>
        <div class="col-lg-4 col-md-12">
            <div class="form-group">
                <label class="dark-gray-text w-100 text-left mt-2"><small>スタジオ画像③</small></label>
                <?= $this->Form->control('image3_file', ['type' => 'file', 'class' => 'form-control']) ?>
            </div>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-lg-12">
            <?= $this->Form->button('編集する', ['type'   => 'submit', 'class'  => 'btn btn-success btn-block']) ?>
        </div>
    </div>
</div><!-- /.card -->

<?= $this->Form->end() ?>
