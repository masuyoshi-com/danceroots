<?php
    $this->assign('description',
        'ダンスショーケース時には表現の一つとして、衣装を必ず決める様に心掛けることです。また、ストリートダンスは衣装をバッチリ決め過ぎてもいけません。少し「遊びの部分」を入れつつ、まとまりのある方が見ている側にかっこよく映る可能性は高くなります。また、普段から新しく、綺麗な服装に気を使うことで、より良く相手の好感度につながります。');
    $this->assign('title', '服装に気を使う');
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
    <h1 class="card-title h2-responsive mt-2"><strong>服装に気を使う</strong></h1>
    <p class="purple-text mb-4 font-bold">Be stylish</p>
    <hr>

    <div class="d-flex justify-content-center">
        <div class="card-text text-left mb-3" style="max-width: 43rem;">
            <p>
                ストリートダンス活動をしていくには、服装に気を使うことも大切なことです。カジュアルな服装は、フォーマルな服装より、一般的なイメージとして「きちっと、綺麗に」見えにくいです。ですので、できるだけ新しく綺麗な服装を心掛けましょう。人の好感度を上げることができます。自分を印象付ける大切な一つの方法です。
            </p>
            <p>
                カジュアルブランドでも人の好みがあります。どれが正解だということはありませんが、服装に気を使うことで、ファッションセンスも必ず上達します。自分が良いと思うものを、購入し、繰り返すことで自然と選ぶセンスも育まれます。
            </p>
            <p>
                ここでは、ダンスショーケースの時の服装にフォーカスしたいと思います。
            </p>
            <p>
                ダンスショーケースの時は必ず衣装を皆で話合い、決めるようにしましょう。適当にそれっぽい服装でいいじゃないか？といういい加減な決め方は避けましょう。
            </p>
            <p>
                曲にもよりますが、ばっちり決め過ぎてもストリートダンスのショーとしては不釣り合いかもしれません。少し遊びの部分があったりする方が良い印象を与えます。
            </p>
            <p>
                例えば、<br>
                「ジーンズの色と黒のTシャツ、靴は白で統一。帽子とTシャツのプリントは自由」
            </p>
            <p>
                という感じです。全部決め過ぎてもいけませんし、いい加減過ぎてもダンスのショーに締まりがありません。きちんと計算されている衣装の方が好印象を与え、ダンスチームとしての表現が伝わりやすくなります。
            </p>
            <p>
                若い年代は中々お金に余裕がない人も多いかもしれませんが、ダンスショーの時は費用を出すようにしましょう。きちんと「ダンスのショーをする」という意識がプロ意識につながっていきます。
            </p>
            <p>
                衣装の他にお金に余裕があれば、普段の服装からも常に気を使うようにしましょう。新しい服は気持ちが良いものです。個人の印象も大切です。周りの人はしっかりと見ているものです。
            </p>
            <p>
                服装のセンスは必ず上がっていくものです。費用を出しても無駄になることはありません。服選びの練習にもなりますので、惜しみなく自分に投資したいものです。
            </p>
        </div>
    </div>

    <ul class="list-group">
        <li class="list-group-item active"><i class="fa fa-hand-o-right" aria-hidden="true"></i> ポイント</li>
        <li class="list-group-item">ダンスショーケースの時は衣装を必ず決める様に心掛ける。</li>
        <li class="list-group-item">衣装はダンスの表現として見ている側に伝わりやすくなる。</li>
        <li class="list-group-item">新しく、綺麗な服装は自分のイメージをより良く相手に伝えることができる重要な要素。</li>
    </ul>

    <hr class="my-4">

    <?= $this->Html->link('<i class="fa fa-arrow-circle-left mr-1" aria-hidden="true"></i> 前へ</button>',
        ['controller' => 'Lectures', 'action' => 'knowMusic'],
        ['class' => 'btn btn-blue waves-effect', 'escape' => false]
    ) ?>
    <?= $this->Html->link('次へ <i class="fa fa-arrow-circle-right ml-1"></i>',
        ['controller' => 'Lectures', 'action' => 'danceRoots'],
        ['class' => 'btn btn-outline-primary waves-effect', 'escape' => false]
    ) ?>
</div><!-- /.jumbotron -->
