<nav class="navbar fixed-top navbar-toggleable-md navbar-expand-lg scrolling-navbar double-nav">
    <div class="float-left">
        <a href="#" data-activates="slide-out" class="button-collapse"><i class="fa fa-bars"></i></a>
    </div>

    <ul class="nav navbar-nav nav-flex-icons ml-auto">
        <li class="nav-item dropdown">
            <?= $this->Html->link('<span class="clearfix d-none d-sm-inline-block">エラー</span>', 'javascript:void(0)',
                [
                    'class'         => 'nav-link',
                    'aria-haspopup' => 'true',
                    'aria-expanded' => 'false',
                    'escape'        => false
                ]
            ) ?>
        </li>
    </ul>
</nav>
