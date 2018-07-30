<?php
    $this->assign('description',
        'ダンス中級者になる頃に、練習の一つとして取り入れたい事柄は「ルーティン・バリエーション」です。最初の内は何かをベースに考えていくことが重要です。何もない所からルーティンを生み出すことは中々良いものになりにくいでしょう。ルーティンにおいても数をこなしていくことで、より音楽に合った振付を考えることができる様になります。');
    $this->assign('title', 'ルーティン・バリエーションを考える');
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
    <h1 class="card-title h2-responsive mt-2"><strong>ルーティン・バリエーションを考える</strong></h1>
    <p class="purple-text mb-4 font-bold">Think about routines and variation</p>
    <hr>

    <div class="d-flex justify-content-center">
        <div class="card-text text-left mb-3" style="max-width: 43rem;">
            <p>
                ストリートダンスの基礎練習を重ねていくと、徐々にバリエーションの多さに気付くと思います。バリエーションもある程度体に馴染ませるには時間と労力が必要ですが、それ以上の練習としてバリエーションを自分で考える様にしてみましょう。
            </p>
            <p>
                ダンスの基礎は大切な基盤です。無理に変える必要はありません。一つのルーティンとして基礎を応用し、自分なりの組み合わせの変化などを考えてください。
            </p>
            <p>
                VHSビデオテープ時代はバックダンサーやPVの少しのダンス部分しか材料がなく、全てのダンスを見たくても見れませんでした。その数コマの動きをコピーし、創造を膨らませ、ルーティンに応用していたものです。
            </p>
            <p>
                それが一つの動きにバリエーションを考えるということです。
            </p>
            <p>
                昔はダンスの材料となる情報が少なかったので、そのことはストリートダンスをする人にとって逆に良かったと考えています。今は情報過多の時代。いくらでも世界のストリートダンス動画を見ることができます。それは便利で良い反面、本質を判断しにくくなります。
            </p>
            <p>
                たくさんの情報に惑わされる前に、できるだけ<strong class="font-weight-bold">原点を辿るビジョンを持つようにすべきです</strong>。その意識だけで、大分情報は絞れるはずです。
            </p>
            <p>
                ダンス仲間がいる場合は、ルーティンを考える場合でも友人同士で指摘し合いながら、どれがかっこいいと思うか、やめておいた方が良いかという議論をするようにしましょう。
            </p>
            <p>
                そのままルーティンが何も思い浮かばず、数時間が経ってしまった。。なんてことはよくある話です。ダンスを考える良い練習にはなっているので、諦めずにひらめく頭を養うようにしてください。
            </p>
            <p>
                なんでも「無」から生み出すのは難しいですし、良いものになりにくいでしょう。何かのベースにスパイスを加えるようにし、その繰り返しをしていく内に、
                自分のダンス色が出来ていきます。そうなれば、徐々に早い時間でダンスのバリエーションや、ルーティンを頭に浮かべることはできるようになるでしょう。
            </p>
            <p>
                参考<br>
                <?= $this->Html->link('Boogaloo Shrimp & Michael Jackson', 'https://www.youtube.com/watch?v=F-6Mdy9NRuQ', ['target' => '_blank']) ?><br>
                マイケルジャクソンでもベースが必要(<small>この例ではブーガルー・シュリンプ</small>)で、研究・吸収し、自分のオリジナリティを出している良い例
            </p>
        </div>
    </div>

    <ul class="list-group">
        <li class="list-group-item active"><i class="fa fa-hand-o-right" aria-hidden="true"></i> ポイント</li>
        <li class="list-group-item">ダンス基礎のバリエーションもしっかりと体の軸ができるまで練習を続けること。</li>
        <li class="list-group-item">基礎を無理に変える必要はない。組み合わせを変えるだけでオリジナリティは増す。</li>
        <li class="list-group-item">ルーティンやバリエーションを考える場合、「何かをベース」にする方が良いものが出来やすい。</li>
    </ul>

    <hr class="my-4">

    <?= $this->Html->link('<i class="fa fa-arrow-circle-left mr-1" aria-hidden="true"></i> 前へ</button>',
        ['controller' => 'Lectures', 'action' => 'noLonging'],
        ['class' => 'btn btn-blue waves-effect', 'escape' => false]
    ) ?>
    <?= $this->Html->link('次へ <i class="fa fa-arrow-circle-right ml-1"></i>',
        ['controller' => 'Lectures', 'action' => 'knowMusic'],
        ['class' => 'btn btn-outline-primary waves-effect', 'escape' => false]
    ) ?>
</div><!-- /.jumbotron -->
