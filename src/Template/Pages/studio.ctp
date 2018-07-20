<?php
    $this->assign('description',
        'ダンススタジオ・スクール区分ユーザーになることで、スタジオプロフィールが作成でき効率的にダンススタジオを告知できます。また、ダンサー検索、イベント・ダンスインストラクターを募集する求人登録などが利用できます。ダンス動画やミュージックなども共有しましょう。');
    $this->assign('title', 'スタジオ・スクール機能紹介');
?>

<div class="card card-cascade wider reverse mt-5 pt-4 mb-3">
    <div class="view view-cascade overlay">
        <?= $this->Html->image('detail-studio1920×950.jpg', ['class' => 'card-img-top', 'alt' => 'スタジオ・スクール区分イメージ']) ?>
        <a href="#!">
            <div class="mask rgba-white-slight"></div>
        </a>
    </div>

    <div class="card-body card-body-cascade text-center mb-3">
        <h4 class="card-title h4-responsive"><i class="fa fa-building" aria-hidden="true"></i> <strong>DanceStudio / School 機能紹介</strong></h4>
        <hr>
        <h6 class="card-text py-2">ダンススタジオ・スクール 区分で使用できる主な機能を紹介します。</h6>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <h4 class="blockquote bq-warning font-weight-bold dark-grey-text">
            スタジオ・スクールプロフィール
        </h4>
        <p>
            初回ログイン後にスタジオ・スクールプロフィールを作成してください。
            より詳細に項目を入力することによって、他ユーザーの関心が高まります。
            所在地の住所を入力しておくことで自動的にプロフィールページでGoogleMapとしても表示されます。
            信頼性を意識して入力するようにしましょう。
        </p>
        <p>
            【後日アップデート実装予定】<br>
            スタジオタイムスケジュールで曜日と時間帯にどのインストラクターが担当するか登録することができます。
            また、Dancerootsに該当インストラクターがプロフィール登録済みならプロフィールリンクをしておくことも可能です。
            ダンスを習いたいユーザーはスタジオタイムスケジュールとインストラクターのプロフィール情報を迅速に確認することが可能になります。
        </p>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-lg-12">
        <h4 class="blockquote bq-warning font-weight-bold dark-grey-text">
            ダンサー検索
        </h4>
        <p>
            ダンスインストラクターをお探しのスタジオ・スクールの方はダンサーを都道府県ごとに検索することができます。
            インストラクターが定期的に勤務が可能かどうかも判断することができます。
        </p>
        <p>
            ダンサープロフィールにダンス動画をリンクさせているダンサーは特にダンスインストラクターとして基準を満たしているか判断する材料にもなります。
            目的のダンサーにメッセージで簡単にやり取りが可能です。
        </p>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-lg-12">
        <h4 class="blockquote bq-warning font-weight-bold dark-grey-text">
            ダンス関連求人
        </h4>
        <p>
            ダンスインストラクターなどの人材を確保したい場合は効率的にダンス関連求人に登録しておきしょう。面談希望者を確保することが可能です。
        </p>
        <p>
            問い合わせが来た場合、既にダンサープロフィールを所持しているユーザーなのでダンスインストラクターとして採用できるかどうかの判断も容易になります。
            お互いの基準が成立すれば面談をするようにしてください。
        </p>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-lg-12">
        <h4 class="blockquote bq-warning font-weight-bold dark-grey-text">
            イベント
        </h4>
        <p>
            スタジオ・スクールごとに開催する発表会やコンテストなどを効率的に告知することができます。
            質の良いイベントを開催できれば、スタジオに通いたいという新規生徒の確保にもつながります。
        </p>
        <p>
            イベントに関しての問い合わせも他ユーザーから届きやすくなるので、関心を持っている人への対応も
            迅速にできるようになります。
        </p>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-lg-12">
        <h4 class="blockquote bq-warning font-weight-bold dark-grey-text">
            メッセージ
        </h4>
        <p>
            各ユーザーのプロフィールページから簡単にメッセージを送ることができます。
            メッセージ送信後は相手のメールアドレスにお知らせが届きます。
        </p>
        <p>
            メッセージボックスで送信履歴・受信履歴を確認することができます。
            ダンサーやダンスに興味を持っている一般の方、オーガナイザーなどたくさんの
            ダンス関係者とやり取りすることが可能です。
        </p>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-lg-12">
        <h4 class="blockquote bq-warning font-weight-bold dark-grey-text">
            ダンス動画
        </h4>
        <p>
            各ユーザーはYouTubeを通してダンス動画を共有することができます。
            入力項目にYouTubeの動画URLを貼り付けるだけで完了です。
        </p>
        <p>
            開催したイベント・コンテストなどの動画を共有することも可能です。
            これからダンスを始める人や初心者だけでは良いダンス動画にたどりつくことも
            中々できません。皆で良い勉強になるダンス動画を共有しましょう。
        </p>
        <p>
            また、Dancerootsが独自におすすめするダンス動画も閲覧することができます。
        </p>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-lg-12">
        <h4 class="blockquote bq-warning font-weight-bold dark-grey-text">
            ミュージック
        </h4>
        <p>
            ストリートダンス文化は音楽を通して発展します。AppleMusicを通してダンサーが踊りたくなる音楽を
            皆で共有しましょう。HipHop、R&Bアーティストをクリックするだけで検索が可能です。
        </p>
        <p>
            音楽の視聴も簡単にできます。踊れる曲、良い曲をぜひ登録してください。
            他にもAppleMusic RSSフィードによって米国を基準とした新着トラックやランキングを確認することができます。
        </p>
        <p>
            Dancerootsがオススメする音楽も参考にしてください。
        </p>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-lg-12">
        <h4 class="blockquote bq-warning font-weight-bold dark-grey-text">
            フィードバック
        </h4>
        <p>
            サイトを利用している上で困ったことが起きた場合には、フィードバックより当サイトへお問い合わせください。
            迷惑ユーザーやバグ、またはこんな機能が欲しい、改善してほしいことなど、なんでも構いません。
        </p>
        <p>
            機能実装などはリクエスト数が多い順に改善・アップデートしていきます。できる限り迅速に対応します。
        </p>
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
