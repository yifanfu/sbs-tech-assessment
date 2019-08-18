<?php


namespace App\PhpQuestions;


/**
 * Class Cipher
 * @package App\PhpQuestions
 */
class Cipher
{
    /** @var array|null $algorithm */
    private $algorithm;

    /**
     * Cipher constructor.
     */
    public function __construct()
    {
        $this->algorithm = array_flip(range('a', 'z'));
        array_walk($this->algorithm, function(&$index) {
            $index += 1;
        });
    }

    /**
     * @param string $string
     * @return string
     */
    public function encode(string $string)
    {
        return implode('', array_map(function($char) {
            return $this->algorithm[strtolower($char)];
        }, str_split($string)));
    }
}