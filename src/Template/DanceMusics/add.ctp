<?php $this->assign('title', 'ダンス音楽共有登録') ?>
<div class="row">
    <div class="col-lg-12">
        <div class="jumbotron text-center pt-5 pb-5">
            <h1 class="h1-responsive"><i class="fa fa-music pink-text"></i> Favorite Dance Music
                <small><i class="fa fa-plus pink-text"></i></small>
            </h1>
            <hr class="my-2">
            <p class="lead grey-text">
                <small>まずは音楽を検索しましょう。音楽を選択して登録してください。</small>
            </p>
            <hr class="my-2">
        </div>
    </div>
</div>
<?= $this->Form->create('', ['type' => 'get']) ?>
<div class="card p-3 mb-3">
    <div class="row">
        <div class="col-lg-12">
            <div class="form-inline md-form input-group mt-2 mb-2">
                <?= $this->Form->control('term', ['class' => 'form-control my-0', 'placeholder' => 'アーティスト名または曲名']) ?>
                <?= $this->Form->button('<i class="fa fa-search"></i>',
                    [
                        'class'  => 'btn btn-primary ml-2 waves-effect waves-light',
                        'escape' => false
                    ]
                ) ?>
            </div>
        </div>
    </div><!-- /.row -->
</div><!-- /.card -->
<?= $this->Form->end() ?>

<div class="row">
    <div class="col-lg-12">
        <?= $this->Flash->render() ?>
    </div>
</div>

<?php if (isset($songs) && count($songs) !== 0) : ?>
<?= $this->Form->create() ?>
<?= $this->Form->hidden('user_id', ['value' => $logins['id']]) ?>

<div class="row">
<?php for($i = 0; $i < count($songs); $i++) : ?>

    <div class="modal fade m--music" id="m--music<?= $i ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body pt-4 pb-4">

                    <div class="d-flex">
                        <div class="p-0">
                            <h6 class="black-text m-3"><i class="fa fa-apple"></i> iTunes</h6>
                        </div>
                        <div class="ml-auto pt-3 pr-2">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>

                    <hr class="mt-0">
                    <div class="row">
                        <div class="col-lg-5 text-center">
                            <h3>
                                <?= $this->Html->image($songs[$i]['artworkUrl100'], ['class' => 'img-fluid z-depth-2']) ?>
                            </h3>
                            <p class="mt-4">
                                <?= h($songs[$i]['collectionName']) ?>
                            </p>
                            <p class="mt-4">
                                <?= $this->Html->media($songs[$i]['previewUrl'], ['controls']) ?>
                            </p>
                        </div>
                        <div class="col-lg-7 text-center">
                            <h2 class="h2-responsive product-name">
                              <strong><?= h($songs[$i]['trackName']) ?></strong>
                            </h2>
                            <h3 class="h3-responsive">
                                <?= h($songs[$i]['artistName']) ?>
                            </h3>

                            <p>
                                <small>ジャンル名: <?= h($songs[$i]['primaryGenreName']) ?></small>
                            </p>
                            <p>
                                <small>
                                    Released: <?= date('Y/m/d', strtotime(h($songs[$i]['releaseDate']))); ?>
                                    <span class="badge badge-danger"><?= h($songs[$i]['trackExplicitness']) ?></span>
                                </small>
                            </p>
                            <hr>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-xs-6">
                                    <p>
                                        <?= $this->Html->link('Track<span class="none"> View</span>', $songs[$i]['trackViewUrl'],
                                            ['class' => 'btn btn-sm btn-rounded btn-primary waves-effect', 'target' => '_blank', 'escape' => false]
                                        ) ?>
                                    </p>
                                </div>
                                <div class="col-lg-4 col-md-4 col-xs-6">
                                    <p>
                                        <?= $this->Html->link('Album<span class="none"> View</sapn>', $songs[$i]['collectionViewUrl'],
                                            ['class' => 'btn btn-sm btn-rounded btn-default waves-effect', 'target' => '_blank', 'escape' => false]
                                        ) ?>
                                    </p>
                                </div>
                                <div class="col-lg-4 col-md-4 col-xs-12">
                                    <p>
                                        <?= $this->Html->link('Artist<span class="none"> View</span>', $songs[$i]['artistViewUrl'],
                                            ['class' => 'btn btn-sm btn-rounded btn-deep-purple waves-effect', 'target' => '_blank', 'escape' => false]
                                        ) ?>
                                    </p>
                                </div>
                            </div><!-- /.row -->
                        </div><!-- /.col-lg-7 -->
                    </div><!-- /.row -->
                </div><!-- /.modal-body -->
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div class="col-lg-2 col-md-3 col-xs-6 mb-3">
        <div class="card card-body text-center pb-0">
            <p>
                <?= $this->Html->link($this->Html->image($songs[$i]['artworkUrl100'], ['class' => 'img-fluid z-depth-2']),
                    'javascript:void(0)',
                    [
                        'class'       => 'dark-grey-text',
                        'data-toggle' => 'modal',
                        'data-target' => '#m--music' . $i,
                        'escape'      => false
                    ]
                ) ?>
            </p>
            <p>
                <small>
                <?= $this->Html->link($songs[$i]['artistName'], 'javascript:void(0)',
                    [
                        'class'       => 'dark-grey-text',
                        'data-toggle' => 'modal',
                        'data-target' => '#m--music' . $i
                    ]
                ) ?>
                </small>
            </p>
            <p>
                <small>
                    <?= $this->Html->link($songs[$i]['trackName'], 'javascript:void(0)',
                        [
                            'class'       => 'dark-grey-text',
                            'data-toggle' => 'modal',
                            'data-target' => '#m--music' . $i
                        ]
                    ) ?>
                </small>
            </p>
            <hr class="mt-0 mb-2">
            <div class="form-check text-right">
                <?= $this->Form->checkbox('song' . $i, ['id' => 'f--song' . $i, 'class' => 'form-check-input']) ?>
                <label for="f--song<?= $i; ?>"><small>登録</small></label>
            </div>
        </div>
    </div>
<?php endfor; ?>
</div>

<div class="card card-body mb-3">
    <div class="row">
        <div class="col-lg-12">
            <?= $this->Form->button('<i class="fa fa-plus"></i> 登録',
                ['class' => 'btn btn-success btn-block', 'escape' => false]
            ) ?>
        </div>
    </div>
</div>
<?= $this->Form->end() ?>

<?php elseif (isset($songs) && count($songs) === 0) : ?>
<div class="card card-body">
    <div class="row">
        <div class="col-lg-12">
            <p class="dark-grey-text text-center mt-3">
                ヒットしませんでした。
            </p>
        </div>
    </div>
</div>
<?php endif; ?>

<script>
$(function() {
    $('.m--music').each(function(i, elem) {
        $('#m--music' + i).on('hidden.bs.modal', function (e) {
          $('#m--music' + i + ' audio').attr("src", $('#m--music' + i + ' audio').attr("src"));
        });
    });
});
</script>
