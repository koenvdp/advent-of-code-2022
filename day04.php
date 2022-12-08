<?php
class solution extends abstractSolution
{
    public function run($partNr)
    {
        $contains = $overlaps = 0;
        foreach ($this->data as $line) {
            list($elve1, $elve2) = explode(',', $line);
            list($elve1Start, $elve1End) = explode('-', $elve1);
            list($elve2Start, $elve2End) = explode('-', $elve2);

            $this->output(str_pad($elve1, 5) . ' + ' .str_pad($elve2, 5) . ' -> ', null, false);

            if (
                ($elve1Start >= $elve2Start && $elve1Start <= $elve2End && $elve1End <= $elve2End)
                || ($elve2Start >= $elve1Start && $elve2Start <= $elve1End && $elve2End <= $elve1End)
            ) {
                $this->output("CONT_Y ", 'green', $partNr == 1);
                $contains++;
            } else {
                $this->output("CONT_N ", 'red', $partNr == 1);
            }

            if ($partNr == 2) {
                if (
                    ($elve1Start <= $elve2Start && $elve1End >= $elve2Start)
                    || ($elve2Start <= $elve1Start && $elve2End >= $elve1Start)
                ) {
                    $this->output("OVER_Y ", 'yellow');
                    $overlaps++;
                } else {
                    $this->output("OVER_N ", 'red');
                }
            }
        }

        $this->output("\nContains: " . $contains, 'green');

        if ($partNr == 2) {
            $this->output("\nOverlaps: " . $overlaps, 'yellow');
        }
    }
}
