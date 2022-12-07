<?php
include 'common.php';

$day = isset($argv[1]) ? (int)$argv[1] : 0;
$part = isset($argv[2]) ? (int)$argv[2] : 0;

if (!$day || $day < 1 || $day > 24) {
    echo "Enter the day number as first argument (1 to 24)";
} elseif (!$part || $part < 1 || $part > 2) {
    echo "Enter the part number as second argument (1 or 2)";
} else {
    $file = 'day' . sprintf('%02d', $day) . '.php';
    if (file_exists($file)) {
        include $file;
        $obj = new solution($day);
        $obj->run($part);
    } else {
        echo "Assignment for day " . $day . " not completed yet :-(";
    }
}
?>