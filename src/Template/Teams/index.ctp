<?= $this->Form->create() ?>
<div class="card p-3 mb-5">
    <div class="row">
        <div class="col-lg-3 col-md-6 col-xs-12">
            <?= $this->Form->control('pref',
                [
                    'id'      => 'f--genre',
                    'type'    => 'select',
                    'class'   => 'mdb-select colorful-select dropdown-primary',
                    'options' => $prefs,
                    'empty'   => '都道府県を選択'
                ]
            ) ?>
        </div>
        <div class="col-lg-3 col-md-6 col-xs-12">
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
        <div class="col-lg-6 col-md-12 col-xs-12">
            <div class="form-inline md-form input-group mt-2 mb-2">
                <?= $this->Form->control('word', ['class' => 'form-control my-0', 'placeholder' => '検索']) ?>
                <?= $this->Form->button('<i class="fa fa-search"></i>',
                    [
                        'class'          => 'btn btn-primary ml-2 waves-effect waves-light',
                        'escape'         => false,
                        'data-toggle'    => 'tooltip',
                        'data-placement' => 'bottom',
                        'title'          => '1ワードのみ対応'
                    ]
                ) ?>
            </div>
        </div>
    </div><!-- /.row -->
</div><!-- /.card -->
<?= $this->Form->end() ?>

<section class="team-section pb-5">

    <p>検索結果</p>

    <div class="row text-center">
        <?php
            for ($i = 1; $i <= 16; $i++ ) :
        ?>

        <div class="col-lg-3 col-md-6 mb-4">

            <div class="card">
                <div class="view overlay zoom">
                    <?php
                        if (($i % 2) === 0) {
                            print $this->Html->image('/img/sample/team1.jpg', ['class' => 'img-fluid']);
                        } elseif (($i % 3) === 0) {
                            print $this->Html->image('/img/sample/team2.jpg', ['class' => 'img-fluid']);
                        } else {
                            print $this->Html->image('/img/sample/team3.jpg', ['class' => 'img-fluid']);
                        }
                    ?>

                    <a>
                        <div class="mask rgba-white-slight"></div>
                    </a>
                </div>
                <a href="teams/view" class="black-text">
                <div class="card-body">
                    <p><span class="badge badge-success">神奈川県</span> <span class="badge indigo">Breaking</span></p>
                    <h5 class="card-title"><strong>神奈川ダンスチーム</strong></h5>
                    <p class="dark-grey-text">
                        <small>リーダー: <?= $this->Html->link('Yokoi', ['controller' => 'dancers', 'action' => 'view']) ?></small>
                    </p>
                    <hr>
                    <p class="card-text">
                        オールドスクールを意識してます。
                    </p>
                </div>
                </a>
            </div>

        </div><!-- /.col-lg-3 -->

        <?php endfor; ?>
    </div><!-- /.row -->

    <nav aria-label="pagination">
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
</section>
