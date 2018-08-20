<?php
    $this->assign('description',
        'オーガナイザー・企業区分ユーザーになることで、主催するイベントを簡単に、効率的に告知することができます。ダンサー検索、イベントに協力してもらうための人材を募集する求人登録なども利用できます。ダンス動画やミュージックなども共有しましょう。');
    $this->assign('title', 'オーガナイザー・企業機能紹介');
?>

<div class="card card-cascade wider reverse mt-5 pt-4 mb-3">
    <div class="view view-cascade overlay">
        <?= $this->Html->image('detail-organizer1600×750.jpg', ['class' => 'card-img-top', 'alt' => 'オーガナイザー / 企業区分イメージ']) ?>
        <a href="#!">
            <div class="mask rgba-white-slight"></div>
        </a>
    </div>

    <div class="card-body card-body-cascade text-center mb-3">
        <h4 class="card-title h4-responsive"><strong>Organizer / Company 機能紹介</strong></h4>
        <hr>
        <h6 class="card-text py-2">オーガナイザー・企業 区分で使用できる主な機能を紹介します。</h6>
    </div>
</div>

<div class="row">
    <div class="col-lg-1">
    </div>
    <div class="col-lg-10">
        <h4 class="blockquote bq-danger font-weight-bold dark-grey-text">
            オーガナイザー・企業プロフィール
        </h4>
        <p>
            初回ログイン後にプロフィールを作成しましょう。主催イベント実績や、過去のイベント動画を登録しておくことでプロフィールを閲覧したユーザーからの信頼性を高めることができます。
        </p>
        <p>
            また、Facebook、Twitter、Instagramなど主要なSNSのURLを登録することでタイムラインを表示することが可能です。<br>
            <small><span class="red-text">※</span>タイムラインはFacebook、Twitterのみ</small>
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
        <h4 class="blockquote bq-danger font-weight-bold dark-grey-text">
            ダンサー検索
        </h4>
        <p>
            イベントを成功させるには参加者が必要です。Dancerootsでは簡単に各都道府県ごとのダンサーを検索することができます。
        </p>
        <p>
            ダンサープロフィールを参照することで、イベントのコンセプトに沿ったユーザーかどうか判断することができます。プロフィール参照から目的のユーザーへ簡単にメッセージを送ることができます。
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
        <h4 class="blockquote bq-danger font-weight-bold dark-grey-text">
            スタジオ検索
        </h4>
        <p>
            イベントを開催するのにスタジオ・スクールに所属しているインストラクターのダンサーを知りたいかもしれません。
        </p>
        <p>
            スタジオも各都道府県ごとに検索可能です。希望のスタジオのプロフィールから簡単に連絡を取ることができます。<br>
            <small><span class="red-text">※</span> 後に各スタジオごとにインストラクターが記載されたタイムスケジュール機能を実装予定です。</small>
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
        <h4 class="blockquote bq-danger font-weight-bold dark-grey-text">
            イベント
        </h4>
        <p>
            主催予定 / 参加予定のイベントを登録できます。登録時に募集中か告知のみかを選択し、より詳細にイベントを告知することができます。
        </p>
        <p>
            イベントを閲覧するユーザーが詳細な情報を得ることで、参加希望の問い合わせが期待できます。また、イベント場所の住所を登録すると自動でGoogleMapに表示されます。
        </p>
        <p>
            <small><span class="red-text">※</span>
                現在はイベントに対してのメッセージのやり取りのみですが、参加予定者の有無など詳細に管理できるイベント管理機能を実装予定です。
            </small>
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
        <h4 class="blockquote bq-danger font-weight-bold dark-grey-text">
            ダンス関連求人
        </h4>
        <p>
            オーガナイザー・企業区分はダンスに関連する求人を登録することができます。学校や企業がダンスインストラクターを希望していたり、振付、バックダンサーなどを募集することができます。
        </p>
        <p>
            閲覧者は求人ページより問い合わせのメッセージを送ることができるので、どのユーザーからの問い合わせかをすぐにプロフィールで確認することができます。希望する人材とマッチすれば、面談の機会を与えましょう。
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
        <h4 class="blockquote bq-danger font-weight-bold dark-grey-text">
            メッセージ
        </h4>
        <p>
            各ユーザーへ簡単にメッセージを送ることができます。メッセージ送信後は相手のメールアドレスにお知らせが届きます。
        </p>
        <p>
            メッセージボックスで送信履歴・受信履歴を確認することができます。ダンサーやダンスに興味を持っている一般の方、オーガナイザーなどたくさんのダンス関係者とやり取りすることが可能になります。
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
        <h4 class="blockquote bq-danger font-weight-bold dark-grey-text">
            ダンス動画
        </h4>
        <p>
            ユーザーはYouTubeを通してダンス動画を共有することができます。入力項目にYouTubeの動画URLを貼り付けるだけで完了です。
        </p>
        <p>
            開催したイベントなどの動画を共有することも可能です。これからダンスを始める人やダンス初心者の方に良い勉強になるダンス動画を共有しましょう。
        </p>
        <p>
            また、Dancerootsが独自にオススメするダンス動画も閲覧することができます。
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
        <h4 class="blockquote bq-danger font-weight-bold dark-grey-text">
            ミュージック
        </h4>
        <p>
            ダンス文化は音楽を通して発展します。AppleMusicを通してダンサーが踊りたくなる音楽を皆で共有しましょう。HipHop、R&Bアーティストをクリックするだけで検索が可能です。
        </p>
        <p>
            また、音楽もサムネイルをクリックするだけで簡単に視聴ができます。踊れる曲、良い曲を登録してください。他にもAppleMusic RSSフィードによって米国を基準とした新着トラックやランキングを閲覧することができます。
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
        <h4 class="blockquote bq-danger font-weight-bold dark-grey-text">
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
