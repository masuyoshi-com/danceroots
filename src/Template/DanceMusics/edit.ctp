<div class="row">
    <div class="col-lg-12">
        <div class="jumbotron">
            <h1 class="h1-responsive"><i class="fa fa-music pink-text"></i> My Favorite Dance Musics</h1>
            <hr class="my-2">
            <p class="lead grey-text">
                <small>現在の登録済み動画一覧です。やり直したい場合は、いったん削除してから再度登録してください。</small>
            </p>
            <hr class="my-2">
            <div class="row">
                <div class="col-lg-6 mb-1">
                    <!-- 区分切り分け -->
                    <?= $this->Html->link('<i class="fa fa-home"></i> ホーム', ['controller' => 'dancers', 'action' => 'home'],
                        ['class' => 'btn btn-warning btn-block', 'escape' => false]
                    ) ?>
                </div>
                <div class="col-lg-6">
                    <?= $this->Html->link('<i class="fa fa-plus"></i> 新たに登録', ['action' => 'add'],
                        ['class' => 'btn btn-success btn-block', 'escape' => false]
                    ) ?>
                </div>
            </div>
        </div>

    </div>
</div>

<?= $this->Form->create() ?>
<div class="card p-3 mb-5">
    <div class="row">
        <div class="col-lg-12">
            <div class="form-inline md-form mt-2 ml-2 mb-2">
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
            </div>
        </div>
    </div><!-- /.row -->
</div><!-- /.card -->
<?= $this->Form->end() ?>

<div class="row">
    <div class="col-lg-12">
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
    </div>
</div>

<section class="pb-3">
    <div class="row">
        <?php for ($i = 1; $i <= 12; $i++) : ?>
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="card news-card">

                    <div class="card-body">
                        <div class="content">
                            <div class="right-side-meta">登録日: 2018-03-12</div>
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
                            <p><i class="fa fa-tag"></i> スティービーワンダー</p>
                        </div>

                            <div class="form-check text-right">
                            <?= $this->Form->checkbox('delete', ['class' => 'form-check-input filled-in', 'id' => 'filledInCheckbox' . $i . '']) ?>
                            <label class="form-check-label" for="filledInCheckbox<?= $i ?>">
                                削除する
                            </label>
                        </div>
                    </div>
                </div><!-- /.card -->
            </div><!-- /.col-lg-4 -->
        <?php endfor; ?>
    </div><!-- /.row -->
</section>

<div class="row mb-5">
    <div class="col-lg-12">
        <?= $this->Form->button('選択した動画を削除する', ['class' => 'btn btn-danger btn-block']) ?>
    </div>
</div>
