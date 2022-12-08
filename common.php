<?php

abstract class AbstractSolution {
    
    protected $data = [];
    
    function __construct($day)
    {
        $this->data = $this->loadData($day);
    }
    
    function loadData($day)
    {
        $fileName = 'data/day' . sprintf('%02d', $day)  . '.txt';
        if (!file_exists($fileName)) {
            $this->output('ERROR: file does not exist', 'red', true);
        }
        $lines = file($fileName);
        $data = [];
        foreach ($lines as $line) {
            $line = rtrim($line);
            $data[] = $line;
        }

        return $data;
    }

    public function run($partNr)
    {
        if ($partNr == 2) {
            $this->part2();
        } else {
            $this->part1();
        }
    }

    protected function part1()
    {

    }

    protected function part2()
    {

    }

    function output($txt, $color = null, $newline = true, $die = false)
    {
        $output = '';
        if ($color) {
            $output .= "\033[";
            switch ($color) {
                case 'red':
                    $output .= '31m';
                    break;
                case 'green':
                    $output .= '32m';
                    break;
                case 'yellow':
                    $output .= '33m';
                    break;
                case 'blue':
                    $output .= '34m';
                    break;
            }
        }

        $output .= $txt;
        if ($color) {
            $output .= "\033[0m";
        }
        if ($newline) {
            $output .= "\n";
        }

        echo $output;
        if ($die) {
            exit;
        }
    }
}