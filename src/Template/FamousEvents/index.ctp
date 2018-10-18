<?php $this->assign('title', 'ダンサー/チーム名 - 出演イベント一覧'); ?>

<section>
    <h2 class="section-heading text-center mb-0 mt-4 pt-4 font-weight-bold wow fadeIn">Event / Workshop</h2>
    <p class="text-center text-uppercase font-weight-bold mt-0 mb-5 wow fadeIn" data-wow-delay="0.2s">
        <small>イベント・ワークショップ</small>
    </p>
    <!--
    <div class="row">
        <div class="col-lg-12">
            <p class="dark-grey-text text-right">
                <small>
                    <?= $this->Paginator->counter('{{page}} / {{pages}} ページ &nbsp; 全 {{count}} 件') ?>
                </small>
            </p>
            <hr>
        </div>
    </div>
    -->
    <div class="row wow fadeIn" data-wow-delay="0.2s">
        <?php for ($i = 0; $i < 9; $i++) : ?>

            <div class="modal fade event" id="event<?= $i ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-body pt-4 pb-4">

                            <div class="d-flex">
                                <div class="p-0">
                                    <h6 class="dark-grey-text font-weight-bold m-3">
                                        <i class="fa fa-calendar mr-2" aria-hidden="true"></i>Event Information
                                    </h6>
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
                                        <?php
                                            print $this->Html->image('/img/sample/noimage-600x360.jpg', ['class' => 'img-fluid']);
                                        ?>
                                    </h3>
                                </div>
                                <div class="col-lg-7 text-center">
                                    <p class="grey-text text-left mb-0">
                                        <small>クラブショー</small>
                                    </p>
                                    <h3 class="h3-responsive product-name mt-2 dark-grey-text font-weight-bold">
                                        <strong>EVENT TITLE</strong>
                                    </h3>
                                    <hr>
                                    <h6 class="h6-responsive font-weight-bold">
                                        <i class="fa fa-clock-o" aria-hidden="true"></i> 2018/10/12
                                    </h6>
                                    <p class="font-weight-bold">
                                        Start: 18:00 ～ End: 23:00
                                    </p>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <p class="dark-grey-text">
                                                ここにイベント本文が表示されます。
                                            </p>
                                        </div>
                                    </div><!-- /.row -->
                                    <!--Footer-->
                                    <div class="modal-footer justify-content-center">
                                        <a type="button" class="btn-floating btn-sm btn-fb">
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                        <a type="button" class="btn-floating btn-sm btn-tw">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                        <a type="button" class="btn-floating btn-sm btn-pink">
                                            <i class="fa fa-instagram"></i>
                                        </a>
                                        <button type="button" class="btn btn-outline-primary btn-rounded btn-md ml-4" data-dismiss="modal">Close</button>
                                    </div>
                                </div><!-- /.col-lg-7 -->
                            </div><!-- /.row -->
                        </div><!-- /.modal-body -->
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 mb-3">
                <div class="card">
                    <div class="view overlay">
                        <?php
                            if ($i === 0) {
                                print '<img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/food.jpg" alt="Card image cap">';
                            } elseif ($i === 1) {
                                print '<img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/images/49.jpg" alt="Card image cap">';
                            } elseif ($i === 2) {
                                print '<img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/images/48.jpg" alt="Card image cap">';
                            } else {
                                print '<img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/food.jpg" alt="Card image cap">';
                            }
                        ?>
                        <a>
                            <div class="mask rgba-white-slight"></div>
                        </a>
                    </div>

                    <?= $this->Html->link('<i class="fa fa-chevron-right pl-1"></i>', 'javascript:void(0)',
                        [
                            'class'       => 'btn-floating btn-action ml-auto mr-4 mdb-color lighten-3',
                            'data-toggle' => 'modal',
                            'data-target' => '#event' . $i,
                            'escape'      => false
                        ])
                    ?>

                    <div class="card-body">
                        <h4 class="card-title">Event title <?= $i + 1?></h4>
                        <hr>
                        <p class="card-text">
                            イベントの簡易説明文が表示されます。<br>
                            <br>
                            複数段の入力が可能です。
                        </p>
                    </div>

                    <div class="rounded-bottom mdb-color lighten-3 text-center pt-3">
                        <ul class="list-unstyled list-inline font-small">
                            <li class="list-inline-item pr-2 white-text"><i class="fa fa-clock-o pr-1"></i>2018/12/20</li>
                            <li class="list-inline-item pr-2 white-text">Start: 18:00</li>
                            <li class="list-inline-item pr-2 white-text">End:   23:00</li>
                        </ul>
                    </div>
                </div><!-- /.card -->
            </div><!-- /.col-lg-4 -->
        <?php endfor; ?>
    </div><!-- /.row -->
    <hr>
    <!--
    <div class="row">
        <div class="col-lg-12">
            <nav aria-label="pagination">
                <ul class="pagination pg-blue justify-content-center">
                    <?= $this->Paginator->prev(__('前へ')) ?>
                    <?= $this->Paginator->numbers() ?>
                    <?= $this->Paginator->next(__('次へ')) ?>
                </ul>
            </nav>
        </div>
    </div>
    -->
</section>
