<?php
    $this->assign('description',
        '目標や夢を達成するために一つの事に集中することは欠かせません。もし、ストリートダンサーとして目標を達成しているのであれば、更に自分に磨きをかけるため、新しい分野の勉学を始めることも大切です。もう一つ武器があれば、人として更なる魅力が高まることは間違いありません。');
    $this->assign('title', 'ダンス以外にもう一つ武器を持つ')
?>
<div class="row mt-5">
</div>
<div class="jumbotron mt-4 pt-4 text-center">

    <p class="text-left m-0">
        <?= $this->Html->link('<span class="badge pink"><i class="fa fa-home" aria-hidden="true"></i> 目次</span>',
            ['controller' => 'Lectures', 'action' => 'index/#contents-3'],
            ['escape' => false]
        ) ?>

        <span class="badge deep-orange ml-1">上級</span>
    </p>
    <h1 class="card-title h2-responsive mt-2"><strong>ダンス以外にもう一つ武器を持つ</strong></h1>
    <p class="deep-orange-text mb-4 font-bold">Have another skills besides dance</p>
    <hr>

    <div class="d-flex justify-content-center">
        <div class="card-text text-left mb-3" style="max-width: 43rem;">
            <p>
                ストリートダンサーとして深みを増すためにはダンスだけに捉われるのではなく、HipHop文化自体に触れることが重要というお話は前回しました。
            </p>
            <p>
                それ以外にもできることなら、将来を見据え、人として「もう一つ武器」を持つことをお勧めします。武器というのは何か技術的なこと、また、それで生活ができるレベルまでのことを言います。
            </p>
            <p>
                好きなことだけで生活ができるのは幸せなことです。今はインターネットも確立され、様々なサービスが生まれ、好きなことで生きていく(<small>YouTuberではありませんが</small>)人が認められる世の中になりつつもあります。
            </p>
            <p>
                この傾向は今後もっと増えていくでしょうし、増えていくべきだと考えています。筆者自身も今まで培ってきたことの技術や意思がこのDancerootsというサービスに注がれ、皆に貢献していけるように、価値を認めてもらえるように努力し続ける必要があるわけです。<br>
                <small><span class="red-text">※</span>ぜひDancerootsのご利用お願いしますm(_ _)m</small>
            </p>
            <p>
                ストリートダンサーとして上級者になってくると活動は忙しくて、余裕がないかもしれません。それでも人生は長いものですから、将来を見据えて、生活をしていくため、自分自身の成長に向けて更なる武器を持つ努力をしてください。
            </p>
            <p>
                筆者がダンサーとして活動していた時によく周りから耳にしていたことは<br>
                <br>
                「<strong class="font-weight-bold">ダンスをとったら何もない人はダメだ</strong>」<br>
                <br>
                ということです。
            </p>
            <p>
                プロのストリートダンサーとして生活するために、真っすぐに一つの事に集中することを否定しているのではありません。一つの夢や目標を達成しつつ、満足せず、常に自分磨きを怠らずに新しいことを吸収していくことが大切です。若い時はそれが何を意味するのかよくわかりませんでしたが、今では「なるほど、そうだな」と思います。
            </p>
            <p>
                ストリートダンサーとして上級者になれば必ず次へ向かえる<strong class="font-weight-bold">心の器が広がるもの</strong>です。そこに新しい努力を注ぐことができるようになります。
            </p>
            <p>
                興味を持てる分野をもう一つ獲得することができれば、更に魅力ある人になれることは間違いありません。
            </p>
            <p>
                ダンス上級者になるまで努力できたのでしたら、努力とは何かと自分なりの確信と理解があるはずです。それを少しずつ違う分野にも充てるようにしましょう。
            </p>
        </div>
    </div>

    <ul class="list-group">
        <li class="list-group-item active"><i class="fa fa-hand-o-right" aria-hidden="true"></i> ポイント</li>
        <li class="list-group-item">ダンサーとしてだけに捉われるのではなく、個人として常に成長できるように、その環境を自分で作ること。</li>
        <li class="list-group-item">ダンス上級者になれば、次へ向かえる心の余裕ができる。その余裕を無駄にしないこと。</li>
        <li class="list-group-item">将来を見据え、違う世界の勉学を始めることは、あなたの人生の揺るがない基盤の一つとなる。</li>
    </ul>

    <hr class="my-4">

    <?= $this->Html->link('<i class="fa fa-arrow-circle-left mr-1" aria-hidden="true"></i> 前へ</button>',
        ['controller' => 'Lectures', 'action' => 'pierceStyle'],
        ['class' => 'btn btn-blue waves-effect', 'escape' => false]
    ) ?>
    <?= $this->Html->link('目次へ <i class="fa fa-arrow-circle-right ml-1"></i>',
        ['controller' => 'Lectures', 'action' => 'index/#contents-1'],
        ['class' => 'btn btn-outline-primary waves-effect', 'escape' => false]
    ) ?>
</div><!-- /.jumbotron -->
