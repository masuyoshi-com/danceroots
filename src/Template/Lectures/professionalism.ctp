<?php
    $this->assign('description',
        '早い段階からプロダンサーとしての意識を持つ習慣を身に付けることができれば、ストリートダンスの上達は早くなります。初期の頃は中々自信が持てませんが、ダンス活動の中で人に認められ始め、結果がついてくると自然と自信も沸いてくるものです。ですが自信過剰になると人間関係を壊しかねないので気を付ける様にしましょう。');
    $this->assign('title', 'プロ意識を持つ');
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
    <h1 class="card-title h2-responsive mt-2"><strong>プロ意識を持つ</strong></h1>
    <p class="deep-orange-text mb-4 font-bold">Have professionalism</p>
    <hr>

    <div class="d-flex justify-content-center">
        <div class="card-text text-left mb-3" style="max-width: 43rem;">
            <p>
                ストリートダンス活動をしていくと、自然に月日と共に認知度が増え始めます。少なくともダンス上級者になると他のダンサー達は「何となく」でも知っているという時がくるでしょう。
            </p>
            <p>
                そうなれば、ダンスショーケースの時や、コンテストの時に顔をよく合わせるようになり、知り合いも増え始めます。
            </p>
            <p>
                上級者として一つ心得ておきたいことは、「<strong class="font-weight-bold">プロ意識を持つ</strong>」ということです。プロとは何を基準に言うのでしょうか？
                ストリートダンスには明確にプロと認定する公的な資格やライセンスは存在しません。
            </p>
            <p>
                プロダンサーという線引きは人それぞれです。
                <ul>
                    <li>ゲストダンサーとして呼ばれるようになったら</li>
                    <li>ダンスインストラクターになったら</li>
                    <li>ダンスコンテストに優勝したら</li>
                    <li>ストリートダンスで生活ができるようになったら</li>
                </ul>
                が多いかもしれません。
            </p>
            <p>
                ですが、上記の条件を満たしていなくても、プロ意識は持つようにすべきです。プロ意識とは、ストリートダンサーとしてのこだわりや、固い決意や、それに伴う行動を指します。
            </p>
            <p>
                しっかりと先(<small>将来どうなるか</small>)を見据えて活動するのと、何も考えずに好きだからやっているだけなのでは意識に差が出ます。
            </p>
            <p>
                好きでダンスをやるのは既に初心者の頃から常に土台にあるべきものです。その上でどう高い意識を持つのかが重要です。例えば、一年後には今の状況をどう変えるのか？何を目標にするのか？など明確に決めることです。
            </p>
            <p>
                そういった強い意思の元でダンス活動をすると、ダンサーとしての雰囲気も出るようになります。服装にもより気を配り、音楽にもアンテナを張り、プロダンサーとしての意識が自然と強くなっているものです。
            </p>
            <p>
                ストリートダンサーは皆このプロ意識を持つことで、より洗練されたダンサーになれることができると思います。「自分は常に自信や信念を持ってダンスをしている」とこだわりを持てば良いのです。
            </p>
            <p>
                ストリートダンスが上手くなるにつれ、徐々に自信も生まれ、結果もついてくるようになります。ですが、自信過剰にならないように気を付けることも大切です。
            </p>
            <p>
                人の話に耳を傾けることができなくなると後で後悔するのは自分です。過剰な自信は人によって傲慢に見えます。<strong class="font-weight-bold">自信と傲慢は紙一重</strong>ですから、自制心を持ち、あなたのダンスに活かすよう心掛けましょう。
            </p>
        </div>
    </div>

    <ul class="list-group">
        <li class="list-group-item active"><i class="fa fa-hand-o-right" aria-hidden="true"></i> ポイント</li>
        <li class="list-group-item">習慣によってプロ意識は誰でも持てる。強い意思を維持できればダンスの上達が早くなる。</li>
        <li class="list-group-item">ダンスを好きでやるのは当然。将来のビジョンを常に持てるかどうかが重要。</li>
        <li class="list-group-item">結果がついてくると自信がついてくる。ただし、自信と傲慢は紙一重。気を付けること。</li>
    </ul>

    <hr class="my-4">

    <?= $this->Html->link('<i class="fa fa-arrow-circle-left mr-1" aria-hidden="true"></i> 前へ</button>',
        ['controller' => 'Lectures', 'action' => 'understandStyle'],
        ['class' => 'btn btn-blue waves-effect', 'escape' => false]
    ) ?>
    <?= $this->Html->link('次へ <i class="fa fa-arrow-circle-right ml-1"></i>',
        ['controller' => 'Lectures', 'action' => 'danceInstructor'],
        ['class' => 'btn btn-outline-primary waves-effect', 'escape' => false]
    ) ?>
</div><!-- /.jumbotron -->
