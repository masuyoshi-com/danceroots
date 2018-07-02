<div class="row">
    <div class="col-lg-6 col-md-12">
        <div class="jumbotron">
            <h1 class="h1-responsive"><i class="fa fa-music pink-text"></i> Favorite Dance Music</h1>
            <hr class="my-2">
            <p class="lead grey-text">
                <small>音楽動画の共有にご協力ください。良い音楽を聞く、知ることは大切です。</small>
            </p>
            <hr class="my-2">
            <?= $this->Html->link('Youtube音楽登録', ['action' => 'add'],
                [
                    'class'          => 'btn btn-amber btn-block',
                    'data-toggle'    => 'tooltip',
                    'data-placement' => 'bottom',
                    'title'          => 'Youtube音楽動画を登録をしましょう。'
                ]
            ) ?>
        </div>
    </div>
    <div class="col-lg-6 col-md-12">
        <div class="text-center jumbotron">
            <p>
                <strong>広告枠</strong>
            </p>
        </div>
    </div>
</div>

<?= $this->Form->create() ?>
<div class="card p-3">
    <div class="row">
        <div class="col-lg-12">
            <div class="form-inline md-form mt-2 mb-2">
                <div class="col-lg-3 col-md-12 col-xs-12">
                    <?= $this->Form->control('genre',
                        [
                            'id'      => 'f--genre',
                            'type'    => 'select',
                            'class'   => 'mdb-select colorful-select dropdown-primary',
                            'options' => $genres,
                            'empty'   => 'ジャンルを選択'
                        ]
                    ) ?>
                </div>
                <div class="col-lg-9 col-md-12 col-xs-12 input-group">
                    <?= $this->Form->control('word', ['class' => 'form-control my-0', 'placeholder' => '検索']) ?>
                    <?= $this->Form->button('<i class="fa fa-search"></i>',
                        [
                            'class'          => 'btn btn-indigo ml-2 waves-effect waves-light',
                            'escape'         => false,
                            'data-toggle'    => 'tooltip',
                            'data-placement' => 'bottom',
                            'title'          => '1ワードのみ対応'
                        ]
                    ) ?>
                </div>
            </div><!-- /.form-inline -->
        </div>
    </div><!-- /.row -->
</div><!-- /.card -->
<?= $this->Form->end() ?>

<section class="pt-5 pb-3">
    <div class="row">
        <?php for ($i = 1; $i <= 12; $i++) : ?>
            <div class="col-lg-3 col-md-6 mb-5">
                <div class="card news-card">

                    <div class="card-body">
                        <div class="content">
                            <div class="right-side-meta"><span><i class="fa fa-heart-o"></i>265 likes</span></div>
                            <?= $this->Html->image('/img/sample/thumbnail.jpg', ['class' => 'rounded-circle avatar-img z-depth-1-half']) ?>
                            Shoichi
                        </div>
                    </div>

                    <div class="embed-responsive embed-responsive-1by1">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/37pwbUp8t1I" allowfullscreen></iframe>
                    </div>

                    <div class="card-body">

                        <div class="social-meta">
                            <h5 class="blue-text">HipHop</h5>
                            <p><strong>タイトルが入ります。</strong></p>
                        </div>

                        <hr>

                        <div class="md-form">
                            <p><i class="fa fa-tag"></i> マイケルジャクソン</p>
                        </div>
                        <div class="grey-text text-right"><small>登録日: 2018-03-12</small></div>
                    </div>
                </div><!-- /.card -->
            </div><!-- /.col-lg-4 -->
        <?php endfor; ?>
    </div><!-- /.row -->
</section>

<!--Pagination-->
<nav aria-label="pagination example">
    <ul class="pagination pg-blue justify-content-center">

        <!--Arrow left-->
        <li class="page-item disabled">
            <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
            </a>
        </li>

        <li class="page-item active">
            <a class="page-link" href="#">1 <span class="sr-only">(current)</span></a>
        </li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">4</a></li>
        <li class="page-item"><a class="page-link" href="#">5</a></li>

        <li class="page-item">
            <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Next</span>
            </a>
        </li>
    </ul>
</nav>
