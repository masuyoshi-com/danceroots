<?php
    $this->assign('description',
        'ストリートダンスショーケース、またはダンスコンテストに出場することは音源・ルーティーンが必要になります。これらの創作を繰り返し行うことで更なるダンスの上達が見込めます。最初は失敗が付きものです。気を落とすことなく、より多く挑戦できるようにしましょう。');
    $this->assign('title', 'ストリートダンスショーまたはコンテストに挑戦する');
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
    <h1 class="card-title h2-responsive mt-2"><strong>ストリートダンスショーまたはコンテストに挑戦する</strong></h1>
    <p class="purple-text mb-4 font-bold">Try to be on a street dance show or a contest</p>
    <hr>

    <div class="d-flex justify-content-center">
        <div class="card-text text-left mb-3" style="max-width: 43rem;">
            <p>
                ストリートダンサーである以上、やはり人前に出て、ダンスショーケースで自分を見せたい(<small>表現したい</small>)のは当然でしょう。むしろ、ダンスが好きで有名になりたい気持ちもあって当然ですし、日陰ばかりでは楽しくなくなるものです。
            </p>
            <p>
                ダンス初心者の時期は練習だけでも上達しますが、中級者になるとショーやコンテストで腕試しすることで上達することも間違いありません。
            </p>
            <p>
                ただ、失敗しても悔やむ必要はありません。最初の内は必ず失敗するものです。失敗を繰り返して伸びていくのです。
            </p>
            <p>
                筆者もよくダンスショーが終わった後にチームメンバーと反省会をしていました。皆、気持ちが沈んでいましたし、ネガティブな時間をよく共にしたものです。今となってはとても良い経験、思い出です。
            </p>
            <p>
                トップダンサーになるために近道などありません。誰でも必ず失敗する日がやってきて、それでも上手くなりたい、かっこよくなりたいという気持ちが自分を前に進めてくれるものです。
            </p>
            <p>
                今はダンスのレベル自体が上がっていますから、出場するのも少し億劫になる人もいるかもしれません。ですが、周りではなく、結局自分の目的達成のために行動することを忘れてはいけません。
            </p>
            <p>
                何かに出場することが決まったら、まず曲決めをしなければいけません。今はDJに頼まなくても、PCソフトなどで音源を作ることも可能でしょう。
            </p>
            <p>
                ですが、できればDJにお願いすることがベストです。なぜなら、「意見を聞ける」からです。自分達は音源を作るのにこう考えているが、それを聞いてあなたはどう思うか？という意見は重要です。
            </p>
            <p>
                ましてDJは音楽に詳しい人が多いものですから、たくさんの知識を共有することができます。
                音源を一緒に試行錯誤して、<strong class="font-weight-bold">起承転結をつけるよう</strong>に意識してください。<br>
                <small><span class="red-text">※</span>これも意外と出来る人少ないです。</small>
            </p>
            <p>
                音源を作る作業も数をこなすことで上達します。より多くのコンテスト出場の機会があれば積極的に行動しましょう。
            </p>
            <p>
                音源が決まったら、次はルーティンを考えましょう。
            </p>
            <p>
                音楽を聴いてどんなルーティンにするかイメージを膨らませることはできますか？これも最初から上手くはいかないはずです。たくさん悩む必要はあるでしょう。
            </p>
            <p>
                イメージが思い浮かぶまでに、自分達は「これが好き」というものがありますか？<strong class="font-weight-bold">何かをベースに取り組むこと</strong>はとても大切なことです。
            </p>
            <p>
                音楽をよく聴いて、どこでトラックの変化があるか紙に書き出すことも重要です。それに合わせて人の配置や、動きの変化を入れると音楽と合いやすくなります。
            </p>
            <p>
                ダンスのショーを成功させるには上級者にならないと難しいものです。成功とは、見ている人が「かっこいいな、すごいな、おもしろいな<small><span class="red-text">※</span>笑いではなく</small>」と感じさせることができるかどうかでしょう。
            </p>
            <p>
                ダンスショーをこなしていくことで、ダンス上達だけではなく、その他のスキルの上達にも役立ちます。ダンスを始めて中級に入ったら、上級者になるために、果敢に挑戦するようにしたいものです。
            </p>
        </div>
    </div>

    <ul class="list-group">
        <li class="list-group-item active"><i class="fa fa-hand-o-right" aria-hidden="true"></i> ポイント</li>
        <li class="list-group-item">最初の内は誰でもダンスのショーは失敗する。だが、失敗することで得られることも多い。</li>
        <li class="list-group-item">できるだけ音源はDJにお願いする。人とつながり、貴重の意見を聞ける場合が多い。</li>
        <li class="list-group-item">ルーティンは何かをベースにする。ただし、その根底には自分達の目指すスタイルがあることが重要。</li>
    </ul>

    <hr class="my-4">

    <?= $this->Html->link('<i class="fa fa-arrow-circle-left mr-1" aria-hidden="true"></i> 前へ</button>',
        ['controller' => 'Lectures', 'action' => 'wallGame'],
        ['class' => 'btn btn-blue waves-effect', 'escape' => false]
    ) ?>
    <?= $this->Html->link('次へ <i class="fa fa-arrow-circle-right ml-1"></i>',
        ['controller' => 'Lectures', 'action' => 'understandStyle'],
        ['class' => 'btn btn-outline-primary waves-effect', 'escape' => false]
    ) ?>
</div><!-- /.jumbotron -->
