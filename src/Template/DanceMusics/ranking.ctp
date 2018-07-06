<?php $this->assign('title', 'ミュージックランキング'); ?>

<div class="row">
    <div class="col-lg-12">
        <div class="jumbotron text-center pt-4 pb-4">
            <h2 class="h2-responsive"><i class="fa fa-music pink-text"></i> ミュージックランキング
            </h2>
            <hr class="my-2">
            <p class="lead grey-text">
                <small>米国の最新ミュージックランキング</small>
            </p>
            <hr class="my-2">
        </div>
    </div>
</div>

<ul class="nav nav-tabs nav-justified indigo mb-3" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#panel1" role="tab">トップソング</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#panel2" role="tab">トップアルバム</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#panel3" role="tab">最新リリース</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#panel4" role="tab">新着ミュージック</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#panel5" role="tab">注目トラック</a>
    </li>
</ul><!-- /.nav -->

<div class="tab-content">

    <div class="tab-pane fade in show active" id="panel1" role="tabpanel">

        <?php if (isset($songs1) && count($songs1) !== 0) : ?>

        <div class="row">
        <?php for($i = 0; $i < count($songs1); $i++) : ?>
            <div class="col-lg-2 col-md-3 col-xs-6 mb-3">
                <div class="card card-body text-center pb-0">

                    <div class="d-flex">
                        <div>
                            <p class="grey-text text-left mb-0">
                                <small><?= h($i + 1) ?>位</small>
                            </p>
                        </div>
                        <div class="ml-auto">
                            <p class="grey-text mb-0">
                                <small>
                                    <?= h($songs1[$i]['genres'][0]['name']) ?>
                                </small>
                            </p>
                        </div>
                    </div>

                    <hr class="mt-0">

                    <p>
                        <?= $this->Html->link($this->Html->image($songs1[$i]['artworkUrl100'], ['class' => 'img-fluid z-depth-2']),
                            $songs1[$i]['url'],
                            ['class' => 'dark-grey-text', 'escape' => false, 'target' => '_blank']
                        ) ?>
                    </p>
                    <p>
                        <small>
                        <?= $this->Html->link($songs1[$i]['artistName'], $songs1[$i]['url'],
                            ['class' => 'dark-grey-text', 'target' => '_blank']
                        ) ?>
                        </small>
                    </p>
                    <p>
                        <small>
                            <?= $this->Html->link($songs1[$i]['name'], $songs1[$i]['url'],
                                ['class' => 'dark-grey-text', 'target' => '_blank']
                            ) ?>
                        </small>
                    </p>
                    <hr class="mt-0 mb-2">
                    <div class="text-right">
                        <p class="grey-text">
                            <small>
                                Released: <?= date('Y/m/d', strtotime(h($songs1[$i]['releaseDate']))); ?>
                            </small>
                        </p>
                    </div>
                </div><!-- /.card -->
            </div><!-- /.col-lg-2 -->
        <?php endfor; ?>
        </div><!-- /.row -->

        <?php elseif (isset($songs1) && count($songs1) === 0) : ?>
        <div class="card card-body">
            <div class="row">
                <div class="col-lg-12">
                    <p class="dark-grey-text text-center mt-3">
                        取得できませんでした。
                    </p>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div><!-- /.tab-pane -->


    <div class="tab-pane fade" id="panel2" role="tabpanel">
        <?php if (isset($songs2) && count($songs2) !== 0) : ?>

        <div class="row">
        <?php for($i = 0; $i < count($songs2); $i++) : ?>
            <div class="col-lg-2 col-md-3 col-xs-6 mb-3">
                <div class="card card-body text-center pb-0">

                    <div class="d-flex">
                        <div>
                            <p class="grey-text text-left mb-0">
                                <small><?= h($i + 1) ?>位</small>
                            </p>
                        </div>
                        <div class="ml-auto">
                            <p class="grey-text mb-0">
                                <small>
                                    <?= h($songs2[$i]['genres'][0]['name']) ?>
                                </small>
                            </p>
                        </div>
                    </div>

                    <hr class="mt-0">

                    <p>
                        <?= $this->Html->link($this->Html->image($songs2[$i]['artworkUrl100'], ['class' => 'img-fluid z-depth-2']),
                            $songs2[$i]['url'],
                            ['class' => 'dark-grey-text', 'escape' => false, 'target' => '_blank']
                        ) ?>
                    </p>
                    <p>
                        <small>
                        <?= $this->Html->link($songs2[$i]['artistName'], $songs2[$i]['url'],
                            ['class' => 'dark-grey-text', 'target' => '_blank']
                        ) ?>
                        </small>
                    </p>
                    <p>
                        <small>
                            <?= $this->Html->link($songs2[$i]['name'], $songs2[$i]['url'],
                                ['class' => 'dark-grey-text', 'target' => '_blank']
                            ) ?>
                        </small>
                    </p>
                    <hr class="mt-0 mb-2">
                    <div class="text-right">
                        <p class="grey-text">
                            <small>
                                Released: <?= date('Y/m/d', strtotime(h($songs2[$i]['releaseDate']))); ?>
                            </small>
                        </p>
                    </div>
                </div><!-- /.card -->
            </div><!-- /.col-lg-2 -->
        <?php endfor; ?>
        </div><!-- /.row -->

        <?php elseif (isset($songs2) && count($songs2) === 0) : ?>
        <div class="card card-body">
            <div class="row">
                <div class="col-lg-12">
                    <p class="dark-grey-text text-center mt-3">
                        取得できませんでした。
                    </p>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div><!-- /.tab-pane -->

    <div class="tab-pane fade" id="panel3" role="tabpanel">
        <?php if (isset($songs3) && count($songs3) !== 0) : ?>

        <div class="row">
        <?php for($i = 0; $i < count($songs3); $i++) : ?>
            <div class="col-lg-2 col-md-3 col-xs-6 mb-3">
                <div class="card card-body text-center pb-0">

                    <p class="grey-text text-left mb-0">
                        <small>
                            <?= h($songs3[$i]['genres'][0]['name']) ?>
                        </small>
                    </p>

                    <hr class="mt-0">

                    <p>
                        <?= $this->Html->link($this->Html->image($songs3[$i]['artworkUrl100'], ['class' => 'img-fluid z-depth-2']),
                            $songs3[$i]['url'],
                            ['class' => 'dark-grey-text', 'escape' => false, 'target' => '_blank']
                        ) ?>
                    </p>
                    <p>
                        <small>
                        <?= $this->Html->link($songs3[$i]['artistName'], $songs3[$i]['url'],
                            ['class' => 'dark-grey-text', 'target' => '_blank']
                        ) ?>
                        </small>
                    </p>
                    <p>
                        <small>
                            <?= $this->Html->link($songs3[$i]['name'], $songs3[$i]['url'],
                                ['class' => 'dark-grey-text', 'target' => '_blank']
                            ) ?>
                        </small>
                    </p>
                    <hr class="mt-0 mb-2">
                    <div class="text-right">
                        <p class="grey-text">
                            <small>
                                Released: <?= date('Y/m/d', strtotime(h($songs3[$i]['releaseDate']))); ?>
                            </small>
                        </p>
                    </div>
                </div><!-- /.card -->
            </div><!-- /.col-lg-2 -->
        <?php endfor; ?>
        </div><!-- /.row -->

        <?php elseif (isset($songs3) && count($songs3) === 0) : ?>
        <div class="card card-body">
            <div class="row">
                <div class="col-lg-12">
                    <p class="dark-grey-text text-center mt-3">
                        取得できませんでした。
                    </p>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div><!-- /.tab-pane -->

    <div class="tab-pane fade" id="panel4" role="tabpanel">
        <?php if (isset($songs4) && count($songs4) !== 0) : ?>

        <div class="row">
        <?php for($i = 0; $i < count($songs4); $i++) : ?>
            <div class="col-lg-2 col-md-3 col-xs-6 mb-3">
                <div class="card card-body text-center pb-0">

                    <p class="grey-text text-left mb-0">
                        <small>
                            <?= h($songs4[$i]['genres'][0]['name']) ?>
                        </small>
                    </p>

                    <hr class="mt-0">

                    <p>
                        <?= $this->Html->link($this->Html->image($songs4[$i]['artworkUrl100'], ['class' => 'img-fluid z-depth-2']),
                            $songs4[$i]['url'],
                            ['class' => 'dark-grey-text', 'escape' => false, 'target' => '_blank']
                        ) ?>
                    </p>
                    <p>
                        <small>
                        <?= $this->Html->link($songs4[$i]['artistName'], $songs4[$i]['url'],
                            ['class' => 'dark-grey-text', 'target' => '_blank']
                        ) ?>
                        </small>
                    </p>
                    <p>
                        <small>
                            <?= $this->Html->link($songs4[$i]['name'], $songs4[$i]['url'],
                                ['class' => 'dark-grey-text', 'target' => '_blank']
                            ) ?>
                        </small>
                    </p>
                    <hr class="mt-0 mb-2">
                    <div class="text-right">
                        <p class="grey-text">
                            <small>
                                Released: <?= date('Y/m/d', strtotime(h($songs4[$i]['releaseDate']))); ?>
                            </small>
                        </p>
                    </div>
                </div><!-- /.card -->
            </div><!-- /.col-lg-2 -->
        <?php endfor; ?>
        </div><!-- /.row -->

        <?php elseif (isset($songs4) && count($songs4) === 0) : ?>
        <div class="card card-body">
            <div class="row">
                <div class="col-lg-12">
                    <p class="dark-grey-text text-center mt-3">
                        取得できませんでした。
                    </p>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div><!-- /.tab-pane -->

    <div class="tab-pane fade" id="panel5" role="tabpanel">
        <?php if (isset($songs5) && count($songs5) !== 0) : ?>

        <div class="row">
        <?php for($i = 0; $i < count($songs5); $i++) : ?>
            <div class="col-lg-2 col-md-3 col-xs-6 mb-3">
                <div class="card card-body text-center pb-0">

                    <p class="grey-text text-left mb-0">
                        <small>
                            <?= h($songs5[$i]['genres'][0]['name']) ?>
                        </small>
                    </p>

                    <hr class="mt-0">

                    <p>
                        <?= $this->Html->link($this->Html->image($songs5[$i]['artworkUrl100'], ['class' => 'img-fluid z-depth-2']),
                            $songs5[$i]['url'],
                            ['class' => 'dark-grey-text', 'escape' => false, 'target' => '_blank']
                        ) ?>
                    </p>
                    <p>
                        <small>
                        <?= $this->Html->link($songs5[$i]['artistName'], $songs5[$i]['url'],
                            ['class' => 'dark-grey-text', 'target' => '_blank']
                        ) ?>
                        </small>
                    </p>
                    <p>
                        <small>
                            <?= $this->Html->link($songs5[$i]['name'], $songs5[$i]['url'],
                                ['class' => 'dark-grey-text', 'target' => '_blank']
                            ) ?>
                        </small>
                    </p>
                    <hr class="mt-0 mb-2">
                    <div class="text-right">
                        <p class="grey-text">
                            <small>
                                Released: <?= date('Y/m/d', strtotime(h($songs5[$i]['releaseDate']))); ?>
                            </small>
                        </p>
                    </div>
                </div><!-- /.card -->
            </div><!-- /.col-lg-2 -->
        <?php endfor; ?>
        </div><!-- /.row -->

        <?php elseif (isset($songs5) && count($songs5) === 0) : ?>
        <div class="card card-body">
            <div class="row">
                <div class="col-lg-12">
                    <p class="dark-grey-text text-center mt-3">
                        取得できませんでした。
                    </p>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div><!-- /.tab-pane -->
</div><!-- /.tab-content -->
