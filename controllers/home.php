<?php

use classes\Display;

$data = [
    'message' => 'Hello world'
];

Display::$extra['title'] = 'Hello';
Display::page('home', $data);
