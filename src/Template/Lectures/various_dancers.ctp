<?php
    $this->assign('description',
        '様々なストリートダンサーを研究することで、ダンスの「見る目」が養われ、ダンス上達につながります。ダンスを始めて間もない内はできるだけ沢山のストリートダンサーを見るようにしましょう。また、各ダンサーの良い部分、悪い部分を意識して見ていくことです。良い部分だけを学ぶ様にし、ダンスの練習に役立ててください。');
    $this->assign('title', '色んなストリートダンサーを見る');
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
    <h1 class="card-title h2-responsive mt-2"><strong>色んなストリートダンサーを見る</strong></h1>
    <p class="blue-text mb-4 font-bold">Watch various street dancers</p>
    <hr>

    <div class="d-flex justify-content-center">
        <div class="card-text text-left mb-3" style="max-width: 43rem;">
            <p>
                ストリートダンスを始めたきっかけは、あるダンサーの影響から始めたくなった人も多いかと思います。他の人のダンスショーを見ることはとても良いことです。目を通して頭で学び、あなたのダンス練習に反映されやすくなるからです。
            </p>
            <p>
                ダンスを始めた最初の時期(<small><span class="red-text">※</span>大体1～3年程</small>)は偏った人だけでなく、あまり興味がなくても、できるだけ沢山のストリートダンサーを見る様にしましょう。
            </p>
            <p>
                数をこなすことで、各ダンサーの良い部分や悪い癖が見える様になります。それらが見える様になれば、あなたがダンスの見る目(<small>センス</small>)が良くなってきた証拠です。また、良い部分だけをあなたが学ばしてもらうのです。
            </p>
            <p>
                できれば、自分のジャンルとは違う、他のジャンルのストリートダンサーも参考にしましょう。ストリートダンス上級者の表現力(<small>グルーヴみたいなもの</small>)はジャンルを問わず人に伝わるものがあります。それらを自分に取り入れるにはどうすればいいのかを考えることも良いことです。<strong class="font-weight-bold">感じ方、考え方一つで可能性は無限大</strong>です。
            </p>
            <p>
                色んなストリートダンサーの研究を最初の数年は欠かさないことです。ダンスの見る目は磨かれるものです。それがあなたのダンスにも影響していきます。
            </p>
            <p>
                ダンス上級者になるにつれ、最終的には自身のスタイルを掘り続ければ良い時期がくるものです。しかし、偏ったものしか見ていない人、見るべきものを見ていない人は、やはり学んでいる人より不利になるでしょう。
            </p>
            <p>
                誤解を恐れなく言えば、ダンスを始めた初心者の内は沢山のストリートダンサーを見ていても、のちに本当に見るべきものは自然と絞られていくものです。<small><span class="red-text">※</span>絞られる対象も個人のセンスによります。</small>
            </p>
            <p>
                ダンス上級者になるまでは色んなストリートダンサーを研究し、学び、自分に活かせる姿勢を忘れないようにすべきです。それらが実践できれば、ストリートダンスの上達は早いものになるでしょう。
            </p>
        </div>
    </div>

    <ul class="list-group">
        <li class="list-group-item active"><i class="fa fa-hand-o-right" aria-hidden="true"></i> ポイント</li>
        <li class="list-group-item">ストリートダンス初心者は見る目を養うため、より多くのダンサーを見る方が良い。</li>
        <li class="list-group-item">ストリートダンサーの研究を続ければ、月日が経つにつれ、自然と見る対象は絞られてくる。</li>
        <li class="list-group-item">様々なストリートダンサーの良いと思う所を学ぶようにすれば、ダンスの上達も早い。</li>
    </ul>

    <hr class="my-4">

    <?= $this->Html->link('<i class="fa fa-arrow-circle-left mr-1" aria-hidden="true"></i> 前へ</button>',
        ['controller' => 'Lectures', 'action' => 'practiceTime'],
        ['class' => 'btn btn-blue waves-effect', 'escape' => false]
    ) ?>
    <?= $this->Html->link('次へ <i class="fa fa-arrow-circle-right ml-1"></i>',
        ['controller' => 'Lectures', 'action' => 'notAiming'],
        ['class' => 'btn btn-outline-primary waves-effect', 'escape' => false]
    ) ?>
</div><!-- /.jumbotron -->
