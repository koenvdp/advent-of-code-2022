<?php
class solution extends abstractSolution
{
    public function run($partNr)
    {
        $elves = [0 => 0];
        $key = 0;
        foreach ($this->data as $calories) {
            if (empty($calories)) {
                $key++;
                $elves[$key] = 0;
            }
            $elves[$key] += (int)$calories;
        }

        $this->output('Part I', 'green');
        $this->output(max($elves));

        if ($partNr > 1) {
            $total = 0;
            $found = 0;
            while ($found < 3) {
                $maxVal = max($elves);
                $maxValKeys = array_keys($elves, $maxVal);
                $amuntOfElves = count($maxValKeys);
                $total += $amuntOfElves * $maxVal;
                $found += $amuntOfElves;
                foreach ($maxValKeys as $maxValKey) {
                    unset($elves[$maxValKey]);
                }
            }

            $this->output('Part II', 'green');
            $this->output($total);
        }
    }
}
