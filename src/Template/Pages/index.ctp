<div id="carousel-slide" class="carousel slide carousel-fade white-text" data-ride="carousel" data-interval="false">

    <ol class="carousel-indicators">
        <li data-target="#carousel-slide" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-slide" data-slide-to="1"></li>
        <li data-target="#carousel-slide" data-slide-to="2"></li>
    </ol>

    <div class="carousel-inner" role="listbox">

        <!-- First slide -->
        <div class="carousel-item active view hm-black-light" style="background-image: url('img/top1.jpg'); background-repeat: no-repeat; background-size: cover;">
            <div class="full-bg-img flex-center white-text">
                <ul class="animated fadeInUp col-md-12">
                    <li>
                        <h1 class="display-3 flex-item font-bold">Dancer<span class="font-blue">oo</span>ts<span class="none">.net</span></h1>
                    <li>
                        <h3 class="flex-item">Streetdancer Social Platform</h3>
                    </li>
                    <li>
                        <?php
                            if (isset($logins)) {
                                print $this->Html->link('My Home', $homes, ['class' => 'btn btn-default btn-lg flex-item']);
                            } else {
                                print $this->Html->link('サインアップ', ['controller' => 'Users', 'action' => 'signup'],
                                    ['class' => 'btn btn-primary btn-lg flex-item']
                                );
                                print $this->Html->link('ログイン', ['controller' => 'Users', 'action' => 'login'],
                                    ['class'=> 'btn btn-outline-white btn-lg flex-item']
                                );
                            }
                        ?>
                    </li>
                </ul>
            </div><!-- /.full-bg-img -->
        </div><!-- /.carousel-item -->

        <!-- Second slide -->
        <div class="carousel-item view hm-black-light" style="background-image: url('img/top2.jpg'); background-repeat: no-repeat; background-size: cover;">
            <div class="full-bg-img flex-center white-text">
                <ul class="animated fadeInUp col-md-12">
                    <li>
                        <h1 class="display-4 font-bold">Let's expand the p<span class="font-blue">o</span>ssibilities</h1>
                    </li>
                    <li>
                        <h3 class="my-4">今すぐ可能性を広げよう。</h3>
                    </li>
                    <li>
                        <?php
                            if (isset($logins)) {
                                print $this->Html->link('My Home', $homes, ['class' => 'btn btn-primary btn-lg']);
                            } else {
                                print $this->Html->link('サインアップ', ['controller' => 'Users', 'action' => 'signup'],
                                    ['class' => 'btn btn-primary btn-lg']
                                );
                            }
                        ?>
                    </li>
                </ul>
            </div><!-- /.full-bg-img -->
        </div><!-- /.carousel-item -->

        <!-- Third slide -->
        <div class="carousel-item view hm-black-light" style="background-image: url('img/top3.jpg'); background-repeat: no-repeat; background-size: cover;">
            <div class="full-bg-img flex-center white-text">
                <ul class="animated fadeInUp col-md-12">
                    <li>
                        <h1 class="display-4 font-bold">Shap what y<span class="font-blue">o</span>u like</h1>
                    </li>
                    <li>
                        <h3 class="my-4">あなたの活躍の場を広げるサポートをします。</h3>
                    </li>
                    <li>
                        <?php
                            if (isset($logins)) {
                                print $this->Html->link('My Home', $homes, ['class' => 'btn btn-default btn-lg']);
                            } else {
                                print $this->Html->link('プロフィールを作成', ['controller' => 'Users', 'action' => 'signup'],
                                    ['class' => 'btn btn-default btn-lg']
                                );
                            }
                        ?>
                    </li>
                </ul>
            </div><!-- /.full-bg-img -->
        </div><!-- /.carousel-item -->
    </div><!-- /.carousel-inner -->

    <a class="carousel-control-prev" href="#carousel-slide" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carousel-slide" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div><!-- /.carousel -->


