<?php

function getSourcePath() {
    $dir=__DIR__;
    $srcPosition = strpos($dir, 'feedback');
    if ($srcPosition !== false) {
        return substr($dir, 0, $srcPosition + 8);
    }
    return $dir;
}
?>