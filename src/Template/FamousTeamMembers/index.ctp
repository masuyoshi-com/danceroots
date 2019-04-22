<?php $this->assign('title', h($famous_team->name) . ' - メンバーリスト'); ?>

<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="d-flex">
            <div>
                <h5 class="h5-responsive font-weight-bold">
                    <span class="none">Famous</span> Team Members
                </h5>
            </div>
            <div class="ml-auto">
                <p class="m-0 grey-text"><small>有名チームメンバー</small></p>
            </div>
        </div>
        <hr class="mt-0">
        <?php if ($member_count <= 20) : ?>
            <div class="mb-3">
                <?= $this->Html->link('<i class="fa fa-plus"></i> メンバー登録',
                        ['controller' => 'FamousTeamMembers', 'action' => 'add'],
                        ['class' => 'btn btn-sm cyan', 'escape' => false]
                )?>
            </div>
        <?php endif; ?>
    </div><!-- /.col-lg-12 -->
</div><!-- /.row -->

<div class="row">
    <div class="col-lg-12">
        <?= $this->Flash->render() ?>
    </div>
</div>

<?php if (count($famousTeamMembers) !== 0) : ?>
<section class="team-section text-center mb-3">
    <div class="card card-body">
        <div class="row">
            <?php foreach ($famousTeamMembers as $member) : ?>
                <div class="col-lg-3 col-md-6 mb-lg-0 mb-5">
                    <div class="avatar mx-auto">
                        <?php
                            if ($member->image) {
                                print $this->Html->image($member->image, ['class' => 'rounded-circle z-depth-1 icon-150', 'alt' => $member->name . 'アバター']);
                            } else {
                                print $this->Html->image('/img/sample/no_icon.jpg', ['class' => 'rounded-circle z-depth-1 icon-150', 'alt' => 'サンプルアバター']);
                            }
                        ?>
                    </div>
                    <h5 class="font-weight-bold mt-4 mb-3"><?= h($member->name) ?></h5>
                    <?php
                        if ($member->leader_flag === 1) {
                            print '<p class="text-uppercase grey-text"><strong>Leader</strong></p>';
                        } else {
                            print '<p class="text-uppercase grey-text"><strong>Member</strong></p>';
                        }
                    ?>
                    <div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-3">
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-6">
                            <div class='d-flex justify-content-around'>
                                <?= $this->Html->link('<i class="fa fa-edit fa-lg" aria-hidden="true"></i>',
                                    ['controller' => 'FamousTeamMembers', 'action' => 'edit', $member->id],
                                    [
                                        'escape'         => false,
                                        'data-toggle'    => 'tooltip',
                                        'data-placement' => 'bottom',
                                        'title'          => '編集'
                                    ]
                                ) ?>

                                <?= $this->Form->postLink('<i class="fa fa-trash fa-lg pink-text" aria-hidden="true"></i>',
                                    ['controller' => 'FamousTeamMembers', 'action' => 'delete', $member->id],
                                    [
                                        'escape'         => false,
                                        'data-toggle'    => 'tooltip',
                                        'data-placement' => 'bottom',
                                        'title'          => '削除',
                                        'confirm'        => 'メンバーを削除します。本当によろしいですか？'
                                    ]
                                ) ?>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-3">
                        </div>
                    </div><!-- /.row -->
                    <hr>
                </div><!-- /.col-lg-3 -->
            <?php endforeach; ?>
        </div><!-- /.row -->
    </div><!-- ./card -->
</section>
<?php else : ?>
<div class="card card-body">
    <div class="row">
        <div class="col-lg-12">
            <p class="dark-grey-text text-center mb-0">現在メンバーはいません。</p>
        </div>
    </div>
</div>
<?php endif; ?>
