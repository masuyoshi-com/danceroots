<nav class="navbar fixed-top navbar-toggleable-md navbar-expand-lg scrolling-navbar double-nav">
    <div class="float-left">
        <a href="#" data-activates="slide-out" class="button-collapse"><i class="fa fa-bars"></i></a>
    </div>

    <ul class="nav navbar-nav nav-flex-icons ml-auto">
        <li class="nav-item dropdown">
            <?= $this->Html->link('<i class="fa fa-user"></i> <span class="clearfix d-none d-sm-inline-block">アカウント</span>', '#',
                [
                    'class'         => 'nav-link dropdown-toggle',
                    'id'            => 'navbarDropdownMenuLink',
                    'data-toggle'   => 'dropdown',
                    'aria-haspopup' => 'true',
                    'aria-expanded' => 'false',
                    'escape'        => false
                ]
            ) ?>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                <?= $this->Html->link('ログアウト', ['controller' => 'Users', 'action' => 'logout'], ['class' => 'dropdown-item']) ?>
            </div>
        </li>
    </ul>
</nav>
