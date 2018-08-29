<?php
    $this->assign('description',
        '一般区分ユーザーになることで、ストリートダンスに関する最新情報を得ることができます。あなたが参加するイベントなども告知することができ、より多くのストリートダンスに関心をもっているユーザーに告知することができます。他にもダンサー検索、スタジオ検索、ダンス動画やミュージックなどの共有も可能になります。');
    $this->assign('title', '一般機能紹介');
?>

<div class="card card-cascade wider reverse mt-5 pt-4 mb-3">
    <div class="view view-cascade overlay">
        <?= $this->Html->image('detail-general1920×850.jpg', ['class' => 'card-img-top', 'alt' => '一般区分イメージ']) ?>
        <a href="#!">
            <div class="mask rgba-white-slight"></div>
        </a>
    </div>

    <div class="card-body card-body-cascade text-center mb-3">
        <h4 class="card-title h4-responsive"><strong>General 機能紹介</strong></h4>
        <hr>
        <h6 class="card-text py-2">一般区分で使用できる主な機能を紹介します。</h6>
    </div>
</div>

<div class="row">
    <div class="col-lg-1">
    </div>
    <div class="col-lg-10">
        <h4 class="blockquote bq-success font-weight-bold dark-grey-text">
            プロフィール
        </h4>
        <p>
            初回ログイン後、簡単なプロフィールを作成しましょう。Facebook、Twitter、Instagramなど主要なSNSを登録しておくことでタイムラインを表示することが可能です。<small><span class="red-text">※</span>タイムラインはFacebook、Twitterのみ</small>
        </p>
        <p>
            好きなアイコンなどを登録し、プロフィールに個性を持たすことができます。
        </p>
    </div>
    <div class="col-lg-1">
    </div>
</div>
<hr>
<div class="row">
    <div class="col-lg-1">
    </div>
    <div class="col-lg-10">
        <h4 class="blockquote bq-success font-weight-bold dark-grey-text">
            ダンサー検索
        </h4>
        <p>
            各都道府県ごとにDancerootsに登録しているストリートダンサーを検索することができます。ダンサープロフィールを参照することで目的のダンサースタイルなどを知ることができます。
        </p>
        <p>
            コンタクトをとりたい場合はプロフィール参照から簡単にメッセージを送信することができます。
        </p>
    </div>
    <div class="col-lg-1">
    </div>
</div>
<hr>
<div class="row">
    <div class="col-lg-1">
    </div>
    <div class="col-lg-10">
        <h4 class="blockquote bq-success font-weight-bold dark-grey-text">
            スタジオ検索
        </h4>
        <p>
            あなたはこれからダンスを始めたいかもしれません。スタジオも各都道府県ごとに登録されているので検索が簡単です。
        </p>
        <p>
            スタジオ詳細を確認することでスタジオの特色がわかるようになります。気になるスタジオやスクールを見つけたら、すぐにメッセージを作成することができます。
        </p>
    </div>
    <div class="col-lg-1">
    </div>
</div>
<hr>
<div class="row">
    <div class="col-lg-1">
    </div>
    <div class="col-lg-10">
        <h4 class="blockquote bq-success font-weight-bold dark-grey-text">
            サークル
        </h4>
        <p>
            自由にサークルを作成・参加をすることができます。サークル作成後はサークル検索に表示されるようになり、それを閲覧しているユーザーは自由に参加することができます。
        </p>
        <p>
            サークルに参加することで、サークル内でのメッセージ作成やメンバーのプロフィールに迅速にアクセスできるようになります。メッセージはサークルメンバー全員にメール送信され、効率的にお知らせを届けることが可能になります。
            <small><span class="red-text">※</span>サークル作成・参加は各5つまで。</small>
        </p>
    </div>
    <div class="col-lg-1">
    </div>
</div>
<hr>
<div class="row">
    <div class="col-lg-1">
    </div>
    <div class="col-lg-10">
        <h4 class="blockquote bq-success font-weight-bold dark-grey-text">
            イベント
        </h4>
        <p>
            参加する予定のイベントを教えてください。イベントを告知登録することで他のユーザーがそのイベントの存在を知ることになります。
        </p>
        <p>
            また、イベントを知りたい場合はイベント検索が可能です。イベント詳細では登録者のユーザーが表示されているので、問い合わせメッセージを作成することも簡単です。
        </p>
    </div>
    <div class="col-lg-1">
    </div>
</div>
<hr>
<div class="row">
    <div class="col-lg-1">
    </div>
    <div class="col-lg-10">
        <h4 class="blockquote bq-success font-weight-bold dark-grey-text">
            メッセージ
        </h4>
        <p>
            各ユーザーのプロフィールページから簡単にメッセージを送ることができます。メッセージ送信後は相手のメールアドレスにお知らせが届きます。
        </p>
        <p>
            メッセージボックスで送信履歴・受信履歴を確認することができます。ダンサーやダンススタジオ、オーガナイザーなどたくさんのダンス関係者とやり取りすることが可能になります。
        </p>
    </div>
    <div class="col-lg-1">
    </div>
</div>
<hr>
<div class="row">
    <div class="col-lg-1">
    </div>
    <div class="col-lg-10">
        <h4 class="blockquote bq-success font-weight-bold dark-grey-text">
            ダンス動画
        </h4>
        <p>
            ユーザーはYouTubeを通してダンス動画を共有することができます。入力項目にYouTubeの動画URLを貼り付けるだけで完了です。
        </p>
        <p>
            皆で良いダンス動画を共有しましょう。また、Dancerootsが独自にオススメするダンス動画も閲覧することができます。
        </p>
    </div>
    <div class="col-lg-1">
    </div>
</div>
<hr>
<div class="row">
    <div class="col-lg-1">
    </div>
    <div class="col-lg-10">
        <h4 class="blockquote bq-success font-weight-bold dark-grey-text">
            ミュージック
        </h4>
        <p>
            ダンス文化は音楽を通して発展します。AppleMusicを通してダンサーが踊りたくなる音楽を皆で共有しましょう。HipHop、R&Bアーティストをクリックするだけで検索が可能です。
        </p>
        <p>
            サムネイルをクリックするだけで音楽の視聴も簡単にできます。踊れる曲、良い曲を登録してください。他にもAppleMusic RSSフィードによって米国を基準とした新着トラックやランキングを閲覧することができます。
        </p>
    </div>
    <div class="col-lg-1">
    </div>
</div>
<hr>
<div class="row">
    <div class="col-lg-1">
    </div>
    <div class="col-lg-10">
        <h4 class="blockquote bq-success font-weight-bold dark-grey-text">
            フィードバック
        </h4>
        <p>
            サイトを利用している上で困ったことが起きた場合には、フィードバックより当サイトへお問い合わせください。迷惑ユーザーやバグ、またはこんな機能が欲しい、改善してほしいことなど、なんでも構いません。
        </p>
        <p>
            機能実装などはリクエスト数が多い順に改善・アップデートしていきます。できる限り迅速に対応します。
        </p>
    </div>
    <div class="col-lg-1">
    </div>
</div>
<hr>

<div class="row">
    <div class="col-lg-12">
        <?= $this->Html->link('サインアップ',
            ['controller' => 'Users', 'action' => 'signup'],
            ['class' => 'btn btn-default btn-block']
        ) ?>
    </div>
</div>
<hr>
