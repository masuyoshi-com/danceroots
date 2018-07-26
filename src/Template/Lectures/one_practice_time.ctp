<?php
    $this->assign('description',
        'ストリートダンサーとして名が売れるようになると、仕事の依頼が増えてきます。週一回ペースのダンスショーケースはとても忙しいもので、中々自分一人の練習時間を得ることができません。ですが、上級者になってからの一人の練習時間は、自己を見直す意味でとても重要です。どんなに忙しくても、自分一人の練習時間は設けるようにしましょう。');
    $this->assign('title', 'ダンス活動で忙しくても自分一人の練習を設ける')
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
    <h1 class="card-title h2-responsive mt-2"><strong>ダンス活動で忙しくても自分一人の練習を設ける</strong></h1>
    <p class="deep-orange-text mb-4 font-bold">Even if you are busy with dance activities, you will set up your own exercise</p>
    <hr>

    <div class="d-flex justify-content-center">
        <div class="card-text text-left mb-3" style="max-width: 43rem;">
            <p>
                ストリートダンサーとして徐々に名が売れてくるようになると、忙しくなり、週一回かそれ以上のペースでダンスショーなどをこなさなければいけなくなる時が来ます。
                ダンスショーケースをするということは、言うまでもなく、音源を作り、ルーティンを考え、それを繰り返し練習しなければいけません。
            </p>
            <p>
                週一回ペースだと全く新しいルーティンと音源でショーをするのは時間が足らないかもしれません。現在はわかりませんが、ダンスショーケースの報酬に対し、資源(<small>時間・労力</small>)は中々見合ったものではないですが、自分やダンスチームの認知度を上げる機会ですので、頑張りたいところです。
            </p>
            <p>
                ダンス活動が忙しくなると、中々自分一人の練習の時間を割くことが難しくなります。特にダンスインストラクターだけで生活していれば、まだ時間があるかもしれません。皆がそうではなく、別の職業などで生活の糧としている場合は尚忙しいでしょう。
            </p>
            <p>
                そんな中でも、自分を鍛錬していくことの時間を作ることは重要です。それは広い目で見るとストリートダンサーとして、またダンスチームの生命線を伸ばすことにもつながるからです。
            </p>
            <p>
                できれば、数日に一度は自分の練習の時間を持つように努力してください。以外と頭をリセットできる場合も多く、ソロで踊る形を見直せてみたり、自分の踊りが何となくまた上達したと思える場合が多いです。
            </p>
            <p>
                一人の時間のダンス練習で、自分の精神面や満足度がリセットできれば、仲間と集まって練習する際に要領よくルーティンを考えやすくなります。考え込んでいた部分をふとクリアできることも多いでしょう。
            </p>
            <p>
                基礎を見直す時間もできれば作ることです。中級者以上になると、ダンスインストラクターで仕事をしていない限り、あまり基礎を繰り返し練習する機会も減っていきます。
            </p>
            <p>
                それをまた改めて見直してみると、中々楽しめたりするのでお勧めします。基礎がしっかりできている人は、自分の動き(<small>スタイル</small>)を発見している人も多いです。
            </p>
            <p>
                ダンス活動が忙しい時期に自分一人で練習することが苦に感じられるかもしれませんが、実際行動してみると楽しいこと、発見できることが多いので試してみましょう。
            </p>
        </div>
    </div>

    <ul class="list-group">
        <li class="list-group-item active"><i class="fa fa-hand-o-right" aria-hidden="true"></i> ポイント</li>
        <li class="list-group-item">上級者になればあらためて自己鍛錬が必要になる。忙しくても数日に一度は時間を作る努力をする。</li>
        <li class="list-group-item">自分一人のダンス練習時間は、楽しいことが多い。また、新たに発見できることもある。</li>
        <li class="list-group-item">上級者でダンス基礎を見直すことは更なる上達につながる。楽しく練習できるようにもなっているはず。</li>
    </ul>

    <hr class="my-4">

    <?= $this->Html->link('<i class="fa fa-arrow-circle-left mr-1" aria-hidden="true"></i> 前へ</button>',
        ['controller' => 'Lectures', 'action' => 'havingStyle'],
        ['class' => 'btn btn-blue waves-effect', 'escape' => false]
    ) ?>
    <?= $this->Html->link('次へ <i class="fa fa-arrow-circle-right ml-1"></i>',
        ['controller' => 'Lectures', 'action' => 'hiphopCulture'],
        ['class' => 'btn btn-outline-primary waves-effect', 'escape' => false]
    ) ?>
</div><!-- /.jumbotron -->
