<?php
    $this->assign('description',
        '周りにストリートダンス仲間がたくさんいる時は、ダンス練習も楽しいもので、あまり苦に感じないかもしれません。ですが、数年後には必ず環境が変わります。環境が変わることでダンスを続けていくかどうかの選択を迫られる場合も多いでしょう。あなたのストリートダンスへの意思はいずれ試される時がきます。周りがダンスをやめていっても、ダンスを続けていく意思は必ず必要です。');
    $this->assign('title', '周りがダンスをやめていってもあなたは続けられるか');
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
    <h1 class="card-title h2-responsive mt-2"><strong>周りがダンスをやめていってもあなたは続けられるか</strong></h1>
    <p class="blue-text mb-4 font-bold">Whether you can continue even if the surroundings stop dancing</p>
    <hr>

    <div class="d-flex justify-content-center">
        <div class="card-text text-left mb-3" style="max-width: 43rem;">
            <p>
                学生の人などダンスを始めたばかりの頃は、仲間が多くて楽しいひと時を過ごせる場が多いでしょう。ダンス仲間と楽しく練習できることは素晴らしいことです。
            </p>
            <p>
                実際、その時はあまり先のことを考えず、時間が過ぎていくことは自然のことかもしれません。
            </p>
            <p>
                ですが、良く考えてください。5年後も同じ環境・状態が続くと思いますか？
            </p>
            <p>
                自分の中で便りにしていた存在の先輩や仲間がダンスをやめるかもしれません。また、学校を卒業して、社会人になり、仕事が忙しくてダンスが出来ない人も出てくるでしょう。
            </p>
            <p>
                もし、ストリートダンスのトップダンサーになるのが夢や目標であるならば、<strong class="font-weight-bold">どんな環境の中でもダンスを続けていく意思はありますか？</strong>
            </p>
            <p>
                学生の頃は多くの場合、親に守られているため、自由に自分の時間が使えます。すなわち、ダンス練習が良くできますし、自分の好きなことに集中できます。その渦中にいる時は自分がそんなありがたい日々や時間の中にいることも中々気付けないものです。
            </p>
            <p>
                あなたが学生であれば、または今は自由に自分の時間を使えているのであれば、それらは当たり前でないことにまず気付けるかどうかで将来が変わってきます。
            </p>
            <p>
                時間と共に環境は変わります。これは誰も避けることができません。<strong class="font-weight-bold">環境がどう変わってもあなたの信念が揺るぐことがなければ、ストリートダンサーとしての道は必ず開かれていくことでしょう。</strong>
            </p>
            <p>
                筆者自身においても、学生時代は同世代のダンス仲間だけで約30～40人はいました。ですが、数年後には続けていたのは大体数人です。また数年後には筆者のみでした。
            </p>
            <p>
                ダンスインストラクターとして活動していた時期も、周りの生徒なども数えれば、合計で200～300人程はダンスを始めた人はいたと思います。
                ですが、やはりそのほとんどの人は様々な理由でやめていきます。
            </p>
            <p>
                無論、筆者もダンス活動をしなくなって10年以上は経つので、ダンスをやめていった、その他大勢の中に含まれるでしょう。それほど<strong class="font-weight-bold">環境の変化と継続というものは難しい</strong>ものなのです。<br>
                (<small><span class="red-text">※</span> ダンス歴10年以上になればあまり辞めるという概念も無くなってきますが。。ダンスも気が向いた時に踊ります。歴が長い人は本当に好きで続けてきたわけですから、ダンスも生活の一部の様な気がします。</small>)
            </p>
            <p>
                あなたがトップダンサーになるにはたくさんの壁を乗り越え、たくさんの要素を持たなければいけません。その一つに周りがダンスをやめていっても、あなたはダンスを貫ける意思を持たなければいけないということです。
            </p>
        </div>
    </div>

    <ul class="list-group">
        <li class="list-group-item active"><i class="fa fa-hand-o-right" aria-hidden="true"></i> ポイント</li>
        <li class="list-group-item">自由に自分の時間を使える環境であるならば、それは当たり前ではないことに気付くべき。</li>
        <li class="list-group-item">周りのダンサーがやめていっても、あなたはダンスを続けられる意思があるか試される時は必ずくる。</li>
        <li class="list-group-item">どんなに環境が悪くなっても、結局、続けるかどうかはあなた自身の意思で決まる。</li>
    </ul>

    <hr class="my-4">

    <?= $this->Html->link('<i class="fa fa-arrow-circle-left mr-1" aria-hidden="true"></i> 前へ</button>',
        ['controller' => 'Lectures', 'action' => 'foundation'],
        ['class' => 'btn btn-blue waves-effect', 'escape' => false]
    ) ?>
    <?= $this->Html->link('次へ <i class="fa fa-arrow-circle-right ml-1"></i>',
        ['controller' => 'Lectures', 'action' => 'sampling'],
        ['class' => 'btn btn-outline-primary waves-effect', 'escape' => false]
    ) ?>
</div><!-- /.jumbotron -->
