<?php
    $this->assign('description',
        'ストリートダンスショーを全部コピーして覚えることは重要です。目的はダンスの動きの幅を広げるためです。強く影響されるためではないことに注意してください。コピーをする対象はストリートダンスのルーツと言われる人物を対象とすることが理想です。原点を辿ることで知識と教養が得られます。ぜひ実践してみましょう。');
    $this->assign('title', 'ストリートダンス動画と一緒に踊る');
?>
<div class="row mt-5">
</div>
<div class="jumbotron mt-4 pt-4 text-center">

    <p class="text-left m-0">
        <?= $this->Html->link('<span class="badge pink"><i class="fa fa-home" aria-hidden="true"></i> 目次</span>',
            ['controller' => 'Lectures', 'action' => 'index/#contents'],
            ['escape' => false]
        ) ?>

        <span class="badge success-color ml-1">初級</span>
    </p>
    <h1 class="card-title h2-responsive mt-2"><strong>ストリートダンス動画と一緒に踊る</strong></h1>
    <p class="blue-text mb-4 font-bold">Dance with street dance videos</p>
    <hr>

    <div class="d-flex justify-content-center">
        <div class="card-text text-left mb-3" style="max-width: 43rem;">
            <p>
                昔であればVHSビデオテープを流しながら、ダンスのショーやPVなどを参考にして練習材料にしていました。現在ではYouTubeなどで数多くのストリートダンス動画があります。練習材料としては申し分ないでしょう。
            </p>
            <p>
                ただ、たくさん動画があり過ぎて、何をコピーしたら良いのか判断が付きにくいのも事実です。全て覚えるのは時間が掛かる作業です。自分が好きなものから始めるのが一番モチベーションが続くでしょう。
            </p>
            <p>
                覚えたいダンスショーを丸々体に写すことを意識してください。ダンスチームであれば、誰をターゲットにしてコピーするかも決めればよいでしょう。
            </p>
            <p>
                一度ターゲットを決めたら、そのダンサーの癖もある程度は「まね」できるようになりましょう。実際、自分の癖になるまでやり続ける必要はありません。物まねができるということは、<strong class="font-weight-bold">あなたの動きの幅が大きく広がる</strong>ということです。
            </p>
            <p>
                ただし、間違っても、そのダンサーになりきろうとは思ってはいけません。バランスをとるために、好む、好まないは別にして自分が難しいと感じる振付をコピーすることも大切です。
            </p>
            <p>
                偏ったダンスは、あなたのダンスセンスを降下させます。あくまでも、コピーの目的はストリートダンスの動きの幅を広げるためです。
            </p>
            <p>
                同じジャンルの音楽のダンスでも、様々なスタイルがあります。現状では更に多くなっていることでしょう。ダンス自体がややこしく感じるのも事実です。
            </p>
            <p>
                筆者がオススメするのは、オールド・ミドルスクールです。<strong class="font-weight-bold">ストリートダンスの原点を参考にしていくことが、体に基礎と教養をもたらします。</strong>
            </p>
            <p>
                例えば、今ではレジェンドチームと呼ばれる「RockStedyCrew」は昔のダンスショーを見てみるとブレイキングやロック、ポッピングなどオールドスクールHipHop要素が強いです。そのショーから現在のHipHopに変化している部分も数多くあります。
            </p>
            <p>
                EliteForceなどの昔のダンスショーを見てるとRockStedyCrewから構成や、見せ方など強く影響されているのがわかります。何かをベースにし、それらをなぞっていくからこそ、オリジナルが生まれ、またそれらが変化していくのです。
            </p>
            <p>
                また、そうしたストリートダンスの見方ができるようになることは大切です。ルーツを知ることは自分のスタイルなどにも大きく影響し、深みを与えてくれるものです。
            </p>
            <p>
                現在のダンスは枝葉が多くなって、本質が昔よりも見えにくい状態になっていると言えるでしょう。ダンスを始めて間もないのであれば、尚さら最初からダンスのルーツに興味を持って辿るのは難しくなっているのかもしれません。
            </p>
            <p>
                ですが、間違いなくストリートダンス文化の歴史を参考にすることはあなたのためになります。例外はありますが、現在のトップダンサー達は何かしらの形でそれらを学んでいることは間違いないでしょう。
            </p>
        </div>
    </div>

    <ul class="list-group">
        <li class="list-group-item active"><i class="fa fa-hand-o-right" aria-hidden="true"></i> ポイント</li>
        <li class="list-group-item">最初はあなたの好きなダンスショーをそのままコピーできるように練習すれば良い。</li>
        <li class="list-group-item">コピーはあなたの動きの幅を広げるために行うことを理解する。強く影響されるためではない。</li>
        <li class="list-group-item">ルーツを辿ることが一番の練習になる。周り道のように感じる時もあるが必ずその努力は報われる。</li>
    </ul>

    <hr class="my-4">

    <?= $this->Html->link('<i class="fa fa-arrow-circle-left mr-1" aria-hidden="true"></i> 前へ</button>',
        ['controller' => 'Lectures', 'action' => 'sampling'],
        ['class' => 'btn btn-blue waves-effect', 'escape' => false]
    ) ?>
    <?= $this->Html->link('次へ <i class="fa fa-arrow-circle-right ml-1"></i>',
        ['controller' => 'Lectures', 'action' => 'noLonging'],
        ['class' => 'btn btn-outline-primary waves-effect', 'escape' => false]
    ) ?>
</div><!-- /.jumbotron -->