<div class="container">
    <section class="section pb-3 text-center text-lg-left">

        <h1 class="section-heading h1 dark-grey-text text-center mt-5 pt-lg-3">
            dancer<span class="font-blue">oo</span>ts<span class="none">.net</span>の利用は全て無料です。
        </h1>
        <h5 class="text-center">
            <small>
                <span class="red-text">※</span>現在はBETAバージョンです。<br>
                今後様々な機能アップデートを予定しています。是非ご利用ください。
            </small>
        </h5>
        <hr>

        <p class="section-description mb-5 mt-lg-5 mx-lg-5 text-center">
            ストリートダンサーの活躍の場、ビジネスをより広げるための総合プラットフォームです。<br>ストリートダンスに関する情報を皆で共有し、
            個人としての活動はもちろん、ダンスチームとしての活動、サークル作成なども行えます。<br>また、スタジオや各種イベントとダンサーのマッチングを素早く行うことができます。
        </p>

        <hr id="dancer" class="hr-width mb-5 mt-5 pb-3">

        <div class="row pt-lg-5">
            <div class="col-lg-5 col-xl-5 mb-5">
                <?= $this->Html->image('/img/dancer.jpg', ['class' => 'img-fluid z-depth-1-half rounded']) ?>
            </div>

            <div class="col-lg-7 col-xl-7">
                <h6 class="font-bold pb-1 cyan-text">StreetDancer</h6>
                <h4 class="mb-4 font-bold dark-grey-text">
                    <strong>ダンサープロフィールを作成し、活躍の場を広げよう。</strong>
                </h4>
                <p class="dark-grey-text">
                    ストリートダンサーとしての活動の場を広げるためにプロフィールを作成しましょう。
                    他のダンサーと情報を共有するだけでなく、全国のイベント参加やインストラクター求人なども応募できます。
                    必要とされるのはあなたのセンス、スキル、実力です。ダンサーとしての腕を磨きながら、更なる活躍を目指しましょう。
                </p>
                <?= $this->Html->link('サインアップ', ['controller' => 'Users', 'action' => 'signup'],
                    ['class' => 'btn btn-info btn-md mb-3']
                )?>
                <?= $this->Html->link('詳細説明', ['controller' => 'Pages', 'action' => 'dancer'],
                    ['class' => 'btn btn-outline-info btn-md mb-3']
                )?>
            </div><!-- /.col-lg-7 -->
        </div><!-- /.row -->

        <hr id="studio" class="hr-width mb-5 mt-5 pb-3">


        <div class="row">
            <div class="col-lg-7 col-xl-7 pb-3">
                <h6 class="font-bold pb-1 orange-text">Studio/School</h6>
                <h4 class="mb-4 font-bold dark-grey-text">
                    <strong>ダンススタジオを全国のダンサーにアピールしませんか？</strong>
                </h4>
                <p class="dark-grey-text">
                    ダンススタジオを登録しておけば、全国のダンサーやダンスに興味をもっている人の目に触れる機会が増えます。
                    また、各種イベントやインストラクター求人登録も可能。ダンスカルチャー全体のことを考え、積極的にダンスインストラクターの獲得、
                    ダンサー人口を増やし、ダンスの楽しさを共に広げましょう。
                </p>
                <?= $this->Html->link('サインアップ', ['controller' => 'Users', 'action' => 'signup'],
                    ['class' => 'btn btn-warning btn-md mb-3']
                ) ?>
            </div>

            <div class="col-lg-5 col-xl-5 mb-5">
                <?= $this->Html->image('/img/studio.jpg', ['class' => 'img-fluid z-depth-1-half rounded']) ?>
            </div>
        </div><!-- /.row -->

        <hr id="organaizer" class="hr-width mb-5 mt-4 pb-3">

        <div class="row">
            <div class="col-lg-5 ml-auto col-xl-5 pb-3">
                <?= $this->Html->image('/img/event.jpg', ['class' => 'img-fluid z-depth-1-half rounded']) ?>
            </div>
            <div class="col-lg-7 mr-auto col-xl-7">
                <h6 class="font-bold pb-1 purple-text">Organaizer/Company</h6>
                <h4 class="mb-4 font-bold dark-grey-text">
                    <strong>ダンス・クラブイベントを効率的に告知できます。</strong>
                </h4>
                <p class="dark-grey-text">
                    ダンスコンテストやクラブイベントを主催するなら、効率的に告知・募集を行いましょう。
                    フライヤーも大事ですが、無駄に作成する必要もありません。dancerootsでイベント登録しておけば、
                    ダンサーからの出演応募も期待できます。是非活用し、イベント成功に役立ててください。
                </p>
                <?= $this->Html->link('サインアップ', ['controller' => 'Users', 'action' => 'signup'],
                    ['class' => 'btn btn-secondary btn-md mb-3']
                ) ?>
            </div><!-- /.col-lg-5 -->
        </div><!-- /.row -->

        <hr id="general" class="hr-width mb-5 mt-5 pb-3">

        <div class="row">
            <div class="col-lg-12 col-xl-12 pb-3">
                <h6 class="font-bold pb-1 text-center green-text">General</h6>
                <h4 class="mb-4 font-bold dark-grey-text text-center">
                    <strong>ダンスに興味がある。イベントを知りたい。誰でも利用できます。</strong>
                </h4>
                <p class="dark-grey-text">
                    ダンスを見るのが好き、これからダンスをしようと思っている、どんなイベントがあるのか知りたい。
                    ダンスに関することに興味があるのなら、dancerootsを利用しましょう。音楽やダンスに関するたくさんの情報を
                    皆で共有し、良いインスパイアを受けてください。
                </p>
                <p>
                    <?= $this->Html->link('新規登録', ['controller' => 'Users', 'action' => 'signup'],
                        ['class' => 'btn btn-success btn-block mb-3']
                    ) ?>
                </p>
            </div><!-- /.col-lg-12 -->
        </div><!-- /.row -->
    </section>
</div><!-- /.container -->
