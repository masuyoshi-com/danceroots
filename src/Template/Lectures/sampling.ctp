<?php
    $this->assign('description',
        'ストリートダンスの上達にはHipHopがサンプリング主体で大きくなってきたように、ダンスもストリートダンサーからサンプリングすることが大事です。そこから自分なりの使える動き、使えない動きの判断ができるようになり、ダンスの上達につながります。');
    $this->assign('title', 'とりあえずサンプリングする');
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
    <h1 class="card-title h2-responsive mt-2"><strong>とりあえずサンプリングする</strong></h1>
    <p class="blue-text mb-4 font-bold">I will sample it for the time being</p>
    <hr>

    <div class="d-flex justify-content-center">
        <div class="card-text text-left mb-3" style="max-width: 43rem;">
            <p>
                HipHopの音楽の基はサンプリングを中心にして音源・ループを作り、トラックの上にラップを乗せて、現在まで様々な形で表現されてきました。
            </p>
            <p>
                これはストリートダンスにも当てはまることで、ダンスの上達を進めていくには、基礎の練習を基盤としながら、様々なストリートダンサー達から動きをサンプリングすることです。<br>
                <small><span class="red-text">※</span>サンプリングがわからない人は<a href="https://ja.wikipedia.org/wiki/%E3%82%B5%E3%83%B3%E3%83%97%E3%83%AA%E3%83%B3%E3%82%B0" target="_blank">wiki</a>を参照。</small>
            </p>
            <p>
                ストリートダンスはHipHopの3大要素(<small>現在は4大要素とも言いますが</small>)の一つです。どんな競技や手に職をつけるような職業でも、上達していくには先駆者をお手本として学んでいくものです。
            </p>
            <p>
                一部「まね」と取り間違える人がいますが、筆者は全く「まね」とは考えていません。なぜなら、沢山の動きを吸収することで、その延長線上に初めてオリジナルが生まれるからです。
            </p>
            <p>
                「無」から作り出すことは到底不可能です。必ず何かベースになるものがなければいけません。ダンス上級者でもオリジナルスタイルは難しい壁ですが、上級者になるまでに必ずお手本とする動きがあって上級者になるわけです。
            </p>
            <p>
                <strong class="font-weight-bold">どんどんサンプリングして、動きを吸収していくことです。</strong>
            </p>
            <p>
                そうした中で自分の動きとして、使えるもの、使えないものの判断ができるようになります。あなたが「使えるもの」として判断した動きがあなたのダンスセンスです。
            </p>
            <p>
                特にダンスショーの時など、<br>
                <br>
                「こういうものを見ているんだな」<br>
                「こういうものが好きなんだな」<br>
                <br>
                ということを伝えさせることが大切です。<br>
            </p>
            <p>
                一番よくないのが「何をしたいのかわからない」という伝わり方です。何が好きかわからない。自分はこうだというものがない。自分の意見がないような伝わり方をします。
            </p>
            <p>
                自分がしたい・やりたいことがダンスで伝わることで、次のステップへ進むことができます。それは見ている側に「おーっ」という気持ちを盛り上げることができた時です。
            </p>
            <p>
                トップダンサーになるまで道は遠く感じるかもしれませんが、<strong class="font-weight-bold">ダンスが好きで信念を持てば必ず人に認められる時が来ます。</strong>また、そこからがスタートだということを忘れてはいけません。
            </p>
        </div>
    </div>

    <ul class="list-group">
        <li class="list-group-item active"><i class="fa fa-hand-o-right" aria-hidden="true"></i> ポイント</li>
        <li class="list-group-item">ダンスの練習は基礎を中心にして、徐々にたくさんの動きをさサンプリングしていくこと。</li>
        <li class="list-group-item">自分にとって、使える動き・使えない動きの判断ができるまで研究をやめないこと。</li>
        <li class="list-group-item">人に「何がしたいかわからない」と伝わるのが一番よくないことを理解する。</li>
    </ul>

    <hr class="my-4">

    <?= $this->Html->link('<i class="fa fa-arrow-circle-left mr-1" aria-hidden="true"></i> 前へ</button>',
        ['controller' => 'Lectures', 'action' => 'continueDancing'],
        ['class' => 'btn btn-blue waves-effect', 'escape' => false]
    ) ?>
    <?= $this->Html->link('次へ <i class="fa fa-arrow-circle-right ml-1"></i>',
        ['controller' => 'Lectures', 'action' => 'streetdanceVideo'],
        ['class' => 'btn btn-outline-primary waves-effect', 'escape' => false]
    ) ?>
</div><!-- /.jumbotron -->
