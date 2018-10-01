<?php $this->assign('title', $forum->title) ?>

<div class="row mt-5">
</div>

<?php if (AD === 0) : ?>
<div class="row mt-2">
    <div class="col-lg-12 text-center">
        <section id="dynamicContentWrapper-docsPanel">
            <div class="card border border-danger z-depth-0" style="height: 200px;">
                <div class="card-body text-center">
                    <p>
                        <strong>広告枠</strong>
                    </p>
                </div>
            </div>
        </section>
    </div>
</div>
<?php endif; ?>

<div class="row mt-3">
    <div class="col-lg-12">
        <div class="jumbotron p-4 text-md-left author-box">
            <h5 class="h5-responsive text-center font-weight-bold dark-grey-text mb-0">
                <span class="badge <?= getBadgeColor($forum->category) ?> mr-2"><?= h($forum->category) ?></span>
                <?= h($forum->title) ?>
            </h6>
            <p class="text-right m-0">
                <button type="button" class="btn btn-sm btn-comm btn-lg">
                    <i class="fa fa-comments fa-3x"></i>
                </button>
                <span class="counter"><?= count($forum->forum_comments) ?></span>
            </p>
            <hr class="mt-0">
            <div class="row mt-3">
                <div class="col-lg-3 col-md-3 col-xs-12 text-center mt-2 mb-3">
                    <?php
                        if ($forum->anonymous_flag === 0) {
                            print $this->Html->image($forum->profile->icon, ['class' => 'avatar rounded-circle mr-2 ml-lg-3 z-depth-1']);
                        } else {
                            print $this->Html->image('/img/sample/no_icon.jpg', ['class' => 'avatar rounded-circle mr-2 ml-lg-3 z-depth-1']);
                        }
                    ?>
                </div>
                <div class="col-lg-9 col-md-9 col-xs-12">
                    <div class="p-3 z-depth-1 w-100" style="background-color: #f4f7fb;">
                        <div class="header">
                            <p class="mb-0">
                                <?php
                                    if ($forum->anonymous_flag === 0) {
                                        print '<span class="font-weight-bold">' . h($forum->user->username) . '</span>';
                                    } else {
                                        print '<span class="font-weight-bold">匿名ユーザー</span>';
                                    }
                                ?>
                            </p>
                            <p>
                                <small class="pull-right text-muted">
                                    <i class="fa fa-clock-o"></i> <?= h($forum->created->timeAgoInWords(['format' => 'MMM d, YYY', 'end' => '+1 year'])) ?>
                                </small>
                            </p>
                        </div>
                        <hr>
                        <p class="mb-0">
                            <?= nl2br(h($forum->body)) ?>
                            <hr>
                            <?php if ($forum->youtube) : ?>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="embed-responsive embed-responsive-16by9 z-depth-1">
                                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= h($forum->youtube) ?>" style="height: 101%" allowfullscreen></iframe>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </p>
                    </div>
                </div><!-- /.col-lg-9 -->
            </div><!-- /.row -->
        </div><!-- /.jumbotron -->
    </div><!-- /.col-lg-12 -->
</div><!-- /.row -->

<div class="row">
    <div class="col-lg-12">
        <?= $this->Flash->render() ?>
    </div>
</div>

<div class="card grey lighten-4 chat-room mb-3">
    <div class="card-body">
        <div class="row px-lg-2 px-2">
            <div class="col-lg-12 px-lg-auto px-0">
                <div class="chat-message">
                    <ul class="list-unstyled chat">
                        <?php if (!empty($forum->forum_comments)) : ?>
                            <?php $i = 0; foreach ($forum->forum_comments as $forumComments) : ?>
                                <?php if ($i % 2 === 0) : ?>
                                    <li class="d-flex justify-content-between mb-4">
                                        <?php
                                            if ($forumComments->anonymous_flag === 0) {
                                                print $this->Html->image($forumComments->profile->icon, ['class' => 'avatar rounded-circle mr-2 ml-lg-3 ml-0 z-depth-1']);
                                            } else {
                                                print $this->Html->image('/img/sample/no_icon.jpg', ['class' => 'avatar rounded-circle mr-2 ml-lg-3 z-depth-1']);
                                            }
                                        ?>
                                        <div class="chat-body white p-3 ml-2 z-depth-1 w-100">
                                            <div class="header dark-grey-text">
                                                <?php
                                                    if ($forumComments->anonymous_flag === 0) {
                                                        print '<strong class="primary-font">' . h($forum->user->username) . '</strong>';
                                                    } else {
                                                        print '<strong class="primary-font">匿名ユーザー</strong>';
                                                    }
                                                ?>
                                                <small class="pull-right text-muted">
                                                    <i class="fa fa-clock-o"></i> <?= h($forumComments->created->timeAgoInWords(['format' => 'MMM d, YYY', 'end' => '+1 year'])) ?>
                                                </small>
                                            </div>
                                            <hr class="w-100">
                                            <p class="mb-0">
                                                <?= nl2br(h($forumComments->comment)) ?>
                                            </p>
                                        </div>
                                    </li>
                                <?php else : ?>
                                    <li class="d-flex justify-content-between mb-4">
                                        <div class="chat-body white p-3 z-depth-1 w-100">
                                            <div class="header">
                                                <?php
                                                    if ($forumComments->anonymous_flag === 0) {
                                                        print '<strong class="primary-font">' . h($forum->user->username) . '</strong>';
                                                    } else {
                                                        print '<strong class="primary-font">匿名ユーザー</strong>';
                                                    }
                                                ?>
                                                <small class="pull-right text-muted">
                                                    <i class="fa fa-clock-o"></i> <?= h($forumComments->created->timeAgoInWords(['format' => 'MMM d, YYY', 'end' => '+1 year'])) ?>
                                                </small>
                                            </div>
                                            <hr class="w-100">
                                            <p class="mb-0">
                                                <?= nl2br(h($forumComments->comment)) ?>
                                            </p>
                                        </div>
                                        <?php
                                            if ($forumComments->anonymous_flag === 0) {
                                                print $this->Html->image($forumComments->profile->icon, ['class' => 'avatar rounded-circle mr-1 ml-lg-3 ml-3 z-depth-1']);
                                            } else {
                                                print $this->Html->image('/img/sample/no_icon.jpg', ['class' => 'avatar rounded-circle mr-1 ml-lg-3 ml-3 z-depth-1']);
                                            }
                                        ?>
                                    </li>
                                <?php endif; ?>
                            <?php $i++; endforeach; ?>
                        <?php endif; ?>
                        <li>
                            <div class="p-2 z-depth-1 w-100" style="background-color: #f4f7fb;">
                                <p class="mb-0 text-center">
                                    <small>
                                        <?php
                                            if (isset($logins['id'])) {
                                                print $this->Html->link('コメントは会員側画面で入力できます。', ['controller' => 'Forums', 'action' => 'view', $forum->id]);
                                            } else {
                                                print $this->Html->link('ログインしてコメントする', ['controller' => 'Users', 'action' => 'login']);
                                            }
                                        ?>
                                    </small>
                                </p>
                            </div>
                        </li>
                    </ul>
                </div><!-- /.chat-message -->
            </div><!-- /.col-lg-12 -->
        </div><!-- /.row -->
    </div><!-- /.card-body -->
</div><!-- /.card -->
