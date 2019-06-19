<?php

namespace Box\Spout\Common\Entity;

class CellsRange
{
    const ALPHABET_LETTERS_COUNT = 26;

    private $xCell1;
    private $yCell1;
    private $xCell2;
    private $yCell2;

    private $alphabet = [
        'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M',
        'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'
    ];

    public function __construct(int $xCell1, int $yCell1, int $xCell2, int $yCell2)
    {
        $this->xCell1 = $xCell1;
        $this->yCell1 = $yCell1;
        $this->xCell2 = $xCell2;
        $this->yCell2 = $yCell2;
    }

    public function getRange(): string
    {
        return $this->getXCoord($this->xCell1) . $this->yCell1 . ':' . $this->getXCoord($this->xCell2) . $this->yCell2;
    }

    private function getXCoord(int $x): string
    {
        $x--;
        $lettersCount = floor(log($x, self::ALPHABET_LETTERS_COUNT)) + 1;
        $xCoord       = '';
        $rest         = $x;
        $curLetterPos = $x;

        for ($i = $lettersCount; $i > 1; $i--) {
            $closestNumber = pow(self::ALPHABET_LETTERS_COUNT, ($i - 1));
            $curLetterPos  = (int)$rest / $closestNumber;
            $xCoord        .= $this->alphabet[$curLetterPos];
            $rest          = $rest - $closestNumber;
        }
        $xCoord .= $this->alphabet[$curLetterPos];

        return $xCoord;
    }
}
