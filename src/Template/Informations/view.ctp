<?php $this->assign('title', 'お知らせ詳細'); ?>

<div class="row">
    <?php if (AD === 0) : ?>
        <div class="col-lg-12 text-center">
            <section id="dynamicContentWrapper-docsPanel" class="mb-5">
                <div class="card border border-danger z-depth-0" style="height: 200px;">
                    <div class="card-body text-center">
                        <p>
                            <strong>広告枠</strong>
                        </p>
                    </div>
                </div>
            </section>
        </div>
    <?php else : ?>
        <div class="row mb-5">
        </div>
    <?php endif; ?>
</div>


<div class="row">
    <div class="col-lg-12">
        <div class="card card-cascade narrower">
            <div class="view gradient-card-header mdb-color lighten-2">
                <h5 class="mb-0 font-bold"><i class="fa fa-globe"></i> <?= h($information->title) ?></h5>
            </div>

            <div class="card-body mb-3">
                <div class="d-flex mb-2">
                    <div class="p-2">
                        <?= $this->Html->link('<i class="fa fa-list"></i> お知らせ一覧', ['action' => 'index'],
                                ['class' => 'btn btn-sm btn-primary', 'escape' => false]
                        ) ?>
                    </div>
                    <div class="ml-auto p-2">
                        <small>
                            お知らせ日 : <?= h($information->created) ?>
                        </small>
                    </div>
                </div>
                <hr class="mt-0">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="md-form">
                            <p>
                                <?= nl2br(h($information->body)) ?>
                            </p>
                        </div>
                    </div>
                </div>
                <hr>
            </div><!-- /.card-body -->
        </div><!-- /.card -->
    </div><!-- /.col-lg-12 -->
</div><!-- /.row -->
