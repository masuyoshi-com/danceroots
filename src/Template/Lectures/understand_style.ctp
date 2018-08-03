<?php
    $this->assign('description',
        'ストリートダンス中級者以上になると、大体「好きなスタイル」が固まってきます。そうすると、他のダンサーのスタイルに興味を持たなくなり、何も学ばなくなってしまう可能性が高くなります。好きなスタイルを追及することは大切なことですが、常に他のダンサーから学ぶ姿勢を失わないようにしましょう。');
    $this->assign('title', '他のダンサーのスタイルを理解する');
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
    <h1 class="card-title h2-responsive mt-2"><strong>他のダンサーのスタイルを理解する</strong></h1>
    <p class="purple-text mb-4 font-bold">Respect other dancers’ style</p>
    <hr>

    <div class="d-flex justify-content-center">
        <div class="card-text text-left mb-3" style="max-width: 43rem;">
            <p>
                ストリートダンスには同じジャンルでも幅広くスタイルが存在します。皆それぞれが「かっこいいと思うもの」をベースにダンスのショーをします。
            </p>
            <p>
                よくありがちなのは、その内に自分とは違うスタイルのダンサーに興味を持たなくなることです。興味を持たないでいると、吸収するものがありません。
            </p>
            <p>
                中級以上になると自分のスタイルを突き詰めることも重要ですが、自分とは違うスタイルのダンサーを理解することでダンサーとしての幅が広がります。
                また、違うスタイルは一種の情報交換でもあります。「こんな考え方もある」ということを知るのは重要です。
            </p>
            <p>
                このダンスチームがやりたいことは何なのか？何が伝わってくるのか？
            </p>
            <p>
                など、他のダンスショーを見ながら感じることは良い勉強になります。
            </p>
            <p>
                ストリートダンスのスタイルに「何が正しいのか」という答えはありません。皆それぞれが試行錯誤して、リスペクトし合い、好きなことを表現するのは素晴らしいことです。
            </p>
        </div>
    </div>

    <ul class="list-group">
        <li class="list-group-item active"><i class="fa fa-hand-o-right" aria-hidden="true"></i> ポイント</li>
        <li class="list-group-item">ダンス中級者以上になると、ある程度「好きなもの」が固まってくる。</li>
        <li class="list-group-item">好きなものは自分のスタイルのベースになるが、他のスタイルにも興味を持ち、理解すること。</li>
        <li class="list-group-item">他の人のダンスショーは上級者になっても参考になる。何が伝わってくるか感じること。</li>
    </ul>

    <hr class="my-4">

    <?= $this->Html->link('<i class="fa fa-arrow-circle-left mr-1" aria-hidden="true"></i> 前へ</button>',
        ['controller' => 'Lectures', 'action' => 'challengeContest'],
        ['class' => 'btn btn-blue waves-effect', 'escape' => false]
    ) ?>
    <?= $this->Html->link('次へ <i class="fa fa-arrow-circle-right ml-1"></i>',
        ['controller' => 'Lectures', 'action' => 'professionalism'],
        ['class' => 'btn btn-outline-primary waves-effect', 'escape' => false]
    ) ?>
</div><!-- /.jumbotron -->
