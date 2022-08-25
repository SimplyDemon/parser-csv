<?php

namespace Inc\Classes;

use Exception;

class ParserCsv
{
    protected array $csv;
    protected int $columnsCount;

    /**
     * @throws Exception
     */
    public function __construct(
        protected array  $fileArray,
        protected string $separator,
    )
    {
        if (empty($fileArray)) {
            throw new Exception('File is empty.');
        } elseif (empty($fileArray['tmp_name'])) {
            throw new Exception('File was not loaded.');
        } elseif (empty($separator) || ($separator !== ',' && $separator !== ';')) {
            throw new Exception('Wrong separator.');
        }

        $this->convertCsvToArray();
    }

    /**
     * Return parsed csv data.
     */
    public function getParsedData(): array
    {
        return $this->csv;
    }

    /**
     * Convert all string rows to arrays
     * @throws Exception
     */
    protected function convertCsvToArray()
    {
        $this->csv = file($this->fileArray['tmp_name'], FILE_SKIP_EMPTY_LINES | FILE_IGNORE_NEW_LINES);
        array_walk($this->csv, [$this, 'csvStringToArray']);
        $this->validateCsvHeader();
    }

    /**
     * Convert string row to array by separator.
     *
     * @param string $item
     * @param string|int $key
     * @throws Exception
     */
    protected function csvStringToArray(string &$item, string|int $key)
    {
        $item = str_getcsv($item, $this->separator);
        $this->csvCheckValidation($item);
    }

    /**
     * Validate csv file.
     *
     * @param array $item
     *
     * @throws Exception
     */
    protected function csvCheckValidation(array $item)
    {
        $this->setColumnsCount($item);

        if (mb_substr($item[count($item) - 1], -2) === ',,') {
            throw new Exception('CSV is not valid and has semicolons in the end.');
        } elseif ($this->columnsCount !== count($item)) {
            throw new Exception('CSV is not valid, elements count is not the same.');
        } elseif (count($item) === 1) {
            throw new Exception('CSV parse was failed, only one column got. Try another separator.');
        }
    }

    /**
     * Set columns count if value is not set.
     *
     * @param array $item
     */
    protected function setColumnsCount(array $item)
    {
        if (!isset($this->columnsCount)) {
            $this->columnsCount = count($item);
        }
    }

    /**
     * If header empty - csv parse was failed.
     *
     * @throws Exception
     */
    protected function validateCsvHeader()
    {
        foreach ($this->csv[0] as $item) {
            if (empty($item)) {
                throw new \Exception('Validation failed, try another separator.');
            }
        }
    }
}
