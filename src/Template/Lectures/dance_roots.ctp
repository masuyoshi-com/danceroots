<?php
    $this->assign('description',
        'ストリートダンス中級者になり、上級者への道を上るためには、ストリートダンスのルーツを辿ることが大切です。先駆者達の知恵に触れることで、新しい現在のダンスに活かしていくことができるからです。現在のトップダンサーと肩を並べる、または差を縮めるためにはダンスのルーツに触れ、自分なりの吸収をすることでダンスの深みを出すことを意識してください。');
    $this->assign('title', 'ストリートダンスルーツを辿る');
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
    <h1 class="card-title h2-responsive mt-2"><strong>ストリートダンスルーツを辿る</strong></h1>
    <p class="purple-text mb-4 font-bold">Trace the history of street dance</p>
    <hr>

    <div class="d-flex justify-content-center">
        <div class="card-text text-left mb-3" style="max-width: 43rem;">
            <p>
                ストリートダンスを始めて約1～2年程は何を練習していても大抵は上達します。シンプルに基礎を中心にしたダンスを練習すれば良いだけです。
            </p>
            <p>
                ですが、毎日の練習はいずれマンネリ化を起こす時が来ます。それと同時に伸び悩む時期が来たりします。「伸び悩む時期」が来たということは、前に進んできたということを覚えておいてください。そして、ダンス中級者になる頃に必ず勉強し、吸収しておきたいことは、<br>
                <br>
                <strong class="font-weight-bold">「HipHop ストリートダンスのルーツを辿る」</strong><br>
                <br>
                ということです。
            </p>
            <p>
                ストリートダンスの原点を知ることで、先駆者の知恵を学ぶことができます。その知恵に触れておくことで、個々のダンサーとしての深みを増すことができます。
            </p>
            <p>
                ルーツを辿ることは、ダンスだけでなく、本質的な文化に触れるためにどんな世界でも重要なことです。
            </p>
            <p>
                ダンス活動をしている方は、現在のダンス界の情報や、状況は必ず触れることになります。周りより一歩先に行くためには、必ず過去を振り返り、現在に活かしていくことが重要です。
            </p>
            <p>
                ストリートダンス界も高齢化が進んでいますが、大元のトップダンサーの層はそんなに変わっていないでしょう。トップダンサー達は大体において自分のダンススタイルというものを確立していますが、最初からあったものではありません。ダンスを続けていく中で過去を振り返って(<small>意識・無意識は別にして</small>)勉強している人がほとんどだと思います。
            </p>
            <p>
                なぜ若い世代が完全に世代交代しないのでしょうか？
            </p>
            <p>
                それは、<br>
                <br>
                <strong class="font-weight-bold">伸びてくる若い人材がまだまだ少ない = ストリートダンスルーツを辿ることを知らない、または足らない</strong><br>
                <br>
                人が多いからではないでしょうか？
            </p>
            <p>
                ストリートダンスのルーツを勉強している人が、していない人との差が出るのはダンス界の状況を見ても明らかです。
            </p>
            <p>
                時折、YouTubeなどでストリートダンス動画を見ます。その中でも色んな若いダンサー達を見ましたが、昔から活動しているダンサーより上手であっても、インパクトは低いイメージがあります。
            </p>
            <p>
                <strong class="font-weight-bold">「上手であること、かっこいいこと、インパクトがあること」はまったく別の話です。</strong>
            </p>
            <p>
                どこに価値があるのかは、周りの人が決めること・認めることですが、上手であることの優先順位は玄人から見ると低いと思います。上手であることは表現する手段として必要なのは明白ですが、誰と誰を比較して上手なのかはさほど重要ではありません。表現が周りの人に伝わるぐらい上手なのであれば、そこからが重要なのです。
            </p>
            <p>
                あなたがトップダンサーとして活動していくためには、中級者になってからでもストリートダンスのルーツを知ることは決して忘れてはいけません。
            </p>
        </div>
    </div>

    <ul class="list-group">
        <li class="list-group-item active"><i class="fa fa-hand-o-right" aria-hidden="true"></i> ポイント</li>
        <li class="list-group-item">中級者以上になるためには必ず、ストリートダンス文化のルーツに触れておく必要がある。</li>
        <li class="list-group-item">先駆者達の知恵に触れ、吸収することで先駆者達との差を縮めることができる。</li>
        <li class="list-group-item">どの世界でも歴史を知ることは大切だということを忘れてはならない。</li>
    </ul>

    <hr class="my-4">

    <?= $this->Html->link('<i class="fa fa-arrow-circle-left mr-1" aria-hidden="true"></i> 前へ</button>',
        ['controller' => 'Lectures', 'action' => 'clothing'],
        ['class' => 'btn btn-blue waves-effect', 'escape' => false]
    ) ?>
    <?= $this->Html->link('次へ <i class="fa fa-arrow-circle-right ml-1"></i>',
        ['controller' => 'Lectures', 'action' => 'teachPeople'],
        ['class' => 'btn btn-outline-primary waves-effect', 'escape' => false]
    ) ?>
</div><!-- /.jumbotron -->
