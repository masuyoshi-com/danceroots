<?php
    $this->assign('description',
        'ある特定の分野で人に認められ、称賛されると、自信過剰になってしまう人がいます。それはストリートダンスでも同じです。ダンスはチームとして活動していくことが基本です。チーム内にそうした人が一人でもいるとチームが崩壊する可能性があるので、皆で指摘し合えるような人間関係を築けるよう心掛けることが大切です。');
    $this->assign('title', '謙虚であること');
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
    <h1 class="card-title h2-responsive mt-2"><strong>謙虚であること</strong></h1>
    <p class="deep-orange-text mb-4 font-bold">Be humble</p>
    <hr>

    <div class="d-flex justify-content-center">
        <div class="card-text text-left mb-3" style="max-width: 43rem;">
            <p>
                ストリートダンスが上達するにつれ、徐々に自信が心の中に沸いてくるものです。「ダンスが上手い」ということは、自分が自信をもって人に言える「得意分野」があるということです。
            </p>
            <p>
                人に注目され、認められ、チヤホヤされ始めると、自信過剰になる人が出てきます。自信過剰になってしまうと、無意識の内に人の話を聞くことができなくなり、その延長線上に待っているのは<strong class="font-weight-bold">人としての成長の停滞</strong>と、<strong class="font-weight-bold">人間関係が崩れる可能性</strong>です。
            </p>
            <p>
                ストリートダンスの多くは「ダンスチーム」として活動していくものです。自分一人の力だけではなく、皆の努力と協力があってこそ、ダンス活動をしていけることを忘れてはいけません。
            </p>
            <p>
                約10年以上前からいるダンスチームが今も活動しているのを見ると関心します。何をリスペクトするかといえば、一番は同じメンバーと一緒に活動していることです。
                長い年月の間、何かを目指すということは、意見の相違が発生するのは当然でしょう。人間関係がギクシャクする時が必ずあるはずだからです。
            </p>
            <p>
                たくさんの困難があっても乗り越え、一緒にダンスチームとして練習し、苦楽を共にしていくことは大変です。継続して活動していくことは簡単ではないため素晴らしいことです。
            </p>
            <p>
                ダンス仲間の中に傲慢な人がいれば崩壊に向かう可能性があります。指摘できる人間関係を築けるかどうかは自分自身にかかっていると考えましょう。皆で助け合って、常に謙虚にふるまえるよう努力すべきです。
            </p>
            <p>
                得意なこと・ある一つの分野の実力があり、人に認められると変貌する人は多いです。あなたはこのことに気づき、<strong class="font-weight-bold">本当はそこからがスタートだということを忘れてはいけません</strong>。
            </p>
            <p>
                少し広い目で考えてみれば、特定の分野が得意であっても、一歩違う世界へ足を踏み入れれば、誰でも素人です。たくさんの人々が得意なこと、色んな世界で仕事をしているから今日の社会が回っていることを自覚しましょう。
            </p>
            <p>
                一度溝にはまってしまうと、せっかくあなたの資源(<small>大切な時間)</small>を一生懸命に捧げて努力してきたダンスを諦めてしまいかねない事態になりかねないのです。どんな時でも初心忘れず、謙虚であることです。
            </p>
        </div>
    </div>

    <ul class="list-group">
        <li class="list-group-item active"><i class="fa fa-hand-o-right" aria-hidden="true"></i> ポイント</li>
        <li class="list-group-item">「得意分野」があるということはあなたの自信につながる。だが自信過剰にならないようにすべき。</li>
        <li class="list-group-item">ダンスはチームとして成り立つ場合がほとんど。まず自分のチームを大切にできるかどうかが重要。</li>
        <li class="list-group-item">人に認められてからが本当のスタートであるということを忘れてはいけない。常に謙虚であること。</li>
    </ul>

    <hr class="my-4">

    <?= $this->Html->link('<i class="fa fa-arrow-circle-left mr-1" aria-hidden="true"></i> 前へ</button>',
        ['controller' => 'Lectures', 'action' => 'danceInstructor'],
        ['class' => 'btn btn-blue waves-effect', 'escape' => false]
    ) ?>
    <?= $this->Html->link('次へ <i class="fa fa-arrow-circle-right ml-1"></i>',
        ['controller' => 'Lectures', 'action' => 'havingStyle'],
        ['class' => 'btn btn-outline-primary waves-effect', 'escape' => false]
    ) ?>
</div><!-- /.jumbotron -->
