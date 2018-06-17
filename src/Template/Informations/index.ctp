<?php $this->assign('title', 'お知らせ一覧'); ?>

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
                <h5 class="mb-0 font-bold"><i class="fa fa-globe"></i> DanceRootsからのお知らせ</h5>
            </div>

            <div class="card-body mb-3">
                <div class="row">
                    <div class="col-lg-12">
                        <p class="dark-gray-text text-right">
                            <small>
                                <?= $this->Paginator->counter('{{page}} / {{pages}} ページ &nbsp; 全 {{count}} 件') ?>
                            </small>
                        </p>
                        <hr>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>タイトル</th>
                            <th>お知らせ日</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($informations as $information) : ?>
                            <tr>
                                <td>
                                    <?= $this->Html->link(h($information->title), ['action' => 'view', $information->id]) ?>
                                </td>
                                <td><?= h($information->created) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
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

            </div><!-- /.card-body -->
        </div><!-- /.card -->
    </div><!-- /.col-lg-12 -->
</div><!-- /.row -->
