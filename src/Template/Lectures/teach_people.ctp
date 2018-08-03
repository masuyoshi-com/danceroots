<?php
    $this->assign('description',
        'あなたの知っていることを他人に教えていくことで、ストリートダンスは上達していきます。人に教えることができるということは、経験がないと教えることはできません。感覚で覚えていたことを細かく言葉にしてアウトプットしていくことで、自分の知識が確固たる物として体が覚えていきます。現代は共有の時代です。ダンスを上手くなりたいのであれば、誰かにダンスを教えてあげましょう。');
    $this->assign('title', '自分の知っていることを人に教える');
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
    <h1 class="card-title h2-responsive mt-2"><strong>自分の知っていることを人に教える</strong></h1>
    <p class="purple-text mb-4 font-bold">Teach people what you know</p>
    <hr>

    <div class="d-flex justify-content-center">
        <div class="card-text text-left mb-3" style="max-width: 43rem;">
            <p>
                ストリートダンサーとして経験を積むと、少なからず周りに教える機会がやってきます。それはダンスインストラクターとしてだけでなく、練習場所に新たにやってきたダンス仲間や後輩が存在するからです。
            </p>
            <p>
                ダンス中級者を逸脱するためには、「人に教える」ということも覚えなければいけません。自分が人に教えているようで、実は自分が勉強になっていることがほとんどだからです。
            </p>
            <p>
                教えてもらう相手もダンスを要領良く覚えれるメリットがありますし、あなたも人に教えることで教える技術が上がるのですから、実践しない手はありません。
            </p>
            <p>
                人に勿体ぶって何でも教えたがらない人がいますが、それは論外だと思います。人に親切に教えていくことは重要です。
            </p>
            <p>
                現代はたくさんのことを「共有する」時代です。できるだけあなたの知っていることを後からダンスを始めた人に教えるようにしましょう。
            </p>
            <p>
                ダンス初心者に教えることは大抵は基礎からでしょう。その基礎を細かく教えていく内に、言葉で説明することも多いはずです。
            </p>
            <p>
                ダンスの動きを言葉で説明する時に、<br>
                <br>
                「自分は知らない内にこんな事に気を使って練習していたんだな」<br>
                <br>
                ということに気づけることがあります。
            </p>
            <p>
                自分の言葉で動きを説明していく内に、あなた自身も教えた事柄をより深く理解するようになり、基礎が確固たるものになって覚えていきます。
            </p>
            <p>
                ダンス初心者の人は教えてもらったことは理解しているはずですが、そのニュアンスの動きに中々ならないものです。
            </p>
            <p>
                頭では理解できていても、体がついていかないのです。
            </p>
            <p>
                今はダンスインストラクターのスタジオ動画なども良くありますが、結局教えているインストラクターが一番上手です。生徒が自分の動きとして吸収し、負けないぐらい上手に踊っているケースは稀でしょう。
            </p>
            <p>
                教えてもらう側の人はダンスを教えてもらっても、<strong class="font-weight-bold">それを自分の物にできるかどうかは結局は自分次第</strong>です。
            </p>
            <p>
                教える側の人は元々それだけの練習を積んできているはずです。人に教えることによって、それが確固たる物になり、ダンス上達につながるのです。
            </p>
        </div>
    </div>

    <ul class="list-group">
        <li class="list-group-item active"><i class="fa fa-hand-o-right" aria-hidden="true"></i> ポイント</li>
        <li class="list-group-item">現代は「共有」の時代。自分の知っていることを何でも教えましょう。</li>
        <li class="list-group-item">人に教えているようで、実は自分が勉強になっている場合がほとんどだということに気づく。</li>
        <li class="list-group-item">人に教えてもらっても、それを「自分の動き」として吸収できるかどうかは、結局自分次第。</li>
    </ul>

    <hr class="my-4">

    <?= $this->Html->link('<i class="fa fa-arrow-circle-left mr-1" aria-hidden="true"></i> 前へ</button>',
        ['controller' => 'Lectures', 'action' => 'danceRoots'],
        ['class' => 'btn btn-blue waves-effect', 'escape' => false]
    ) ?>
    <?= $this->Html->link('次へ <i class="fa fa-arrow-circle-right ml-1"></i>',
        ['controller' => 'Lectures', 'action' => 'wallGame'],
        ['class' => 'btn btn-outline-primary waves-effect', 'escape' => false]
    ) ?>
</div><!-- /.jumbotron -->
