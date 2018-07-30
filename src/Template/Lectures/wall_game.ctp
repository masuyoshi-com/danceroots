<?php
    $this->assign('description',
        'ストリートダンス中級者になると、ある程度のダンスの動きが出来てくるのが自然で、練習した成果が見えにくくなります。そうした中で日々を過ごしていると、前進していることを感じられずスランプ状態に陥ってしまう場合があります。その状態になるとまずはポジティブな状態に持っていくことが先決ですので、時には自分に休息を与えてあげることも重要になります。できるだけ気持ちをリセットできるようにリフレッシュをしましょう。');
    $this->assign('title', '壁にぶつかってからが勝負');
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
    <h1 class="card-title h2-responsive mt-2"><strong>壁にぶつかってからが勝負</strong></h1>
    <p class="purple-text mb-4 font-bold">Get over a plateau</p>
    <hr>

    <div class="d-flex justify-content-center">
        <div class="card-text text-left mb-3" style="max-width: 43rem;">
            <p>
                ストリートダンス中級者を過ぎた頃になってくると、伸び悩みスランプに陥ることがあります。筆者も伸び悩んでいる時期がありました。
            </p>
            <p>
                スランプ時は何を練習していても、上手くなっている気がしない。と感じる方も多いのではないでしょうか？
            </p>
            <p>
                本当はこうした壁にぶつかってからが勝負です。なぜなら、練習を積んできた努力の成果が感じられないため伸び悩むのですから、前進していることにつながるのです。(<small>努力して後戻りすることはありません。</small>)
            </p>
            <p>
                無理に練習する必要もありません。リフレッシュすることが先決です。ダンスも中級までこれたのであれば、継続して練習するコツもそろそろ自分なりに掴めてきている頃でしょう。
            </p>
            <p>
                気持ちが乗らないときは、他に楽しいことをしてみるのも一つの方法だと思います。一旦リセットを自分で行い、また再度出発することが大切です。
            </p>
            <p>
                自分だけが壁を感じている感覚に捉われることが多いですが、何かを目指す以上、人は誰でも経験することです。
            </p>
            <p>
                後を振り返ってみると、スランプに陥るときは大体において自分が更に成長できる手前に来ている場合が多いです。
            </p>
            <p>
                そのことに気付き、焦らずに前に進む努力をしましょう。
            </p>
            <p>
                おすすめとして、ダンスの壁を感じた中で練習する場合は、再度基礎の練習を見直すことです。
            </p>
            <p>
                基礎を見直しつつ、自分の精神面がポジティブのなるまでは忍耐との勝負です。個人差はあるでしょうが、ダンスは一日2～3時間の練習で1か月あれば、大体一歩先に上手くなれるものです。
            </p>
            <p>
                それが中級以上になってくると、ある程度の動きが出来るのが自然で、目に見えて成果が感じにくくなるため、伸び悩む状態になるのかもしれません。
            </p>
            <p>
                ただ、練習・努力した分は必ず自分に返ってくるので、それを忘れてはいけません。壁にぶつかっていると感じたら、焦らず着実に前に進めるようにしてください。
            </p>
        </div>
    </div>

    <ul class="list-group">
        <li class="list-group-item active"><i class="fa fa-hand-o-right" aria-hidden="true"></i> ポイント</li>
        <li class="list-group-item">時には休息することも大切。気持ちをリセットして、次に進めるように自分をいたわる。</li>
        <li class="list-group-item">中級以上になると、ダンススキルの伸び率が見えにくくなる。よって壁を感じるようになる。</li>
        <li class="list-group-item">上手くなったかどうかが問題ではなく、着実に努力できているかどうかが重要であることに気付く。</li>
    </ul>

    <hr class="my-4">

    <?= $this->Html->link('<i class="fa fa-arrow-circle-left mr-1" aria-hidden="true"></i> 前へ</button>',
        ['controller' => 'Lectures', 'action' => 'teachPeople'],
        ['class' => 'btn btn-blue waves-effect', 'escape' => false]
    ) ?>
    <?= $this->Html->link('次へ <i class="fa fa-arrow-circle-right ml-1"></i>',
        ['controller' => 'Lectures', 'action' => 'challengeContest'],
        ['class' => 'btn btn-outline-primary waves-effect', 'escape' => false]
    ) ?>
</div><!-- /.jumbotron -->
