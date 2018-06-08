<?php $this->assign('title', 'サークルメンバーリスト'); ?>

<section class="team-section text-center">

    <h2 class="h2-responsive font-weight-bold"><?= h($circle->name) ?> メンバーリスト</h2>
    <hr>

    <div class="row">
        <div class="col-lg-12">
            <p class="dark-grey-text mx-auto">
                <i class="fa fa-info-circle"></i> <?= h($circle->name) ?>に参加しているメンバーです。プロフィールの参照、メッセージ送信などが行えます。
            </p>
            <hr>
        </div>
        <div class="col-lg-12">
            <div class="d-flex mb-2">
                <div class="p-2">
                    <?= $this->Html->link('<i class="fa fa-home"></i> サークルホーム',
                            ['controller' => 'Circles', 'action' => 'home', h($circle->id), $logins['id']],
                            ['class' => 'btn btn-sm btn-warning', 'escape' => false]
                    )?>
                </div>
                <div class="ml-auto p-2 dark-gray-text">
                    <small class="align-bottom">
                        <?= $this->Paginator->counter('{{page}} / {{pages}} ページ &nbsp; 全 {{count}} 件') ?>
                    </small>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <?= $this->Flash->render() ?>
        </div>
    </div>

    <div class="card card-body">
        <div class="row">
            <?php foreach ($circle_groups as $group) : ?>
            <div class="col-lg-3 col-md-6 mb-lg-0 mb-5">
                <div class="avatar mx-auto">
                    <?php
                        if ($group->profile->icon) {
                            print $this->Html->image($group->profile->icon, ['class' => 'rounded-circle z-depth-1', 'alt' => 'avater']);
                        } else {
                            print $this->Html->image('/img/sample/no_icon.jpg', ['class' => 'rounded-circle z-depth-1', 'alt' => 'avater']);
                        }
                    ?>
                </div>
                <h5 class="font-weight-bold mt-4 mb-3">
                    <?= $this->Html->link(h($group->user->username), $group->link, ['class' => 'dark-grey-text', 'target' => '_blank']) ?>
                </h5>
                <?php if ($group->profile->team_name) : ?>
                <p>
                    <small>
                        <?= $this->Html->link(h($group->profile->team_name), $group->link, ['class' => 'black-text', 'target' => '_blank']) ?>
                    </small>
                </p>
                <?php endif; ?>
                <hr>
                <p class="grey-text"><?= h($group->profile->self_intro) ?></p>
                <ul class="list-unstyled personal-sm mb-0">
                    <?php
                        if ($group->user->id !== $logins['id']) {

                            print $this->Html->link('<i class="fa fa-envelope" area-hidden="true"></i>',
                                    ['controller' => 'Messages', 'action' => 'add', $logins['id'], h($group->user->id)],
                                    [
                                        'class'          => 'p-2 fa-lg email-ic',
                                        'data-toggle'    => 'tooltip',
                                        'data-placement' => 'bottom',
                                        'title'          => 'メッセージ',
                                        'escape'         => false
                                    ]
                            );
                        }
                    ?>
                    <?php
                        if ($group->profile->facebook) {
                            print $this->Html->link('<i class="fa fa-facebook" area-hidden="true"></i>',
                                h($group->profile->facebook),
                                    [
                                        'class'          => 'p-2 fa-lg fb-ic',
                                        'data-toggle'    => 'tooltip',
                                        'data-placement' => 'bottom',
                                        'title'          => 'Facebook',
                                        'target'         => '_blank',
                                        'escape'         => false
                                    ]
                            );
                        }
                    ?>
                    <?php
                        if ($group->profile->twitter) {
                            print $this->Html->link('<i class="fa fa-twitter" area-hidden="true"></i>',
                                h($group->profile->twitter),
                                    [
                                        'class'          => 'p-2 fa-lg tw-ic',
                                        'data-toggle'    => 'tooltip',
                                        'data-placement' => 'bottom',
                                        'title'          => 'Twitter',
                                        'target'         => '_blank',
                                        'escape'         => false
                                    ]
                            );
                        }
                    ?>
                    <?php
                        if ($group->profile->instagram) {
                            print $this->Html->link('<i class="fa fa-instagram" area-hidden="true"></i>',
                                h($group->profile->instagram),
                                    [
                                        'class'          => 'p-2 fa-lg ins-ic',
                                        'data-toggle'    => 'tooltip',
                                        'data-placement' => 'bottom',
                                        'title'          => 'Instagram',
                                        'target'         => '_blank',
                                        'escape'         => false
                                    ]
                            );
                        }
                    ?>
                </ul>
            </div><!-- /.col-lg-3 -->
            <?php endforeach; ?>
        </div><!-- /.row -->
    </div><!-- ./card -->
    <hr>
    <div class="row">
        <div class="col-lg-12">
            <nav aria-label="pagination">
                <ul class="pagination pg-blue justify-content-center">
                    <?= $this->Paginator->prev(__('前へ')) ?>
                    <?= $this->Paginator->numbers() ?>
                    <?= $this->Paginator->next(__('次へ')) ?>
                </ul>
            </nav>
        </div>
    </div>
</section>
