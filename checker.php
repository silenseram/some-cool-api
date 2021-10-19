<?php
$content = file_get_contents('debug.log');
$lines = explode("\n", $content);

var_dump(count($lines));
