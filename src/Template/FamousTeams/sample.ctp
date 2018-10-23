<?php $this->assign('title', '有名チーム - チーム名'); ?>

<div class="view jarallax" data-jarallax='{"speed": 0.2}' style="background-image: url('https://mdbootstrap.com/img/Photos/Horizontal/Sport/full page/img%20(1).jpg'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
    <div class="mask rgba-black-strong">
        <div class="container h-100 d-flex justify-content-center align-items-center">
            <div class="row smooth-scroll">
                <div class="col-lg-12">
                    <div class="white-text text-center">
                        <h1 class="display-3 font-weight-bold wow fadeIn">Sample Team Name</h1>
                        <h4 class="text-uppercase wow fadeIn" data-wow-delay="0.2s">Genre: HipHop</h4>
                        <h5 class="text-uppercase wow fadeIn" data-wow-delay="0.2s">Activity Period: 1997 ~ 2018</h5>
                        <a href="#profile" class="btn btn-outline-white wow fadeIn" data-wow-delay="0.4s">Profile</a>
                    </div>
                </div><!-- /.col-lg-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.mask -->
</div><!-- /.view -->

<main>
    <?php
        if (isset($to_user_id)) {
            if (isset($message_id)) {
                print $this->element('Modal/message', ['to_user_id' => $to_user_id, 'to_user_name' => $to_username, 'message_id' => $message_id] );
            } else {
                print $this->element('Modal/message', ['to_user_id' => $to_user_id, 'to_user_name' => $to_username]);
            }
        }
    ?>
    <div class="container-fluid grey lighten-4">
        <div id="profile" class="container pt-3">
            <section class="section pt-2 pb-5">

                <h2 class="text-center text-uppercase font-weight-bold mt-5 mb-0 wow fadeIn" data-wow-delay="0.2s">Profile</h2>
                <p class="text-center font-weight-bold mt-0 wow fadeIn" data-wow-delay="0.2s"><small>プロフィール</small></p>

                <div class="row mt-5 mb-5">
                    <div class="col-lg-12 wow fadeIn" data-wow-delay="0.4s">
                        <p class="mb-4" align="justify">
                            97年からダンス活動をはじめ、現在○○, ××で活動中。全国、アジア各地のダンスイベントにゲストとして出演。
                            ワークショップ、ジャッジ（コンテスト、バトル）、振り付けを行っている。
                        </p>
                        <ul>
                            <li>dance@2010 final hiphop side 優勝</li>
                            <li>dance@2012 hiphop side 準優勝</li>
                            <li>stylebattle hiphop 優勝</li>
                            <li>2on2 battle hiphop 優勝</li>
                            <li>2008 japan 優勝</li>
                        </ul>
                        <p>
                            様々なアーティストのコンサート、PV、TV、イベントに出演、振り付けを手掛けている。
                        </p>
                    </div><!-- /.col-lg-12 -->
                </div><!-- /.row -->
            </section>
        </div><!-- /.ccontainer -->
    </div><!-- /.container-fluid -->

    <div class="container">
        <section class="section team-section">

            <h2 class="section-heading text-center mb-0 pt-5 font-weight-bold wow fadeIn">Member</h2>
            <p class="text-center font-weight-bold mt-0 mb-5 wow fadeIn" data-wow-delay="0.2s"><small>メンバー</small></p>

            <div class="row text-center wow fadeIn" data-wow-delay="0.4s">
                <div class="col-md-4 mb-5">
                    <div class="avatar mx-auto mb-4">
                        <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(3).jpg" class="z-depth-1 img-fluid">
                    </div>
                    <h4>John Doe</h4>
                    <h5>Leader</h5>
                </div>

                <div class="col-md-4 mb-5">
                    <div class="avatar mx-auto mb-4">
                        <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(9).jpg" class="z-depth-1 img-fluid">
                    </div>
                    <h4>James Melyah</h4>
                </div>

                <div class="col-md-4 mb-5">
                    <div class="avatar mx-auto mb-4">
                        <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(8).jpg" class="z-depth-1 img-fluid">
                    </div>
                    <h4>Steve Williams</h4>
                </div>
            </div><!-- /.row -->
        </section>
    </div><!-- /.container -->

    <div class="container-fluid mb-5 wow fadeIn elegant-color" data-wow-delay="0.2s">
        <div class="container mb-3 pt-1">
            <h2 class="section-heading text-center mt-5 mb-5 pt-4 font-weight-bold wow fadeIn white-text">ShowCase</h2>
            <div class="row">
                <div class="modal fade m--youtube" id="m--youtube0" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-body black pt-4 pb-4">
                                <div class="d-flex">
                                    <div class="p-0">
                                        <h6 class="white-text m-3"><i class="fa fa-youtube-play yt-ic"></i> YouTube</h6>
                                    </div>
                                    <div class="ml-auto pt-3 pr-2">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span class="white-text" aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                </div>
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/9sgzOpHJlrA?rel=0" allowfullscreen></iframe>
                                </div>
                            </div><!-- /.modal-body -->
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->

                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mb-3">
                    <div class="embed-responsive embed-responsive-16by9 d-flex justify-content-center zoom" style="cursor: pointer;">
                        <?= $this->Html->image('https://img.youtube.com/vi/9sgzOpHJlrA/mqdefault.jpg',
                            [
                                'class'       => 'img-fluid',
                                'data-toggle' => 'modal',
                                'data-target' => '#m--youtube0'
                            ]
                        ) ?>
                    </div>
                </div>

                <div class="modal fade m--youtube" id="m--youtube1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-body black pt-4 pb-4">
                                <div class="d-flex">
                                    <div class="p-0">
                                            <h6 class="white-text m-3"><i class="fa fa-youtube-play yt-ic"></i> YouTube</h6>
                                    </div>
                                    <div class="ml-auto pt-3 pr-2">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span class="white-text" aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                </div>
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/muMylgV4Xbs?rel=0" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mb-3">
                    <div class="embed-responsive embed-responsive-16by9 d-flex justify-content-center zoom" style="cursor: pointer;">
                        <?= $this->Html->image('https://img.youtube.com/vi/muMylgV4Xbs/mqdefault.jpg',
                            [
                                'class'       => 'img-fluid',
                                'data-toggle' => 'modal',
                                'data-target' => '#m--youtube1'
                            ]
                        ) ?>
                    </div>
                </div>

                <div class="modal fade m--youtube" id="m--youtube2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-body black pt-4 pb-4">
                                <div class="d-flex">
                                    <div class="p-0">
                                        <h6 class="white-text m-3"><i class="fa fa-youtube-play yt-ic"></i> YouTube</h6>
                                    </div>
                                    <div class="ml-auto pt-3 pr-2">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span class="white-text" aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                </div>
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/1bzEYg-CpQE?rel=0" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 mb-3">
                    <div class="embed-responsive embed-responsive-16by9 d-flex justify-content-center zoom" style="cursor: pointer;">
                        <?= $this->Html->image('https://img.youtube.com/vi/1bzEYg-CpQE/mqdefault.jpg',
                            [
                                'class'       => 'img-fluid',
                                'data-toggle' => 'modal',
                                'data-target' => '#m--youtube2'
                            ]
                        ) ?>
                    </div>
                </div>
                <div class="col-lg-12">
                    <p class="text-right m-0 pb-3">
                        <small><a class="white-text" href="javascript:void(0)">さらに見る<i class="fa fa-angle-right ml-2" aria-hidden="true"></i></a></small>
                    </p>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.container-fluid -->

    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-12">
                <section>
                    <h2 class="section-heading text-center mb-5 my-5 font-weight-bold wow fadeIn">Style</h2>
                    <div class="row mb-5 wow fadeIn" data-wow-delay="0.2s">
                        <div class="col-lg-12 mb-2">
                            <p>
                                HipHopのみならず、R&Bでの選曲も多くしている。特にアンダーグラウンドな雰囲気を大切にし、ショーではラフな踊り方を見せることを常に意識している。
                            </p>
                        </div>
                    </div>
                </section>
            </div><!-- /.col-lg-12 -->
        </div><!-- /.row -->
    </div><!-- /.container -->

    <div class="container-fluid mb-4 wow fadeIn grey lighten-3" data-wow-delay="0.2s">
        <div class="container mb-3 pt-1">
            <section>

                <h2 class="section-heading text-center mb-0 pt-5 mt-4 font-weight-bold wow fadeIn">Event</h2>
                <p class="text-center font-weight-bold mt-0 mb-5 wow fadeIn" data-wow-delay="0.2s"><small>イベント</small></p>

                <div class="row wow fadeIn" data-wow-delay="0.2s">
                    <?php for ($i = 0; $i < 3; $i++) : ?>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mb-3">
                            <div class="card">
                                <div class="view overlay">
                                    <?php
                                        if ($i === 0) {
                                            print '<img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/food.jpg" alt="Card image cap">';
                                        } elseif ($i === 1) {
                                            print '<img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/images/49.jpg" alt="Card image cap">';
                                        } elseif ($i === 2) {
                                            print '<img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/images/48.jpg" alt="Card image cap">';
                                        }
                                    ?>
                                    <a>
                                        <div class="mask rgba-white-slight"></div>
                                    </a>
                                </div>

                                <a class="btn-floating btn-action ml-auto mr-4 mdb-color lighten-3"><i class="fa fa-chevron-right pl-1"></i></a>

                                <div class="card-body">
                                    <h4 class="card-title">Event title <?= $i + 1?></h4>
                                    <hr>
                                    <p class="card-text">
                                        イベントの簡易説明文が表示されます。<br>
                                        <br>
                                        複数段の入力が可能です。
                                    </p>
                                </div>

                                <div class="rounded-bottom mdb-color lighten-3 text-center pt-3">
                                    <ul class="list-unstyled list-inline font-small">
                                        <li class="list-inline-item pr-2 white-text"><i class="fa fa-clock-o pr-1"></i>2018/12/20</li>
                                        <li class="list-inline-item pr-2 white-text">Start: 18:00</li>
                                        <li class="list-inline-item pr-2 white-text">End:   23:00</li>
                                    </ul>
                                </div>
                            </div><!-- /.card -->
                        </div><!-- /.col-lg-4 -->
                    <?php endfor; ?>
                </div><!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <p class="text-right m-0 mb-3">
                            <small><a href="javascript:void(0)">さらに見る<i class="fa fa-angle-right ml-2" aria-hidden="true"></i></a></small>
                        </p>
                    </div>
                </div>
            </section>
        </div><!-- /.container -->
    </div><!-- /.row -->

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <section>

                    <h2 class="section-heading text-center mb-5 my-5 mb-4 font-weight-bold wow fadeIn">DanceTeam R<span class="font-blue">oo</span>ts</h2>

                    <div class="row mb-5 wow fadeIn" data-wow-delay="0.2s">
                        <div class="col-lg-12 mb-2">
                            <ul class="stepper stepper-vertical timeline-simple pl-0">

                                <li>
                                    <a href="#!">
                                        <span class="circle grey"></span>
                                    </a>
                                    <div class="step-content z-depth-1 ml-xl-0 p-4 hoverable grey lighten-5">
                                        <h4 class="font-weight-bold">Sample Team 結成</h4>
                                        <p class="text-muted mt-3"><i class="fa fa-clock-o" aria-hidden="true"></i> 1998</p>
                                        <p class="mb-0">
                                            メンバー構成などの紹介など。基本的にこのコメント欄はどんなことでも構いません。
                                        </p>
                                    </div>
                                </li>
                                <li class="timeline-inverted">
                                    <a href="#!">
                                        <span class="circle grey"></span>
                                    </a>
                                    <div class="step-content z-depth-1 ml-xl-0 p-4 hoverable grey lighten-5">
                                        <h4 class="font-weight-bold">DanceContest@2003 Final HipHop Side 優勝</h4>
                                        <p class="text-muted mt-3"><i class="fa fa-clock-o" aria-hidden="true"></i> 2010</p>
                                        <p class="mb-0">
                                            時系列で活動を記載していくことができます。動画と一緒に閲覧することでより質の高い情報を提供することができます。
                                            使用したアーティスト・曲などがあれば尚良いでしょう。必ずしも動画が必要ではありません。
                                        </p>
                                        <hr>
                                        <div class="embed-responsive embed-responsive-16by9">
                                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/vlDzYIIOYmM" allowfullscreen></iframe>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <a href="#!">
                                        <span class="circle grey"></span>
                                    </a>

                                    <div class="step-content z-depth-1 ml-xl-0 p-4 hoverable grey lighten-5">
                                        <h4 class="font-weight-bold">Sed ut nihil unde omnis</h4>
                                        <p class="text-muted mt-3"><i class="fa fa-clock-o" aria-hidden="true"></i> 2015</p>
                                        <p class="mb-0">Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>
                                    </div>
                                </li>
                                <li class="timeline-inverted">
                                    <!--Section Title -->
                                    <a href="#!">
                                        <span class="circle grey"></span>
                                    </a>

                                    <!-- Section Description -->
                                    <div class="step-content z-depth-1 ml-xl-0 p-4 hoverable grey lighten-5">
                                        <h4 class="font-weight-bold"> Quis autem vel eum voluptate</h4>
                                        <p class="text-muted mt-3"><i class="fa fa-clock-o" aria-hidden="true"></i> 2014</p>
                                        <p class="mb-0">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.</p>
                                    </div>
                                </li>
                                <li>
                                    <!--Section Title -->
                                    <a href="#!">
                                        <span class="circle grey"></span>
                                    </a>

                                    <!-- Section Description -->
                                    <div class="step-content z-depth-1 ml-xl-0 p-4 hoverable grey lighten-5">
                                        <h4 class="font-weight-bold">Mussum ipsum cacilds</h4>
                                        <p class="text-muted mt-3"><i class="fa fa-clock-o" aria-hidden="true"></i> 2013</p>
                                        <p class="mb-0">Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.</p>
                                    </div>
                                </li>
                            </ul>
                        </div><!-- /.col-lg-12 -->
                    </div><!-- /.First row -->
                </section><!-- /.Section -->
            </div><!-- /.col-lg-12 -->
        </div><!-- /.row -->

        <div class="card card-body grey lighten-5 mb-5">
            <div class="row">
                <div class="col-lg-12 pt-4">
                    <h2 class="section-heading text-center mb-5 mb-4 font-weight-bold wow fadeIn">Respect Artists</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 col-md-12 col-xs-12">
                    <iframe allow="autoplay *; encrypted-media *;" frameborder="0" height="350" style="width:100%;max-width:660px;overflow:hidden;background:transparent;" sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation-by-user-activation" src="https://embed.music.apple.com/us/album/the-low-end-theory/278911460?app=music"></iframe>
                </div>
                <div class="col-lg-6 col-md-12 col-xs-12">
                    <iframe allow="autoplay *; encrypted-media *;" frameborder="0" height="350" style="width:100%;max-width:660px;overflow:hidden;background:transparent;" sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation-by-user-activation" src="https://embed.music.apple.com/us/album/kitchen-feat-plus-casual-opio-pep-love-tajai-phesto/660282594?app=music"></iframe>
                </div>
            </div>
        </div><!-- /.card -->

    </div><!-- /.container -->
</main>

<script>
$(function() {
    $('.m--youtube').each(function(i, elem) {
        $('#m--youtube' + i).on('hidden.bs.modal', function (e) {
          $('#m--youtube' + i + ' iframe').attr("src", $('#m--youtube' + i + ' iframe').attr("src"));
        });
    });
});
</script>
