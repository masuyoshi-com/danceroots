<div class="row mb-5">
    <div class="col-lg-10 col-md-12">
        <div class="card card-body">
            <div class="row">
                <div class="col-lg-12 mb-3">
                    <?= $this->Html->image('https://mdbootstrap.com/img/Photos/Slides/img%20(137).jpg',
                        ['class' => 'img-fluid z-depth-1']
                    ) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <h6>
                        <span class="badge indigo">神奈川県</span>
                        <span class="badge pink">HipHop</span>
                    </h6>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="text-center">
                        <strong>Butterfly</strong>
                    </h2>
                </div>
            </div>

            <hr>

            <div class="row">
                <div class="col-lg-12">
                    <!--Section: Products v.4-->
                    <section class="pb-3 text-center">

                        <h4 class="h4 py-3 dark-grey-text">Members</h4>

                        <div class="row">

                            <!--Grid column-->
                            <div class="col-lg-3 col-md-6 mb-4">

                                <!--Collection card-->
                                <div class="card collection-card z-depth-1-half">
                                    <!--Card image-->
                                    <div class="view zoom">
                                        <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/5.jpg" class="img-fluid" alt="">
                                        <div class="stripe dark">
                                            <a>
                                                <p>Red trousers
                                                    <i class="fa fa-angle-right"></i>
                                                </p>
                                            </a>
                                        </div>
                                    </div>
                                    <!--Card image-->
                                </div>
                                <!--Collection card-->

                            </div>
                            <!--Grid column-->

                            <!--Grid column-->
                            <div class="col-lg-3 col-md-6 mb-4">

                                <!--Collection card-->
                                <div class="card collection-card z-depth-1-half">
                                    <!--Card image-->
                                    <div class="view zoom">
                                        <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/8.jpg" class="img-fluid" alt="">
                                        <div class="stripe light">
                                            <a>
                                                <p>Sweatshirt
                                                    <i class="fa fa-angle-right"></i>
                                                </p>
                                            </a>
                                        </div>
                                    </div>
                                    <!--Card image-->
                                </div>
                                <!--Collection card-->

                            </div>
                            <!--Grid column-->

                            <!--Grid column-->
                            <div class="col-lg-3 col-md-6 mb-4">

                                <!--Collection card-->
                                <div class="card collection-card z-depth-1-half">
                                    <!--Card image-->
                                    <div class="view zoom">
                                        <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/9.jpg" class="img-fluid" alt="">
                                        <div class="stripe dark">
                                            <a>
                                                <p>Accessories
                                                    <i class="fa fa-angle-right"></i>
                                                </p>
                                            </a>
                                        </div>
                                    </div>
                                    <!--Card image-->
                                </div>
                                <!--Collection card-->

                            </div>
                            <!--Grid column-->

                            <!--Fourth column-->
                            <div class="col-lg-3 col-md-6 mb-4">

                                <!--Collection card-->
                                <div class="card collection-card z-depth-1-half">
                                    <!--Card image-->
                                    <div class="view zoom">
                                        <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/7.jpg" class="img-fluid" alt="">
                                        <div class="stripe light">
                                            <a>
                                                <p>Sweatshirt
                                                    <i class="fa fa-angle-right"></i>
                                                </p>
                                            </a>
                                        </div>
                                    </div>
                                    <!--Card image-->
                                </div>
                                <!--Collection card-->
                            </div>
                            <!--Fourth column-->
                        </div>
                        <!--Grid row-->
                    </section>
                    <!--Section: Products v.4-->
                </div><!-- /.col-lg-12 -->
            </div><!-- /.row -->

            <hr>

            <div class="row">
                <div class="col-lg-12">
                    <div class="md-form">
                        <?= $this->Form->control('intro', ['id' => 'f--intro', 'class' => 'form-control'])?>
                        <label for="f--intro">チーム自己紹介</label>
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

            <div class="row">
                <div class="col-lg-12">
                    <div class="md-form">
                        <?= $this->Form->control('style', ['id' => 'f--style', 'class' => 'form-control']) ?>
                        <label for="f--style">チームスタイル</label>
                    </div>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-lg-12">
                    <h4 class="h4 py-3 dark-grey-text text-center">DanceShowCases</h4>
                    <div class="embed-responsive embed-responsive-16by9 z-depth-2">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/YwD3qnUJuFM?rel=0" style="height: 100%" allowfullscreen></iframe>
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




            <div class="row mt-3 mb-3">
                <div class="col-lg-12">
                    <?= $this->Form->button('<i class="fa fa-envelope"></i> オファー or メッセージ',
                        ['class' => 'btn btn-primary btn-block'],
                        ['escape' => 'false']
                    ) ?>
                </div>
            </div>

        </div><!-- /.card -->
    </div><!-- /.col-lg-10 -->
</div><!-- /.row -->
