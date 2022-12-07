<?php
class solution extends abstractSolution
{
    public function run($partNr)
    {
        $options = [
            'A' => [
                'name'    => 'Rock',
                'defeats' => 'C',
                'points'  => 1,
            ],
            'B' => [
                'name'    => 'Paper',
                'defeats' => 'A',
                'points'  => 2,
            ],
            'C' => [
                'name'    => 'Scissors',
                'defeats' => 'B',
                'points'  => 3,
            ],
        ];
        $convert = ['X' => 'A', 'Y' => 'B', 'Z' => 'C'];

        $totalPoints = 0;
        foreach ($this->data as $line) {
            $yourChoiceKey = $line[0];
            $myChoiceKey   = $convert[$line[2]];
            $yourChoice    = $options[$yourChoiceKey];
            $myChoice      = $options[$myChoiceKey];

            $wins = null;
            if ($yourChoice['defeats'] == $myChoiceKey) {
                $wins = 'you';
            } elseif ($myChoice['defeats'] == $yourChoiceKey) {
                $wins = 'me';
            }

            $this->output($yourChoice['name'], $wins == 'you' ? 'green' : null, false);
            $this->output(' vs ', null, false);
            $this->output($myChoice['name'], $wins == 'me' ? 'green' : null, false);

            $length = strlen($yourChoice['name'] . $myChoice['name']) + 4;
            $this->output(str_repeat(' ', 25 - $length), null, false);

            $points = $myChoice['points'] + ($wins ? ($wins == 'me' ? 6 : 0) : 3);
            $this->output(' -> ' . $points);
            $totalPoints += $points;
        }

        $this->output("\nTotal points: " . $totalPoints, 'blue');
    }
}
