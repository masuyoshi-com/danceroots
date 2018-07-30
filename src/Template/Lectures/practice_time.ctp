<?php
    $this->assign('description',
        'ストリートダンス上達には、日々の練習は欠かせません。自分で決めた毎日の練習時間は守るようにしましょう。努力を習慣化することができていれば、どんな状況になっても継続的に行動しやすくなります。早い時期から習慣化することを意識しましょう。');
    $this->assign('title', '毎日決めた練習時間は守る');
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
    <h1 class="card-title h2-responsive mt-2"><strong>毎日決めた練習時間は守る</strong></h1>
    <p class="blue-text mb-4 font-bold">Stick with the schedule on a daily basic</p>
    <hr>

    <div class="d-flex justify-content-center">
        <div class="card-text text-left mb-3" style="max-width: 43rem;">
            <p>
                これはストリートダンサーとしてというよりも、私生活においてのリズムに近いかもしれません。自分が決めたダンスの練習時間は必ず守るようにしてください。
            </p>
            <p>
                学生の人などは友人と過ごす時間も多いはずです。
            </p>
            <p>
                「今日は友達の誘いがあるから練習は休みにしておこう。」<br>
                「気持ちが乗らないし、家でゆっくりしたいから、まあいいか。」
            </p>
            <p>
                こういった気持ちは誰にでもあるものです。ここで重要になってくるのが<strong class="font-weight-bold">ダンスの練習を一つの自分の生活習慣として馴染ませることができるかどうか</strong>です。
            </p>
            <p>
                少し用事が入ったから、練習はやめておく。その思考の癖がつくと、自然と練習を休みがちになります。しっかりと自分の中で優先順位をつける様にしましょう。

            </p>
            <p>
                多少、友達付き合いが悪くなっても、あなたの目標や夢に近づくための日々なのですから、最終的にあなたが損をする形をとってはいけません。
            </p>
            <p>
                練習はストリートダンス仲間とすることが多いでしょうから、練習に出かけることが億劫になることはあまりないでしょう。遊びに行く感覚で習慣化できている人も多いかもしれません。
            </p>
            <p>
                ただ、いつまでも現在の環境が続くとは限りません。
            </p>
            <p>
                どこかであなたがダンスの練習を(努力の)習慣化することに気付いていないと、一人になった時など、中々スムーズに練習することができないでしょう。
            </p>
            <p>
                逆にどんな環境でもしっかりと練習できている人は、日々自分の決めた習慣を実践できているということになり、ダンスの上達につながります。
            </p>
            <p>
                実社会においても同様のことが言えますが、私生活をしっかりと管理できている人は
                大きな成果を得られることが多いでしょう。もちろんそれはストリートダンスについても同様です。
            </p>
            <p>
                ダンス練習を習慣化できていれば、雨で練習場所が濡れていても、仲間がみんな休んでいても、
                休日でも、体が疲れていても、不思議とそんなに苦痛ではありません。
            </p>
            <p>
                そういった様々な日々を過ごして、ダンスは上達していくものです。
                また、努力とは何なのかを後になって体で実感できるのです。
            </p>
        </div>
    </div>

    <ul class="list-group">
        <li class="list-group-item active"><i class="fa fa-hand-o-right" aria-hidden="true"></i> ポイント</li>
        <li class="list-group-item">自分が決めた練習時間はそう簡単に変更すべきではない。</li>
        <li class="list-group-item">習慣化された努力は継続的で、精神的にも楽。早くから身に付けること。</li>
        <li class="list-group-item">どんな状況でも努力できる人は必ず何かの成果として形で現れる。</li>
    </ul>

    <hr class="my-4">

    <?= $this->Html->link('<i class="fa fa-arrow-circle-left mr-1" aria-hidden="true"></i> 前へ</button>',
        ['controller' => 'Lectures', 'action' => 'initialPractice'],
        ['class' => 'btn btn-blue waves-effect', 'escape' => false]
    ) ?>
    <?= $this->Html->link('次へ <i class="fa fa-arrow-circle-right ml-1"></i>',
        ['controller' => 'Lectures', 'action' => 'variousDancers'],
        ['class' => 'btn btn-outline-primary waves-effect', 'escape' => false]
    ) ?>
</div><!-- /.jumbotron -->
