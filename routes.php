<?php
return [
    '~^group$~' => [\controllers\groupcontroller::class, 'showAll'],
    '~^group\/(\d+)\/edit$~' => [\controllers\groupcontroller::class, 'edit'],
    '~^group\/(\d+)\/delete$~' => [\controllers\groupcontroller::class, 'delete'],
    '~^group\/add$~' => [\controllers\groupcontroller::class, 'add'],

    '~^student$~' => [\controllers\studentcontroller::class, 'showAll'],
    '~^student\/add$~' => [\controllers\studentcontroller::class, 'add'],
    '~^student\/(\d+)\/edit$~' => [\controllers\studentcontroller::class, 'edit'],
    '~^student\/(\d+)\/delete$~' => [\controllers\studentcontroller::class, 'delete'],

    '~^subject$~' => [\controllers\subjectcontroller::class, 'showAll'],
    '~^subject\/add$~' => [\controllers\subjectcontroller::class, 'add'],
    '~^subject\/(\d+)\/edit$~' => [\controllers\subjectcontroller::class, 'edit'],
    '~^subject\/(\d+)\/delete$~' => [\controllers\subjectcontroller::class, 'delete'],

    '~^groupsubject$~' => [\controllers\groupsubjectcontroller::class, 'showAll'],
    '~^groupsubject\/add$~' => [\controllers\groupsubjectcontroller::class, 'add'],
    '~^groupsubject\/(\d+)\/edit$~' => [\controllers\groupsubjectcontroller::class, 'edit'],
    '~^groupsubject\/(\d+)\/delete$~' => [\controllers\groupsubjectcontroller::class, 'delete'],

    '~^mark$~' => [\controllers\markcontroller::class, 'showAll'],
    '~^mark\/add$~' => [\controllers\markcontroller::class, 'add'],
    '~^mark\/(\d+)\/edit$~' => [\controllers\markcontroller::class, 'edit'],
    '~^mark\/(\d+)\/delete$~' => [\controllers\markcontroller::class, 'delete'],

    '~^$~' => [\controllers\maincontroller::class, 'showRating'],
]
?>