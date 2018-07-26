<?php
    $this->assign('description',
        'ストリートダンスを始めて間もない頃は、感性においても素人である場合が多いです。あなたが最初に「良い」と感じたものは必ず、ストリートダンスと日々過ごしていく中で変化していきます。その対象を最初から自分で決めてしまい、固定観念に縛られると、ダンス上達の妨げる可能性が高くなります。センスは必ず良くなります。あなたが良いと思うものは変化していきますので、特定のストリートダンサーを目指すよりも、あなたがいかにストリートダンサーとして成長するかを考えるようにしましょう。');
    $this->assign('title', '最初にかっこいいと思うダンサーを本当は目指すべきではない');
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
    <h1 class="card-title h2-responsive mt-2"><strong>最初にかっこいいと思うダンサーを本当は目指すべきではない</strong></h1>
    <p class="blue-text mb-4 font-bold">You should not really aim for the first dancers who think it's cool</p>
    <hr>

    <div class="d-flex justify-content-center">
        <div class="card-text text-left mb-3" style="max-width: 43rem;">
            <p>
                ダンスを始めて間もない頃は、ダンスの見るもの全てを新鮮に感じるものです。最初に「ああいう風になりたい」「あんな人になりたい」という一種の憧れの目を持っている方も多いのではないでしょうか？
            </p>
            <p>
                ストリートダンス初心者の方にアドバイスできることの一つとして、<br>
                <br>
                「<strong class="font-weight-bold">あなたが一番最初に影響されたダンサーを最終目標にしてはならない</strong>」<br>
                <br>
                ということが言えます。
            </p>
            <p>
                どんなカテゴリの世界にいる人でも、大体においてセンスは磨かれるものです。「センス」とは抽象的ですが、その世界の「素人、玄人」では恐らく「良い」と判断できる対象が違ってきます。
            </p>
            <p>
                ダンス初心者の場合、最初は誰でも「素人」ですし、ダンスを見る目においても素人です。それが月日によって色んな経験を学び、実生活の一部として馴染んでいく中で、スキルが成長していきます。
            </p>
            <p>
                あなたのストリートダンスのセンスは必ず良くなります。あなたの「素人の目(センス)」が強い時期に良いと感じたものは本当に月日が経っても良いのでしょうか？
            </p>
            <p>
                少数ですが元々センスが良い人はいます。ですが、大多数の方が最初から物事の本質を捉えれる人は多くありません。
            </p>
            <p>
                あなたが最初に良いと感じたものは、ダンスの練習になる材料としては多いに利用すべきです。ただ、最終目標がそこであれば、あなたはそのダンサー以上にはなれません。自分の限界を無意識の内に自分で決めることになりかねないのです。
            </p>
            <p>
                広い見方をすれば、あなたが憧れているダンサーより、違う形であっても優れた点は必ず持ち合わせているものです。自分で思い込み、固定観念を作らずに、柔軟に広い目、フラットな目を持ってダンス活動していくことが大切です。
            </p>
        </div>
    </div>

    <ul class="list-group">
        <li class="list-group-item active"><i class="fa fa-hand-o-right" aria-hidden="true"></i> ポイント</li>
        <li class="list-group-item">ダンス経験初期の頃に「良い」と感じるものは、ポップなものである場合が多い。その対象に捉われ過ぎないこと。</li>
        <li class="list-group-item">センスは必ず磨かれる。ストリートダンスにおいてもそれは同じ。</li>
        <li class="list-group-item">本質的なものを見分ける力を最初から持ち合わせることは難しい。見分ける力も努力が必要である。</li>
    </ul>

    <hr class="my-4">

    <?= $this->Html->link('<i class="fa fa-arrow-circle-left mr-1" aria-hidden="true"></i> 前へ</button>',
        ['controller' => 'Lectures', 'action' => 'variousDancers'],
        ['class' => 'btn btn-blue waves-effect', 'escape' => false]
    ) ?>
    <?= $this->Html->link('次へ <i class="fa fa-arrow-circle-right ml-1"></i>',
        ['controller' => 'Lectures', 'action' => 'foundation'],
        ['class' => 'btn btn-outline-primary waves-effect', 'escape' => false]
    ) ?>
</div><!-- /.jumbotron -->
