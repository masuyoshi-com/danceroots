<?php $this->assign('title', h($famous->name) . ' - プロフィール活動経歴'); ?>

<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="d-flex">
            <div>
                <h5 class="h5-responsive font-weight-bold">
                    Dance R<span class="font-blue">oo</span>ts
                </h5>
            </div>
            <div class="ml-auto">
                <p class="m-0 grey-text"><small>ダンスルーツ</small></p>
            </div>
        </div>
        <hr class="mt-0">
        <div class="mb-3">
            <?= $this->Html->link('<i class="fa fa-plus"></i> ルーツ登録',
                ['controller' => 'FamousRoots', 'action' => 'add'],
                ['class' => 'btn btn-sm cyan', 'escape' => false]
            )?>
        </div>
    </div><!-- /.col-lg-12 -->
</div><!-- /.row -->

<div class="row">
    <div class="col-lg-12">
        <?= $this->Flash->render() ?>
    </div>
</div>

<div class="row mb-3">
    <div class="col-lg-12 mb-2">
        <ul class="stepper stepper-vertical timeline-simple pl-0">
            <?php $i = 0; foreach ($famousRoots as $root) : ?>
                <?php
                    if ($i % 2 === 0) {
                        print '<li>';
                    } else {
                        print '<li class="timeline-inverted">';
                    }
                ?>
                    <a href="#!">
                        <span class="circle grey"></span>
                    </a>
                    <div class="step-content z-depth-1 ml-xl-0 p-4 hoverable">
                        <h5 class="h5-responsive font-weight-bold text-center"><?= h($root->title) ?></h5>
                        <p class="text-muted mt-3"><i class="fa fa-clock-o" aria-hidden="true"></i> <?= h($root->year) ?></p>
                        <p class="mb-0">
                            <?= nl2br(h($root->body)) ?>
                        </p>
                        <?php if ($root->youtube) : ?>
                            <div class="modal fade m--youtube" id="m--youtube<?= $i ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= h($root->youtube) ?>?rel=0" allowfullscreen></iframe>
                                            </div>
                                        </div><!-- /.modal-body -->
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->

                            <hr>

                            <div class="col-lg-12">
                                <div class="text-center" style="cursor: pointer;">
                                    <?= $this->Html->image('https://img.youtube.com/vi/' . h($root->youtube) . '/mqdefault.jpg',
                                        [
                                            'class'       => 'img-fluid',
                                            'data-toggle' => 'modal',
                                            'data-target' => '#m--youtube' . $i
                                        ]
                                    ) ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        <hr>
                        <div class="d-flex justify-content-around">
                            <div>
                                <?= $this->Html->link('EDIT',
                                    ['controller' => 'FamousRoots', 'action' => 'edit', $root->id],
                                    [
                                        'class' => 'font-weight-bold',
                                        'escape' => false
                                    ]
                                ) ?>
                            </div>
                            <div>
                                <?= $this->Form->postLink('DELETE',
                                    ['controller' => 'FamousRoots', 'action' => 'delete', $root->id],
                                    [
                                        'class' => 'pink-text font-weight-bold',
                                        'escape' => false,
                                        'confirm' => '経歴を削除します。本当によろしいですか？'
                                    ]
                                ) ?>
                            </div>
                        </div>
                    </div><!-- /.step-content -->
                </li>
            <?php $i++; endforeach; ?>
        </ul>
    </div><!-- /.col-lg-12 -->
</div><!-- /.First row -->

<script>
$(function() {
    $('.m--youtube').each(function(i, elem) {
        $('#m--youtube' + i).on('hidden.bs.modal', function (e) {
          $('#m--youtube' + i + ' iframe').attr("src", $('#m--youtube' + i + ' iframe').attr("src"));
        });
    });
});
</script>
