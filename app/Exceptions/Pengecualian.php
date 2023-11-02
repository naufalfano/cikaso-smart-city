<?php

namespace App\Exceptions;

use Exception as BaseException;

class Pengecualian extends BaseException
{

    private $data;

    public function __construct($message, $code = 0, $data, \Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);

        $this->data = $data;
    }

    public function __toString()
    {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }

    /**
     * @throws Pengecualian
     */
    public static function lempar(string $message, int $code, $data = null)
    {
        throw new self($message, $code, $data);
    }

    public function getData()
    {
        return $this->data;
    }
}
