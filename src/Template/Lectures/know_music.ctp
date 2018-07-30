<?php
    $this->assign('description',
        'ストリートダンスをマスターするためには、音楽を深く知ることは重要です。ダンスが好きで努力できることは当然です。他のダンサーと差をつけ、リスペクトを受けるには他のHipHop要素を知ることも重要だということです。音楽を知ることによって、ダンスショーケース時の選曲にも影響します。たくさん興味を持って勉強するようにしましょう。');
    $this->assign('title', '音楽を知る');
?>
<div class="row mt-5">
</div>
<div class="jumbotron mt-4 pt-4 text-center">

    <p class="text-left m-0">
        <?= $this->Html->link('<span class="badge pink"><i class="fa fa-home" aria-hidden="true"></i> 目次</span>',
            ['controller' => 'Lectures', 'action' => 'index/#contents-2'],
            ['escape' => false]
        ) ?>

        <span class="badge deep-purple ml-1">中級</span>
    </p>
    <h1 class="card-title h2-responsive mt-2"><strong>音楽を知る</strong></h1>
    <p class="purple-text mb-4 font-bold">Know the music</p>
    <hr>

    <div class="d-flex justify-content-center">
        <div class="card-text text-left mb-3" style="max-width: 43rem;">
            <p>
                ストリートダンスはHipHopの三大要素(現在は4大要素 - MC、DJ、ブレイクダンス、グラフィティ)の一つです。
                <small>
                    <?= $this->Html->link('HipHop - wiki参照', 'https://ja.wikipedia.org/wiki/%E3%83%92%E3%83%83%E3%83%97%E3%83%9B%E3%83%83%E3%83%97', ['target' => '_blank']) ?>
                </small>
            </p>
            <p>
                音楽が無ければ、ダンスは成り立ちません。それは皆が認知していることでしょう。
            </p>
            <p>
                ですが、多くのストリートダンサー達は「ダンスが好き」または「ダンス界が好き」なのであって、「HipHop(音楽や他の要素)」をあまり深く知ろうとはしません。
            </p>
            <p>
                「あのダンスチームの使ってた曲がかっこよかった。その曲が流れると踊りたくなる。」これはダンスをしていれば誰もが経験する感覚です。
            </p>
            <p>
                好きなダンサーが使ってた曲だからかっこよく聞こえ、その曲を知る。ただし、聴いたことがあるだけで、「アーティストが誰で、誰がプロデューサーで、、」という所まで知ろうとする人は意外に少ないです。音楽を知る良いキッカケですので、そこまで調べることが大切です。
            </p>
            <p>
                トップダンサーになるための条件としてダンスが上手であることは当たり前です。周りのダンサー達からもリスペクトを受けるためには、音楽を深く知ることも大切です。
            </p>
            <p>
                筆者個人としてはむしろ、音楽を深く知る方が重要だと考えています。当時、筆者も音楽は聴いていても、アーティストや、DJ、トラックメイカー達のことは知りませんでした。興味はストリートダンスが中心でした。
            </p>
            <p>
                ある時、自分を育ててくれた先輩に指摘されました。
            </p>
            <p>
                「ダンスは上手だと思うが、ただそれだけ」<br>
                「10ある内ダンスが9で音楽は1ぐらいしかない。それはダンスだけが好きなダンサーと同じ。俺はかっこいいとは思わない」
            </p>
            <p>
                ひどく落ち込みましたが、それはすごく的を得ていたアドバイスでした。
            </p>
            <p>
                それからというもの、週末になるとレコード店へ足を運んでは新譜をチェックしたり、(<small><span class="red-text">※</span>レコード店少なくなりましたが...現在ではAppleMusicなど</small>)音楽の本を読んでみたり、アーティストや、自分が踊りたくなるトラックを作るプロデューサーを探してみたり、たくさん知らなかったことを勉強するようになりました。
            </p>
            <p>
                音楽を深く知ることは、ダンスショーで使う音源、選曲にも影響します。ダンスを本当の意味で上手くなるためには、音楽を知る・聴くセンスも深めなければいけません。
            </p>
            <p>
                ちなみに音楽は自分のお金を出して買う方が、不思議とアーティストやプロデューサーを覚えるのが早いです。自分に投資するつもりでたくさん音楽を聴くようにしましょう。
            </p>
        </div>
    </div>

    <ul class="list-group">
        <li class="list-group-item active"><i class="fa fa-hand-o-right" aria-hidden="true"></i> ポイント</li>
        <li class="list-group-item">ストリートダンスが好きなのは当然。ダンスは音楽から生まれたことを深く知ること。</li>
        <li class="list-group-item">ダンスだけが好きなダンサーは多い。その中から抜きん出るためには、他の要素が必要である。</li>
        <li class="list-group-item">音楽を知るためには自分に投資するつもりでお金を使う。音楽を知ることはダンサーとしての深みが増す。</li>
    </ul>

    <hr class="my-4">

    <?= $this->Html->link('<i class="fa fa-arrow-circle-left mr-1" aria-hidden="true"></i> 前へ</button>',
        ['controller' => 'Lectures', 'action' => 'variation'],
        ['class' => 'btn btn-blue waves-effect', 'escape' => false]
    ) ?>
    <?= $this->Html->link('次へ <i class="fa fa-arrow-circle-right ml-1"></i>',
        ['controller' => 'Lectures', 'action' => 'clothing'],
        ['class' => 'btn btn-outline-primary waves-effect', 'escape' => false]
    ) ?>
</div><!-- /.jumbotron -->
