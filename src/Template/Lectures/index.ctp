<?php
    $this->assign('description', 'ストリートダンス初心者のための読んで学ぶWebダンス講座はストリートダンスを始めてからトップダンサーになるまでに必要な意志とは何なのか。誰もが悩むであろう壁の向き合い方など、ストリートダンスについてのアドバイスです。');
    $this->assign('title', 'ストリートダンス初心者のための読んで学ぶWebダンス講座');
?>

<section class="magazine-section my-4 pt-5">
    <h2 class="h2-responsive font-weight-bold text-center my-4">
        <i class="fa fa-book" aria-hidden="true"></i> 読んで学ぶWebストリートダンス講座
    </h2>
    <h6 class="text-center">はじめに</h6>
    <hr>
    <p class="w-responsive mx-auto">
        様々なきっかけでストリートダンサーとして活動を始め、熟練者になるためには何に気づき、どうすればトップダンサーと肩を並べることができるのか。日々練習を重ねる中で「自分は向いていないのではないか」「上達するにはどうしたらいいのか」そんな不安や悩みを抱えている方は多いのではないでしょうか。
    </p>
    <p class="w-responsive mx-auto">
        この読んで学ぶWEB講座はそうした悩みを少しでも解決することができればという思いで筆者が経験を交えて記事にしています。世の中には同じ人が二人いないように、不思議とダンスもあなたと同じスタイルを持つ人は本当はいないものです。
    </p>
    <p class="w-responsive mx-auto">
        要はそれに気づき、スタイルを掴むまで努力できるかどうか。そこに全てが掛かっているといっても過言ではありません。読むだけではダンスは上達しません。ですが、意識を変えることは可能です。ダンスの練習も、ショータイムも「意識、意志」の違いで人との違いを出すことができると筆者は考えています。
    </p>
    <p class="w-responsive mx-auto">
        読み進めていく上で参考にできる・できないは賛否両論あると思いますが、参考にできる部分だけ参考にしてください。「読んで学ぶWEBストリートダンス講座」は筆者独自の考えに基づいたものであることを予めご了承ください。
    </p>
    <hr>
    <div class="row">
        <div class="col-lg-4 col-md-12 mb-lg-0 mb-5">
            <div id="contents" class="single-news mb-3">
                <div class="view overlay rounded z-depth-2 mb-4">
                    <?= $this->Html->image('lectures/j-dilla500×500.jpg', ['class' => 'img-fluid w-100', 'alt' => 'HipHopアーティストJDilla']) ?>
                    <a>
                        <div class="mask rgba-white-slight"></div>
                    </a>
                </div><!-- view -->
                <div class="row mb-3">
                    <div class="col-12">
                        <a href="#!">
                            <span class="badge success-color">初級編</span>
                        </a>
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    <div class="col-11 text-truncate pl-0 mb-3">
                        <?= $this->Html->link('ストリートダンス仲間を探そう', ['action' => 'dancefriend'], ['class' => 'font-weight-bold']) ?>
                    </div>
                    <a><i class="fa fa-angle-double-right"></i></a>
                </div>
            </div><!-- /.single-news -->

            <div class="single-news mb-3">
                <div class="d-flex justify-content-between">
                    <div class="col-11 text-truncate pl-0 mb-3">
                        <?= $this->Html->link('初期練習はダンスの基礎だけでよい', ['action' => 'initialPractice']) ?>
                    </div>
                    <a><i class="fa fa-angle-double-right"></i></a>
                </div>
            </div><!-- /.single-news -->

            <div class="single-news mb-3">
                <div class="d-flex justify-content-between">
                    <div class="col-11 text-truncate pl-0 mb-3">
                        <?= $this->Html->link('毎日決めた練習時間は守る', ['action' => 'practiceTime']) ?>
                    </div>
                    <a><i class="fa fa-angle-double-right"></i></a>
                </div>
            </div><!-- /.single-news -->

            <div class="single-news">
                <div class="d-flex justify-content-between">
                    <div class="col-11 text-truncate pl-0">
                        <?= $this->Html->link('色んなストリートダンサーを見る', ['action' => 'variousDancers']) ?>
                    </div>
                    <a><i class="fa fa-angle-double-right"></i></a>
                </div>
            </div><!-- /.single-news -->

            <div class="single-news">
                <div class="d-flex justify-content-between">
                    <div class="col-11 text-truncate pl-0">
                        <?= $this->Html->link('最初にかっこいいと思うダンサーを本当は目指すべきではない', ['action' => 'notAiming']) ?>
                    </div>
                    <a><i class="fa fa-angle-double-right"></i></a>
                </div>
            </div><!-- /.single-news -->

            <div class="single-news mb-3">
                <div class="d-flex justify-content-between">
                    <div class="col-11 text-truncate pl-0 mb-3">
                        <?= $this->Html->link('基礎を突き詰める', ['action' => 'foundation']) ?>
                    </div>
                    <a><i class="fa fa-angle-double-right"></i></a>
                </div>
            </div><!-- /.single-news -->

            <div class="single-news">
                <div class="d-flex justify-content-between">
                    <div class="col-11 text-truncate pl-0">
                        <?= $this->Html->link('周りがダンスをやめていってもあなたは続けられるか？', ['action' => 'continueDancing']) ?>
                    </div>
                    <a><i class="fa fa-angle-double-right"></i></a>
                </div>
            </div><!-- /.single-news -->

            <div class="single-news">
                <div class="d-flex justify-content-between">
                    <div class="col-11 text-truncate pl-0">
                        <?= $this->Html->link('とりあえずサンプリングする', ['action' => 'sampling']) ?>
                    </div>
                    <a><i class="fa fa-angle-double-right"></i></a>
                </div>
            </div><!-- /.single-news -->

            <div class="single-news">
                <div class="d-flex justify-content-between">
                    <div class="col-11 text-truncate pl-0">
                        <?= $this->Html->link('ストリートダンス動画と一緒に踊る', ['action' => 'streetdanceVideo']) ?>
                    </div>
                    <a><i class="fa fa-angle-double-right"></i></a>
                </div>
            </div><!-- /.single-news -->

            <div class="single-news">
                <div class="d-flex justify-content-between">
                    <div class="col-11 text-truncate pl-0">
                        <?= $this->Html->link('ダンスインストラクターに過剰な憧れは禁物', ['action' => 'noLonging']) ?>
                    </div>
                    <a><i class="fa fa-angle-double-right"></i></a>
                </div>
            </div><!-- /.single-news -->
        </div><!-- /.col-lg-4 -->

        <div class="col-lg-4 col-md-6 mb-md-0 mb-5">
            <div id="contents-2" class="single-news mb-3">
                <div class="view overlay rounded z-depth-2 mb-4">
                    <?= $this->Html->image('lectures/2pac500×500.jpg', ['class' => 'img-fluid w-100', 'alt' => 'HipHopアーティスト2Pac']) ?>
                    <a>
                    <div class="mask rgba-white-slight"></div>
                    </a>
                </div>

                <div class="row mb-3">
                    <div class="col-12">
                        <a href="#!">
                            <span class="badge deep-purple">中級編</span>
                        </a>
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <div class="col-11 text-truncate pl-0 mb-3">
                        <?= $this->Html->link('ルーティン・バリデーションを考える', ['action' => 'validation'], ['class' => 'font-weight-bold']) ?>
                    </div>
                    <a><i class="fa fa-angle-double-right"></i></a>
                </div>
            </div><!-- /.single-news -->

            <div class="single-news mb-3">
                <div class="d-flex justify-content-between">
                    <div class="col-11 text-truncate pl-0 mb-3">
                        <?= $this->Html->link('音楽を知る', ['action' => 'knowMusic']) ?>
                    </div>
                    <a><i class="fa fa-angle-double-right"></i></a>
                </div>
            </div><!-- /.single-news -->

            <div class="single-news mb-3">
                <div class="d-flex justify-content-between">
                    <div class="col-11 text-truncate pl-0 mb-3">
                        <?= $this->Html->link('服装に気を使う', ['action' => 'clothing']) ?>
                    </div>
                    <a><i class="fa fa-angle-double-right"></i></a>
                </div>
            </div><!-- /.single-news -->

            <div class="single-news mb-3">
                <div class="d-flex justify-content-between">
                    <div class="col-11 text-truncate pl-0 mb-3">
                        <?= $this->Html->link('ストリートダンスルーツを辿る', ['action' => 'danceRoots']) ?>
                    </div>
                    <a><i class="fa fa-angle-double-right"></i></a>
                </div>
            </div><!-- /.single-news -->

            <div class="single-news">
                <div class="d-flex justify-content-between">
                    <div class="col-11 text-truncate pl-0">
                        <?= $this->Html->link('自分の知っていることを人に教える', ['action' => 'teachPeople']) ?>
                    </div>
                    <a><i class="fa fa-angle-double-right"></i></a>
                </div>
            </div><!-- /.single-news -->

            <div class="single-news">
                <div class="d-flex justify-content-between">
                    <div class="col-11 text-truncate pl-0">
                        <?= $this->Html->link('壁にぶつかってからが勝負', ['action' => 'wallGame']) ?>
                    </div>
                    <a><i class="fa fa-angle-double-right"></i></a>
                </div>
            </div><!-- /.single-news -->

            <div class="single-news">
                <div class="d-flex justify-content-between">
                    <div class="col-11 text-truncate pl-0">
                        <?= $this->Html->link('ストリートダンスショーまたはコンテストに挑戦する', ['action' => 'challengeContest']) ?>
                    </div>
                    <a><i class="fa fa-angle-double-right"></i></a>
                </div>
            </div><!-- /.single-news -->

            <div class="single-news">
                <div class="d-flex justify-content-between">
                    <div class="col-11 text-truncate pl-0">
                        <?= $this->Html->link('他のダンサーのスタイルを理解する', ['action' => 'understandStyle']) ?>
                    </div>
                    <a><i class="fa fa-angle-double-right"></i></a>
                </div>
            </div><!-- /.single-news -->

        </div><!-- /.col-lg-4 -->

        <div class="col-lg-4 col-md-6 mb-0">
            <div id="contents-3" class="single-news mb-3">
                <div class="view overlay rounded z-depth-2 mb-4">
                    <?= $this->Html->image('lectures/public-enemy450×450.jpg', ['class' => 'img-fluid w-100', 'alt' => 'HipHopアーティストPublicEnemy']) ?>
                    <a>
                        <div class="mask rgba-white-slight"></div>
                    </a>
                </div>
                <div class="row mb-3">
                    <div class="col-12">
                        <a href="#!"><span class="badge deep-orange">上級編</a>
                    </div>
                </div><!-- /.row -->

                <div class="d-flex justify-content-between">
                    <div class="col-11 text-truncate pl-0 mb-3">
                        <?= $this->Html->link('プロ意識を持つ', ['action' => 'professionalism'], ['class' => 'font-weight-bold']) ?>
                    </div>
                    <a><i class="fa fa-angle-double-right"></i></a>
                </div>
            </div><!-- /.single-news -->

            <div class="single-news mb-3">
                <div class="d-flex justify-content-between">
                    <div class="col-11 text-truncate pl-0 mb-3">
                        <?= $this->Html->link('ダンスインストラクターになる', ['action' => 'danceInstructor']) ?>
                    </div>
                    <a><i class="fa fa-angle-double-right"></i></a>
                </div>
            </div><!-- /.single-news -->

            <div class="single-news mb-3">
                <div class="d-flex justify-content-between">
                    <div class="col-11 text-truncate pl-0 mb-3">
                        <?= $this->Html->link('謙虚であること', ['action' => 'humility']) ?>
                    </div>
                    <a><i class="fa fa-angle-double-right"></i></a>
                </div>
            </div><!-- /.single-news -->

            <div class="single-news mb-3">
                <div class="d-flex justify-content-between">
                    <div class="col-11 text-truncate pl-0 mb-3">
                        <?= $this->Html->link('自分のスタイルを持つ', ['action' => 'havingStyle']) ?>
                    </div>
                    <a><i class="fa fa-angle-double-right"></i></a>
                </div>
            </div><!-- /.single-news -->

            <div class="single-news">
                <div class="d-flex justify-content-between">
                    <div class="col-11 text-truncate pl-0">
                        <?= $this->Html->link('ダンス活動で忙しくても自分一人の練習を設ける', ['action' => 'onePracticeTime']) ?>
                    </div>
                    <a><i class="fa fa-angle-double-right"></i></a>
                </div>
            </div><!-- /.single-news -->

            <div class="single-news">
                <div class="d-flex justify-content-between">
                    <div class="col-11 text-truncate pl-0">
                        <?= $this->Html->link('HipHop文化自体に触れる', ['action' => 'hiphopCulture']) ?>
                    </div>
                    <a><i class="fa fa-angle-double-right"></i></a>
                </div>
            </div><!-- /.single-news -->

            <div class="single-news">
                <div class="d-flex justify-content-between">
                    <div class="col-11 text-truncate pl-0">
                        <?= $this->Html->link('自分のスタイルを貫く', ['action' => 'pierceStyle']) ?>
                    </div>
                    <a><i class="fa fa-angle-double-right"></i></a>
                </div>
            </div><!-- /.single-news -->

            <div class="single-news">
                <div class="d-flex justify-content-between">
                    <div class="col-11 text-truncate pl-0">
                        <?= $this->Html->link('ダンス以外にもう一つ武器を持つ', ['action' => 'haveWeapon']) ?>
                    </div>
                    <a><i class="fa fa-angle-double-right"></i></a>
                </div>
            </div><!-- /.single-news -->

        </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->
</section>
