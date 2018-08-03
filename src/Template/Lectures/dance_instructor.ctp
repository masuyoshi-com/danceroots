<?php
    $this->assign('description',
        'ダンスインストラクターとしてオファーいただけることは「認められつつある」ということになります。それを自覚し、自信を持って仕事を引き受ける様にしましょう。なぜなら、あなたのストリートダンサーとしての成長(メリット)しかないからです。仕事としてダンスを教えるのは、より厳格にプログラムを考えた上で実行するようにしましょう。');
    $this->assign('title', 'ダンスインストラクターになる');
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
    <h1 class="card-title h2-responsive mt-2"><strong>ダンスインストラクターになる</strong></h1>
    <p class="deep-orange-text mb-4 font-bold">Become a dance instructor</p>
    <hr>

    <div class="d-flex justify-content-center">
        <div class="card-text text-left mb-3" style="max-width: 43rem;">
            <p>
                ダンス活動を続けていく中で、ダンスインストラクターとして仕事の話をいただく場合があります。インストラクターとしてのオファーが来るということは、その先方に「認められつつある」ということです。
            </p>
            <p>
                その期待に応えるように、話を引き受けるようにしましょう。それはダンスの仕事として、お金がもらえるだけではなく、あなたがダンサーとして上達できる話だからです。
            </p>
            <p>
                <?= $this->Html->link('人に教えることで、本当は自分が勉強になっている話', ['action' => 'teachPeople'], ['target' => '_blank']) ?>はしました。それ以外にダンスインストラクターという経歴を持つことができます。また、仕事としてお金が発生するわけですから、手を抜くことは許されません。
            </p>
            <p>
                不特定多数の生徒さんをあなたが引き受けるわけですから、より厳格な形でレッスンをしなければいけないでしょう。
            </p>
            <p>
                ストレッチから開始し、基礎、基礎応用、徐々にルーティンを混ぜる、最後は覚えたルーティンを気持ちよく皆で踊るなど、決められた時間内に「楽しかった」「ためになったからまた来たい」と満足してもらえるかどうかが課題です。
            </p>
            <p>
                それらのプログラムをあなたが自由に考え、実行しても良いのですから、ストリートダンサーとして絶好の上達の機会なのです。
            </p>
            <p>
                また、ダンスだけで生活をしていくことは現在でも難しいかもしれませんが、ストリートダンスの需要は昔よりも増えているはずです。ダンスだけで生活する環境を手に入れることができれば、より、ダンスに集中できるようになるでしょう。
            </p>
            <p>
                ダンス経験の浅い人に本当の意味でダンスを教えていくのは難しいことです。ただ踊り方を教えるだけでなく、ダンスに対する心構えや、様々な悩みを一緒に解決していくようなダンスインストラクターになれれば、一流のストリートダンサーとして認められる日は近づくでしょう。
            </p>
        </div>
    </div>

    <ul class="list-group">
        <li class="list-group-item active"><i class="fa fa-hand-o-right" aria-hidden="true"></i> ポイント</li>
        <li class="list-group-item">ダンスインストラクターのオファーが来るということは、「認められつつある」ということを自覚する。</li>
        <li class="list-group-item">練習で人に教えるのと、仕事として教えるのは、同じではない。より厳格にプログラムを組み、継続的に改善することを忘れないこと。</li>
        <li class="list-group-item">インストラクターとして踊り方を教えるだけでなく、生徒一人一人の悩みを解決できるようなインストラクターを目指そう。</li>
    </ul>

    <hr class="my-4">

    <?= $this->Html->link('<i class="fa fa-arrow-circle-left mr-1" aria-hidden="true"></i> 前へ</button>',
        ['controller' => 'Lectures', 'action' => 'professionalism'],
        ['class' => 'btn btn-blue waves-effect', 'escape' => false]
    ) ?>
    <?= $this->Html->link('次へ <i class="fa fa-arrow-circle-right ml-1"></i>',
        ['controller' => 'Lectures', 'action' => 'humility'],
        ['class' => 'btn btn-outline-primary waves-effect', 'escape' => false]
    ) ?>
</div><!-- /.jumbotron -->
