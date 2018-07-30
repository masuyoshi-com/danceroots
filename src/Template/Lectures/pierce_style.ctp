<?php
    $this->assign('description',
        'ストリートダンスの流行は変わっていくものです。もし、自分達のスタイルを自覚し、それを人に認めてもらえているのであれば、無駄に流行に流される必要はありません。流行は自分達の形にして吸収し、改善していくべきでしょう。根本を変えてしまうことによって、ストリートダンサーとしての価値が衰退してしまうことは避けなければいけません。');
    $this->assign('title', '自分のスタイルを貫く')
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
    <h1 class="card-title h2-responsive mt-2"><strong>自分のスタイルを貫く</strong></h1>
    <p class="deep-orange-text mb-4 font-bold">Stick with your own style</p>
    <hr>

    <div class="d-flex justify-content-center">
        <div class="card-text text-left mb-3" style="max-width: 43rem;">
            <p>
                ストリートダンサーとして自分のスタイルを見つけることで、ダンサーとしての価値が出るようになります。
                また、それを人に認めてもらうことによって、仕事のオファーが来るようになります。
            </p>
            <p>
                自分達のカラーを自覚し、それを人に認めてもらえているのであれば、無駄に変える必要はありません。
            </p>
            <p>
                時と共に流行というものは必ず変わります。HipHopダンスで言ってみればNewJackSwingの時代からNewSchoolが広がり、
                様々な形で変化してきました。今後もストリートダンスは変化していくでしょう。
            </p>
            <p>
                その流行に無駄に流されないようにすることが大切です。流行を取り入れても自分達の根本を変える必要はありません。
            </p>
            <p>
                好みは人それぞれです。トップダンサーの仲間入りを果たし、人に認められるようになれば、認知度が増えたということです。
            </p>
            <p>
                流行に流されるように、自分の土台を変えてしまうことがあれば、自身の良さも失ってしまう可能性は高くなります。
            </p>
            <p>
                ストリートダンスチームとして、今も活躍しているダンサーは根本は変わっていないと思います。それが自分達のカラーであり、スタイルとして意識しているからでしょう。
            </p>
            <p>
                それが「<strong class="font-weight-bold">自分達のスタイルを貫く</strong>」ということです。
            </p>
            <p>
                個人のダンスにしても同じことが言えます。基本的に自分のカラーを出せる、または得意な動きがあるのであらば、その動きを中心にすることが大切です。毎度同じ動きでも構いません。有名なダンサーには「これ」というカラーや同じ動きが必ずあります。それは変える必要はありませんし、それが「個性」なのです。
            </p>
            <p>
                ダンスの中でも好みがあるので好きという人もいれば興味がない人がいることは当然です。周りの声は気にせず、結果がついてきているならば自分達が「これだ」というスタイルがあることを大切にしましょう。
            </p>
        </div>
    </div>

    <ul class="list-group">
        <li class="list-group-item active"><i class="fa fa-hand-o-right" aria-hidden="true"></i> ポイント</li>
        <li class="list-group-item">ダンスの流行に変に流されないこと。土台を変えることは自身の良さを失っていくリスクが高い。</li>
        <li class="list-group-item">ずっと活躍しているダンサーは根本的に変わらない。それは自分達の良さを自覚しているからである。</li>
        <li class="list-group-item">ソロでも同じ動きを毎回入れることは、大切なこと。それがあなたの個性に直結するため。</li>
    </ul>

    <hr class="my-4">

    <?= $this->Html->link('<i class="fa fa-arrow-circle-left mr-1" aria-hidden="true"></i> 前へ</button>',
        ['controller' => 'Lectures', 'action' => 'hiphopCulture'],
        ['class' => 'btn btn-blue waves-effect', 'escape' => false]
    ) ?>
    <?= $this->Html->link('次へ <i class="fa fa-arrow-circle-right ml-1"></i>',
        ['controller' => 'Lectures', 'action' => 'haveWeapon'],
        ['class' => 'btn btn-outline-primary waves-effect', 'escape' => false]
    ) ?>
</div><!-- /.jumbotron -->
