<?php
    $this->assign('description',
        'ストリートダンス上級者になるためには、ダンスの基礎を突き詰める必要があります。基礎の一つ一つの動きには奥深い要素があり、それらを体で覚えていくには少なくても数年は掛かるでしょう。');
    $this->assign('title', '基礎を突き詰める');
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
    <h1 class="card-title h2-responsive mt-2"><strong>基礎を突き詰める</strong></h1>
    <p class="blue-text mb-4 font-bold">Pursue the basics</p>
    <hr>

    <div class="d-flex justify-content-center">
        <div class="card-text text-left mb-3" style="max-width: 43rem;">
            <p>
                <a href="<?= $this->Url->build(['action' => 'initialPractice']) ?>">練習の基本は基礎だけでよい</a>というお話をしましたが、初心者・中級者から抜け出すためには、基礎を突き詰めるということもしなければいけません。
            </p>
            <p>
                現在では一つの動きにもかなりの量があって最初の内は戸惑うかもしれません。ですが、基を辿れば基礎のバリエーションも少なく、物事をシンプルに考えることができます。情報過多になっている状況ではやはり原点をベースに考え、練習するようにした方が良いでしょう。
            </p>
            <p>
                ストリートダンスの上達において大切なのは、<br>
                <br>
                <strong class="font-weight-bold">「どれだけ動きを知っているかではなく、どれだけ一つの動きを突き詰めているか</strong>」<br>
                <br>
                です。
            </p>
            <p>
                突き詰める対象はもう言うまでもないかもしれませんが、ストリートダンスの「基礎」です。例えば、ウェーブはどうしたら綺麗に見えるのか、試行錯誤してダンスの基礎の軸から離れずに何万回でも練習するべきです。
            </p>
            <p>
                ポッピングにしても、打つ部位がたくさんありますし、打ち方にも種類があります。ですが、最初はたくさんの部位で打つ必要はありません。種類も気にしなくていいのです。一つずつ確実に打てるようにし、徐々に部位を増やしていく。
            </p>

            <p>
                練習の仕方に迷ったら、<strong class="font-weight-bold">シンプルに考え、シンプルに練習する。</strong>これが一番の近道です。
            </p>
            <p>
                上達が実感できれば、音楽に合わせてポップを打つ。できるだけキックやスネアにジャストしながら反動なく、できるだけ重たく。など。
            </p>
            <p>
                それを一曲ずっとブレなく続けることは、意外と難しいことです。
            </p>
            <p>
                逆に色々な動きを一気にやり過ぎる方が、体に染みつくまでにムラがありますし、中途半端に終わりかねません。
            </p>
            <p>
                <strong class="font-weight-bold">一つの事だけを考えて、それに集中するようにしましょう。</strong>
            </p>
            <p>
                ダンスの基礎を中心に一つの動きを突き詰めることができれば、新しい動きの吸収が早くなります。それはたくさんの動きをより早く正しく吸収することができるということです。
            </p>
            <p>
                動きをたくさん知ることも大切ですが、結局、天秤にかけると基礎を突き詰める方の優先順位が高くなるのです。
            </p>
            <p>
                そうした意識で練習を続けることで、たくさんの動きの点がつながり、あなたのダンススキルの底上げをしてくれるでしょう。
            </p>
        </div>
    </div>

    <ul class="list-group">
        <li class="list-group-item active"><i class="fa fa-hand-o-right" aria-hidden="true"></i> ポイント</li>
        <li class="list-group-item">たくさんの動きをどれだけ知ってるかより、一つに動きをどれだけ突き詰めているかの方が重要度が高い。</li>
        <li class="list-group-item">練習に迷いが生じたら、できる限りシンプルに考えること。</li>
        <li class="list-group-item">基礎の一つ一つは点として捉える。壁を越えていくことで、動きがつながり始めることに気づく。そこからの上達は早い。</li>
    </ul>

    <hr class="my-4">

    <?= $this->Html->link('<i class="fa fa-arrow-circle-left mr-1" aria-hidden="true"></i> 前へ</button>',
        ['controller' => 'Lectures', 'action' => 'notAiming'],
        ['class' => 'btn btn-blue waves-effect', 'escape' => false]
    ) ?>
    <?= $this->Html->link('次へ <i class="fa fa-arrow-circle-right ml-1"></i>',
        ['controller' => 'Lectures', 'action' => 'continueDancing'],
        ['class' => 'btn btn-outline-primary waves-effect', 'escape' => false]
    ) ?>
</div><!-- /.jumbotron -->
