<?php
    $this->assign('description',
        'ストリートダンサーとして必ず得ておきたいことの一つとして自分のスタイルがあります。スタイルは掴もうとして掴めるものではありませんが、意識していくことが大切です。自分の好きなものをより明確に、確固たるものとして、それと同時にダンス活動をしていくこと、人に認められていくことで自然と見に付くものです。個性を出せるように努力したいものです。');
    $this->assign('title', '自分のスタイルを持つ');
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
    <h1 class="card-title h2-responsive mt-2"><strong>自分のスタイルを持つ</strong></h1>
    <p class="deep-orange-text mb-4 font-bold">Have your own style</p>
    <hr>

    <div class="d-flex justify-content-center">
        <div class="card-text text-left mb-3" style="max-width: 43rem;">
            <p>
                ストリートダンサーとして最終目標の一つにしたい「自分のスタイル」。これは見えない時はとても難しく感じます。ですが、<strong class="font-weight-bold">自分の好きなものをより明確に、確固たるものとして、それと同時にダンス活動をしていくこと、人に認められていくこと</strong>で自然と身に付いてくるものです。
            </p>
            <p>
                有名なダンサー達は自分のスタイルを持っている人が多いです。それを見て、共感してくれる人がファンになり、イベントなどに足を運んでくれます。
            </p>
            <p>
                自分のスタイルを持つ過程としては、好きな音楽とダンスにしっかりとアンテナを張っておくことです。また、継続的にダンス活動していく中で、自分がかっこいいと思うものを表現していくわけですから、少しずつ変化・改善され、自分色に近づいていきます。
            </p>
            <p>
                ここまで何度かお話していますが、何もない所からのオリジナルのダンススタイルなどありません。皆、必ず何かをベースにして、自分なりに解釈・吸収し、それを自分の武器にする。これ以外は存在しません。
            </p>
            <p>
                ストリートダンス上級者になると、不思議と人と同じ動きをしても、なんとなく自分の動きになるものです。それが自分の個性であり、スタイルです。逆に頭で考えて掴もうとしても、掴めるものではありません。<small><strong class="red-text">※</strong>意識することは必要でしょう。深く考えなくて良いということ。</small>
            </p>
            <p>
                筆者がダンスチームとしてリスペクトする判断として見ているのは、皆同じルーティンをしていても、それぞれが違う動きに見え、個性があるかどうかです。その方がチームとしてインパクトがあったり、「かっこいいな」と感じるケースが多いです。
            </p>
            <p>
                今のダンスチームによく見られる印象は「まとまり過ぎている」と感じます。それは皆ダンスが上手なので良いのですが、個性がないため印象に残らないのです。<br>
                <small><strong class="red-text">※</strong>コンテストではそれでも認められることも多いように思いますが、それは主観によります。ここでは筆者の主観として書いています。</small>
            </p>
            <p>
                練習すればダンスは上手になります。それはどんな分野でも同じことです。大事なのはそこからで、自分のこだわりが強い程、良い意味の癖として個性は生まれるということです。
            </p>
            <p>
                それは現在は現役ではないストリートダンサーの方が強かったイメージがあります。なので、ダンスチームとしても覚えているが、<strong class="font-weight-bold">個人としても覚えているケースが多い</strong>。これはとても大切なことです。
            </p>
            <p>
                ストリートダンサーとして、また、ダンスチームの成長を考える時にそうした事柄を意識し、大切にすれば、自分達だけのカラーが自然と生まれてくるでしょう。
            </p>
        </div>
    </div>

    <ul class="list-group">
        <li class="list-group-item active"><i class="fa fa-hand-o-right" aria-hidden="true"></i> ポイント</li>
        <li class="list-group-item">自分のスタイルが得られるかどうかは良いこだわりを持ち、それを伸ばすこと。</li>
        <li class="list-group-item">協調性があり過ぎるダンスチームは多い。もっと個人を意識すれば良い意味でイメージに残りやすくなる。</li>
        <li class="list-group-item">昔のダンサーは「個」が強かった。それは現在では学ぶべき所がたくさんあるということ。</li>
    </ul>

    <hr class="my-4">

    <?= $this->Html->link('<i class="fa fa-arrow-circle-left mr-1" aria-hidden="true"></i> 前へ</button>',
        ['controller' => 'Lectures', 'action' => 'humility'],
        ['class' => 'btn btn-blue waves-effect', 'escape' => false]
    ) ?>
    <?= $this->Html->link('次へ <i class="fa fa-arrow-circle-right ml-1"></i>',
        ['controller' => 'Lectures', 'action' => 'onePracticeTime'],
        ['class' => 'btn btn-outline-primary waves-effect', 'escape' => false]
    ) ?>
</div><!-- /.jumbotron -->
