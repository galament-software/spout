<?php

namespace Box\Spout\Common\Entity;

use Box\Spout\Writer\Common\Helper\CellHelper;

class CellsRange
{
    const ALPHABET_LETTERS_COUNT = 26;

    private $xCell1;
    private $yCell1;
    private $xCell2;
    private $yCell2;

    public function __construct(int $xCell1, int $yCell1, int $xCell2, int $yCell2)
    {
        $this->xCell1 = $xCell1;
        $this->yCell1 = $yCell1;
        $this->xCell2 = $xCell2;
        $this->yCell2 = $yCell2;
    }

    public function getRange(): string
    {
        return CellHelper::getCellIndexFromColumnIndex($this->xCell1 - 1) . $this->yCell1 . ':' .
               CellHelper::getCellIndexFromColumnIndex($this->xCell2 - 1) . $this->yCell2;
    }
}
