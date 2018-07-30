<?php
    $this->assign('description',
        'ストリートダンスを始める際に、まず必要なのは「ストリートダンス仲間を見つけること」です。仲間という存在は沢山の良い影響を与えてくれます。ダンス初心者の方は練習よりも、まずは仲間を求めて、スタジオやサークルを探すのも良いかもしれません。');
    $this->assign('title', 'ストリートダンス仲間を探そう');
?>
<div class="row mt-5">
</div>
<div class="jumbotron mt-4 pt-4 text-center">

    <p class="text-left m-0">
        <span class="badge success-color">初級</span>
    </p>
    <h1 class="card-title h2-responsive mt-2"><strong>ストリートダンス仲間を探そう</strong></h1>
    <p class="blue-text mb-4 font-bold">Find street dancer friends</p>
    <hr>

    <div class="d-flex justify-content-center">
        <div class="card-text text-left mb-3" style="max-width: 43rem;">
        <p>
            あなたがストリートダンスと出会ったキッカケは何でしょうか？アーティスト、ダンス動画の影響や、友人や知り合いなど何かあなたとつながりがある人の影響でダンスを始めた方も多くいるかと思います。
        </p>
        <p>
            もし、あなたが一人でストリートダンスを始め、今は動画などを研究しているとすれば、まずは<strong class="font-weight-bold">ダンス仲間、友達を探すこと</strong>が先決です。
        </p>
        <p>
            なぜなら初期の段階からダンス活動を一人で何年もしていくことは不可能に近いからです。まずダンスチームを組めませんし、ソロでバトルのみ出場、または舞台ダンサーという手もあるでしょうが、やはりチームに所属している方が大半でしょう。
        </p>
        <p>
            ストリートダンスだけに捉われず「仲間」という存在はあなたに色んな影響を与えます。悩んだ時は助け合い、また、良きライバルとしてお互いを高め合える存在になりやすいでしょう。
        </p>
        <p>
            人間関係のもつれも時にはあるでしょうが、そのデメリット(デメリットも後にメリットになることばかり)よりもメリットの方が確実に多いと断言できます。
        </p>
        <p>
            もし、一人でダンスをしているのでしたら、近隣でサークルを探す、もしくはスタジオに習いにいけば、自然と知り合いや友人ができるものです。
        </p>
        <p>
            ちなみに筆者は学生の頃に友達の影響でストリートダンスを始めました。なので自然に仲間はいましたし、その時は自然と一緒に練習をしていました。
        </p>
        <p>
            過去を振り返っても、やはり一人でダンスをするということは考えにくいことだと思います。学生時代にダンスを始めるのは社会人になってからよりも、最初から友達がいるというメリットが大きいです。
        </p>
        <p>
            あなたがダンス初心者であれば、ダンス仲間はこの先何年にもわたって
            支え合えることができる存在です。
        </p>
        <p>
            なにはともあれ、一番最初はダンス練習よりも<strong class="font-weight-bold">友達、仲間を見つけること</strong>にしましょう。
        </p>
        </div>
    </div>

    <ul class="list-group">
        <li class="list-group-item active"><i class="fa fa-hand-o-right" aria-hidden="true"></i> ポイント</li>
        <li class="list-group-item">最初からダンス活動を一人で行うには大変難しい。ダンスチームも組めない。</li>
        <li class="list-group-item">ダンスを始めるキッカケは人それぞれ。どんな環境でも、まずダンス仲間を探すこと。</li>
        <li class="list-group-item">仲間はあなたの成長の糧になる可能性大。デメリットよりもメリットの方が多い。</li>
    </ul>
    <hr class="my-4">

    <?= $this->Html->link('<i class="fa fa-home mr-1" aria-hidden="true"></i> 目次</button>',
        ['controller' => 'Lectures', 'action' => 'index/#contents'],
        ['class' => 'btn btn-blue waves-effect', 'escape' => false]
    ) ?>
    <?= $this->Html->link('次へ <i class="fa fa-arrow-circle-right ml-1"></i>',
        ['controller' => 'Lectures', 'action' => 'initialPractice'],
        ['class' => 'btn btn-outline-primary waves-effect', 'escape' => false]
    ) ?>
</div><!-- /.jumbotron -->
