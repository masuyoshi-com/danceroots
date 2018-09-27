<?php $this->assign('title', $forum->title) ?>

<?php if (AD === 0) : ?>
<div class="row">
    <div class="col-lg-12 text-center">
        <section id="dynamicContentWrapper-docsPanel" class="mb-4">
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

<div class="row">
    <div class="col-lg-12">
        <div class="jumbotron p-4 text-center text-md-left author-box">
            <h4 class="h4-responsive text-center font-weight-bold dark-grey-text mb-0">
                <span class="badge <?= getBadgeColor($forum->category) ?> mr-2"><?= h($forum->category) ?></span><?= h($forum->title) ?>
            </h4>
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
                    <?php if ($forum->user_id === $logins['id']) : ?>
                        <hr>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <p>
                                    <?= $this->Html->link('<i class="fa fa-edit mr-2"></i>編集',
                                        ['controller' => 'Forums', 'action' => 'edit', $forum->id],
                                        ['class' => 'btn btn-sm btn-primary', 'escape' => false]
                                    ) ?>
                                </p>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <?= $this->Form->postLink('<i class="fa fa-close mr-2"></i><small>削除</small>',
                                    ['controller' => 'Forums', 'action' => 'delete', $forum->id],
                                    [
                                        'class'  => 'btn btn-sm btn-danger',
                                        'escape' => false,
                                        'confirm' => 'スレッドを削除します。本当によろしいですか？'
                                    ]
                                ) ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-lg-9 col-md-9 col-xs-12">
                    <div class="p-3 z-depth-1 w-100" style="background-color: #f4f7fb;">
                        <div class="header">
                            <?php
                                if ($forum->anonymous_flag === 0) {
                                    print '<span class="font-weight-bold">' . h($forum->user->username) . '</span>';
                                } else {
                                    print '<span class="font-weight-bold">匿名ユーザー</span>';
                                }
                            ?>
                            <small class="pull-right text-muted pt-3">
                                <i class="fa fa-clock-o"></i> <?= h($forum->created->timeAgoInWords(['format' => 'MMM d, YYY', 'end' => '+1 year'])) ?>
                            </small>
                        </div>
                        <hr class="w-100">
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
                </div>
            </div>
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
        <!-- Grid row -->
        <div class="row px-lg-2 px-2">
            <!-- Grid column -->
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
                        <?= $this->Form->create('', ['url' => ['controller' => 'ForumComments', 'action' => 'add']]) ?>
                        <?= $this->Form->hidden('user_id',  ['value' => $logins['id']]) ?>
                        <?= $this->Form->hidden('forum_id', ['value' => $forum->id]) ?>
                        <li class="white">
                            <div class="form-group basic-textarea">
                                <?= $this->Form->textarea('comment',
                                    [
                                        'id'          => 'f--comment',
                                        'class'       => 'form-control pl-2 my-0',
                                        'rows'        => '4',
                                        'placeholder' => 'コメントを入力'
                                    ]
                                ) ?>
                            </div>
                        </li>
                        <li class="white">
                            <div class="form-check p-2">
                                <?= $this->Form->checkbox('anonymous_flag', ['class' => 'form-check-input', 'id' => 'materialUnchecked']) ?>
                                <label class="form-check-label dark-grey-text" for="materialUnchecked"><small>匿名で書き込み</small></label>
                            </div>
                        </li>
                        <li>
                            <?= $this->Form->button('コメント', ['type' => 'submit', 'class' => 'btn btn-info btn-rounded btn-sm waves-effect waves-light float-right mt-3']) ?>
                        </li>
                        <?= $this->Form->end() ?>
                    </ul>
                </div><!-- /.chat-message -->
            </div><!-- /.col-lg-12 -->
        </div><!-- /.row -->
    </div><!-- /.card-body -->
</div><!-- /.card -->
