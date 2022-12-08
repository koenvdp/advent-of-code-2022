<?php
class solution extends abstractSolution
{
    protected function part1()
    {
        $sum = 0;
        foreach ($this->data as $line) {
            $size = strlen($line) / 2;
            $compartments = str_split($line, $size);
            $charsCompartmentA = str_split($compartments[0]);
            $commonChar = '';
            for ($i = 0; $i < $size; $i++) {
                if (in_array($compartments[1][$i], $charsCompartmentA)) {
                    $commonChar = $compartments[1][$i];
                    break;
                }
            }

            $points = $this->getPoints($commonChar);
            $this->output($compartments[0] . ' ' . $compartments[1] . ' -> ' . $commonChar . ' (' . $points . ')');
            $sum += $points;
        }

        $this->output("\nSum: " . $sum, 'blue');
    }

    protected function part2()
    {
        $sum = 0;
        $max = count($this->data);
        for ($i = 0; $i < $max; $i += 3) {
            $commonChar = '';
            $charsElve1 = str_split($this->data[$i]);
            $charsElve2 = str_split($this->data[$i + 1]);

            $backpackSize = strlen($this->data[$i + 2]);
            for ($j = 0; $j < $backpackSize; $j++) {
                $char = $this->data[$i + 2][$j];
                if (in_array($char, $charsElve1) && in_array($char, $charsElve2)) {
                    $commonChar = $char;
                    break;
                }
            }

            $points = $this->getPoints($commonChar);
            $this->output($this->data[$i] . ' ' . $this->data[$i + 1] . ' ' . $this->data[$i + 2] . ' -> ' . $commonChar . ' (' . $points . ')');
            $sum += $points;
        }

        $this->output("\nSum: " . $sum, 'blue');
    }

    private function getPoints($char)
    {
        $ord = ord($char);
        if ($ord < 97) {
            return $ord - 38;
        } else {
            return $ord - 96;
        }
    }
}
