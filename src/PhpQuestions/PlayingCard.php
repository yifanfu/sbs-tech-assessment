<?php


namespace App\PhpQuestions;


/**
 * Class PlayingCard
 * @package App\PhpQuestions
 */
class PlayingCard
{
    /** @var array */
    const RANKS = [
        'a',
        '2',
        '3',
        '4',
        '5',
        '6',
        '7',
        '8',
        '9',
        '10',
        'j',
        'q',
        'k',
    ];

    /** @var array  */
    const SUITS = [
        'c',
        'd',
        'h',
        's',
    ];

    /**
     * @param int $amount
     * @return array
     */
    public function getCards(int $amount)
    {
        $cards = [];

        while ($amount > 0) {
            $card = self::RANKS[array_rand(self::RANKS)] . self::SUITS[array_rand(self::SUITS)];
            if (false === in_array($card, $cards)) {
                $cards[] = $card;
                $amount--;
            }
        }

        return $cards;
    }
}