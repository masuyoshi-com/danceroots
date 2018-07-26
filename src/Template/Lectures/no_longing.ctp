<?php
    $this->assign('description',
        'ストリートダンス初学者の時、気を付けておきたいことは、「憧れの人物に対しての依存性」です。例えばダンススタジオなどに通い始めた時、自分が習いたいというダンスインストラクターに教わるでしょう。憧れである人であればある程、「その人の様になりたい」という願望が強くなり、自分の個性を潰しかねない状況になることは避けなければいけません。');
    $this->assign('title', 'ダンスインストラクターに過剰な憧れは禁物');
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
    <h1 class="card-title h2-responsive mt-2"><strong>ダンスインストラクターに過剰な憧れは禁物</strong></h1>
    <p class="blue-text mb-4 font-bold">Excessive longing for dance instructor is not permitted</p>
    <hr>

    <div class="d-flex justify-content-center">
        <div class="card-text text-left mb-3" style="max-width: 43rem;">
            <p>
                ダンススクールに行くのであれば、目標とするダンサーに習いたいと多くの人は思うことでしょう。動き方のコツを教えてもらい、あなたの上達を手助けしてくれるものです。また、仲間が増えるチャンスでもあります。
            </p>
            <p>
                ただし、ダンススクールに通い始めると、そこでの「世界、社会」が存在し、インストラクターは先生です。生徒と先生の間には必ずと言ってよい程、上下関係があるものです。
            </p>
            <p>
                「先生の言うことは間違っていない」と思う思考回路があなたの意思や主張を弱くしてしまう可能性もあることを気付かなければいけません。
            </p>
            <p>
                先生を目指して練習するのはかまいませんが、トップダンサー達と肩を並べるには、<strong class="font-weight-bold">先生に対しての憧れや、先入観、依存を捨てなければいけません</strong>。
            </p>
            <p>
                ストリートダンス初学者の多くの方がこの状態に陥りやすく、良い意味で「クレイジーさ」が足りません。好きなインストラクターに習い続けることで、もっとファンになる。そこから先生を眺めているだけでは、その先生と同等になることすら難しくなります。
            </p>
            <p>
                勘違いしないでほしいのは、「反抗するべきだ」と言っているわけではありません。
                <strong class="font-weight-bold">フラットな目を持つことが大切だ</strong>と述べているのです。
            </p>
            <p>
                ファンであることは決して悪いことではありません。先生に尊敬の念は持つべきです。その傍ら、ダンスをしている以上はライバルでもあります。
            </p>
            <p>
                人間社会としてダンスインストラクターに先輩であることを踏まえた接し方は当然です。それができなければ他の社会でも上手くやっていくことはできないでしょう。
            </p>
            <p>
                要は<strong class="font-weight-bold">教えてもらっている以上、そのダンスインストラクター以上にならないといけないという強い意識を持つべきだ</strong>ということです。
            </p>
            <p>
                憧れの人に対し依存性は必要ありません。あなたがストリートダンスを極めたいと思うのであれば、そうした意識も必要なのです。
            </p>
        </div>
    </div>

    <ul class="list-group">
        <li class="list-group-item active"><i class="fa fa-hand-o-right" aria-hidden="true"></i> ポイント</li>
        <li class="list-group-item">ダンススクールやスタジオに習いに行くのは容量良く上達するため。また、仲間を増やすためである。</li>
        <li class="list-group-item">好きなインストラクターを目標にして良いが、最終目標ではないことに気付いておく。</li>
        <li class="list-group-item">人に対しての依存性は自分の個性を潰しかねない。あなたの個性を忘れないでおくこと。</li>
    </ul>

    <hr class="my-4">

    <?= $this->Html->link('<i class="fa fa-arrow-circle-left mr-1" aria-hidden="true"></i> 前へ</button>',
        ['controller' => 'Lectures', 'action' => 'streetdanceVideo'],
        ['class' => 'btn btn-blue waves-effect', 'escape' => false]
    ) ?>
    <?= $this->Html->link('次へ <i class="fa fa-arrow-circle-right ml-1"></i>',
        ['controller' => 'Lectures', 'action' => 'validation'],
        ['class' => 'btn btn-outline-primary waves-effect', 'escape' => false]
    ) ?>
</div><!-- /.jumbotron -->
