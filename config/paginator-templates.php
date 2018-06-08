<?php

return [
    'prevActive' => '<li class="page-item">
            <a class="page-link" href="{{url}}" aria-label="Previous">
                <span aria-hidden="true">{{text}}</span>
            </a>
        </li>',

    'prevDisabled' => '<li class="page-item disabled">
            <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">{{text}}</span>
            </a>
        </li>',

    'nextActive' => '<li class="page-item">
            <a class="page-link" href="{{url}}" aria-label="Next">
                <span aria-hidden="true">{{text}}</span>
                <span class="sr-only">Next</span>
            </a>
        </li>',

    'nextDisabled' => '<li class="page-item disabled">
            <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">{{text}}</span>
                <span class="sr-only">Next</span>
            </a>
        </li>',

    'number' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
    'current' => '<li class="page-item active"><a class="page-link" href="{{url}}">{{text}}</a></li>',
];

?>
