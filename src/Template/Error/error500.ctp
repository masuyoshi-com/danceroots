<?php
use Cake\Core\Configure;
use Cake\Error\Debugger;

$this->layout = 'simple';
$this->assign('title', $message);

if (Configure::read('debug')) :
    $this->layout = 'simple';

    $this->assign('templateName', 'error500.ctp');
    $this->start('file');
?>
<?php if (!empty($error->queryString)) : ?>
    <p class="notice">
        <strong>SQL Query: </strong>
        <?= h($error->queryString) ?>
    </p>
<?php endif; ?>
<?php if (!empty($error->params)) : ?>
        <strong>SQL Query Params: </strong>
        <?php Debugger::dump($error->params) ?>
<?php endif; ?>
<?php if ($error instanceof Error) : ?>
        <strong>Error in: </strong>
        <?= sprintf('%s, line %s', str_replace(ROOT, 'ROOT', $error->getFile()), $error->getLine()) ?>
<?php endif; ?>
<?php
    echo $this->element('auto_table_warning');

    if (extension_loaded('xdebug')) :
        xdebug_print_function_stack();
    endif;

    $this->end();
endif;
?>
<div class="row mt-5 pt-4">
</div>
<div class="container">
    <div class="card card-body mt-5">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h3 class="h3-responsive dark-grey-text"><i class="fa fa-warning orange-text" aria-hidden="true"></i> <?= __d('cake', '内部エラーが起きました') ?></h3>
                <p class="error">
                    <strong><?= __d('cake', 'Error') ?>: </strong>
                    <?= h($message) ?>
                </p>
                <hr>
                <?= $this->Html->link('最初からやり直す', '/', ['class' => 'btn btn-default']) ?>
            </div>
        </div>
    </div>
</div>
