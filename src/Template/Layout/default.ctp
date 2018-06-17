<!DOCTYPE html>
<html lang="jp">

<head>
    <?= $this->Html->charset() ?>
    <?= $this->Html->meta(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']) ?>
    <?= $this->Html->meta(['http-equiv' => 'x-ua-compatible', 'content' => 'ie=edge']) ?>
    <title>Danceroots | <?= $this->fetch('title') ?></title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css') ?>
    <?= $this->Html->css('bootstrap.min') ?>
    <?= $this->Html->css('mdb.min') ?>
    <?= $this->Html->css('style') ?>
    <?= $this->Html->script('jquery-3.2.1.min') ?>

    <?php if (strstr($url, 'studios/view') || strstr($url, 'events/view')) : ?>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgKCqD5RxbGvn317awtqsiexBBd5wJRPo" type="text/javascript"></script>
        <?= $this->Html->script('googlemap') ?>
    <?php endif; ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>

<body class="fixed-sn black-skin">

    <header>
        <?= $this->element('Menu/sidebar') ?>
        <?= $this->element('Menu/navbar') ?>
    </header>

    <main>
        <div class="container-fluid">
            <?= $this->element('Modal/feedback') ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>

    <?= $this->Html->script('popper.min') ?>
    <?= $this->Html->script('bootstrap.min') ?>
    <?= $this->Html->script('mdb.min') ?>
    <?= $this->Html->script('script') ?>

    <?php if (strstr($url, 'view')) : ?>
        <?= $this->Html->script('facebook') ?>
    <?php endif; ?>

    <script>
    $(function () {

        $('#mdb-lightbox-ui').load('<?= $this->Url->build('/mdb-addons/mdb-lightbox-ui.html') ?>');

        initRun.feedback('<?= $this->Url->build(['controller' => 'Feedbacks', 'action' => 'add']) ?>');

        initRun.circleDelete(
            '<?= $this->Url->build(['controller' => 'Circles', 'action' => 'delete']) ?>',
            '<?= $this->Url->build(['controller' => 'Circles', 'action' => 'list', $logins['id']]) ?>'
        );

        <?php if (strstr($url, 'events/view')) : ?>
            initRun.eventDelete(
                '<?= $this->Url->build(['controller' => 'Events', 'action' => 'delete']) ?>',
                '<?= $this->Url->build(['controller' => 'Events', 'action' => 'list', $logins['id']]) ?>'
            );
        <?php endif;?>

        <?php if (strstr($url, 'jobs/view')) : ?>
            initRun.jobDelete(
                '<?= $this->Url->build(['controller' => 'Jobs', 'action' => 'delete']) ?>',
                '<?= $this->Url->build(['controller' => 'Jobs', 'action' => 'list', $logins['id']]) ?>'
            );
        <?php endif;?>
    });
    </script>
</body>
</html>
