<?php
use Cake\Core\Configure;
use Cake\Error\Debugger;

$this->layout = 'my_error';
$this->assign('title', $message);

if (Configure::read('debug')) :
    $this->layout = 'my_error';

    $this->assign('templateName', 'error400.ctp');

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
<?= $this->element('auto_table_warning') ?>
<?php
if (extension_loaded('xdebug')) :
    xdebug_print_function_stack();
endif;

$this->end();
endif;
?>
<div class="card card-body">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h3 class="h3-responsive dark-grey-text"><i class="fa fa-warning orange-text" aria-hidden="true"></i> <?= h($message) ?></h3>
            <p class="error">
                <strong><?= __d('cake', 'Error') ?>: </strong>
                <?= __d('cake', 'The requested address {0} was not found on this server.', "<strong>'{$url}'</strong>") ?>
            </p>
            <hr>
            <?= $this->Html->link('最初からやり直す', '/', ['class' => 'btn btn-default']) ?>
        </div>
    </div>
</div>
