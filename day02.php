<?php
class solution extends abstractSolution
{
    public function run($partNr)
    {
        $options = [
            'A' => [
                'name'    => 'Rock',
                'points'  => 1,
            ],
            'B' => [
                'name'    => 'Paper',
                'points'  => 2,
            ],
            'C' => [
                'name'    => 'Scissors',
                'points'  => 3,
            ],
        ];
        $convert = ['X' => 'A', 'Y' => 'B', 'Z' => 'C'];
        $defeats = ['A' => 'C', 'B' => 'A', 'C' => 'B'];
        $loses   = array_flip($defeats);

        $totalPoints = 0;
        foreach ($this->data as $line) {
            $yourChoice = $line[0];
            if ($partNr == 2) {
                if ($line[2] == 'X') {
                    $myChoice = $defeats[$yourChoice];
                } elseif ($line[2] == 'Z') {
                    $myChoice = $loses[$yourChoice];
                } else {
                    $myChoice = $yourChoice;
                }
            } else {
                $myChoice   = $convert[$line[2]];
            }

            $wins = null;
            if ($defeats[$yourChoice] == $myChoice) {
                $wins = 'you';
            } elseif ($defeats[$myChoice] == $yourChoice) {
                $wins = 'me';
            }

            $this->output($options[$yourChoice]['name'], $wins == 'you' ? 'green' : null, false);
            $this->output(' vs ', null, false);
            $this->output($options[$myChoice]['name'], $wins == 'me' ? 'green' : null, false);

            $length = strlen($options[$yourChoice]['name'] . $options[$myChoice]['name']) + 4;
            $this->output(str_repeat(' ', 25 - $length), null, false);

            $points = $options[$myChoice]['points'] + ($wins ? ($wins == 'me' ? 6 : 0) : 3);
            $this->output(' -> ' . $points);
            $totalPoints += $points;
        }

        $this->output("\nTotal points: " . $totalPoints, 'blue');
    }
}
