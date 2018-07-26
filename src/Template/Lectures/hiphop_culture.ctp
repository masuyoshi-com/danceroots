<?php
    $this->assign('description',
        '個性のあるストリートダンサーとして成長するためには、単にダンスが好きというだけではなれるものではありません。HipHop文化自体に触れ、吸収していくことによって、自身も磨かれ、ダンサーとしての深みが増すことにつながるのです。既にダンス上級者であれば、他の要素にも挑戦するようにしましょう。');
    $this->assign('title', 'HipHop文化自体に触れる')
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
    <h1 class="card-title h2-responsive mt-2"><strong>HipHop文化自体に触れる</strong></h1>
    <p class="deep-orange-text mb-4 font-bold">Touch the HipHop culture itselfe</p>
    <hr>

    <div class="d-flex justify-content-center">
        <div class="card-text text-left mb-3" style="max-width: 43rem;">
            <p>
                内容が濃い、深みがある、または個性のあるストリートダンサーになるために必要な要素はダンスが上手だけではいけません。これまでも話してきたようにHipHop文化の知識・教養が必要です。
            </p>
            <p>
                「好きこそ物の上手なれ」という言葉がありますが、ストリートダンスが好きなら、HipHop文化にも自然と興味が沸くはずです。
            </p>
            <p>
                ストリートダンス界は「ダンスが好き」というだけの人が多い印象があります。ストリートダンスが好きなのは土台として、他の教養を得るキッカケだと筆者は今となっては思います。ですが、それで終わってしまうダンサーが多いのも事実です。
            </p>
            <p>
                ダンス上級者になれば、<strong class="font-weight-bold">感覚の幅が広がるため、もっとたくさんの知識を吸収できるようになります</strong>。練習だけに終われる日々はクリアしているはずです。それなら自身のリソース(<small>資源</small>)はダンサーとしての深みに行くために使いましょう。
            </p>
            <p>
                最初の頃に好きだったものが年月が過ぎて、物を見るセンスも上達しているはずです。もっと高みを目指すために、HipHopの他の要素にも触れるようにしてください。
            </p>
            <p>
                例えば、筆者はダンスの先輩2人とダンスチームを組んでいた時期があります。筆者含めてDJ機器は全員持っていましたし、先輩2人に関してはMixTapeを販売していたり、クラブDJとしても活動していました。DJやラッパーの繋がりも強かったように思います。HipHopの違う要素で活動する人からも良い教養を得ることができるのです。
            </p>
            <p>
                それらの教養が直接的でなくてもダンスに活かすことができ、個人やダンサーとしても深み・魅力が増すことにつながります。
            </p>
            <p>
                Misfits(ラバーバンド(Rubberbandz)、キート(Kito)、マークエスト(Mar-Quest)、プランサー(Prancer)、ピーカーブー(Peek-A-Boo))
                も昔の映像ではラップを歌いながら、区切りにストリートダンスのショーをしています。<small><span class="red-text">※</span>以下は昔の映像ではありません。</small>
            </p>
            <div class="row d-flex justify-content-center mb-3">
                <div class="col-md-6">
                    <p><code>Misfitss Danceshowcase</code></p>
                    <div class="embed-responsive embed-responsive-16by9 hoverable">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/ucZfWWOv434?rel=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
            <p>
                各々に個性、スタイルがあり、ぜひ参考にしてもらいたい対象です。ダンス上級者以上になるためには、HipHop文化を取り入れていく努力をするようにしましょう。
            </p>
        </div>
    </div>

    <ul class="list-group">
        <li class="list-group-item active"><i class="fa fa-hand-o-right" aria-hidden="true"></i> ポイント</li>
        <li class="list-group-item">「ダンスが好き」というだけでは上級者以上になれない。HipHopから教養を得ることが大切。</li>
        <li class="list-group-item">HipHopを知ることで、直接的でなくても(<small>ダンス上達に直結しなくても</small>)自身の深みが増すことになる。</li>
        <li class="list-group-item">ストリートダンスは一つのカテゴリに過ぎない。ダンスだけが全てになっていないか考えてみる。</li>
    </ul>

    <hr class="my-4">

    <?= $this->Html->link('<i class="fa fa-arrow-circle-left mr-1" aria-hidden="true"></i> 前へ</button>',
        ['controller' => 'Lectures', 'action' => 'onePracticeTime'],
        ['class' => 'btn btn-blue waves-effect', 'escape' => false]
    ) ?>
    <?= $this->Html->link('次へ <i class="fa fa-arrow-circle-right ml-1"></i>',
        ['controller' => 'Lectures', 'action' => 'pierceStyle'],
        ['class' => 'btn btn-outline-primary waves-effect', 'escape' => false]
    ) ?>
</div><!-- /.jumbotron -->
