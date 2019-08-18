<?php


namespace App\PhpQuestions;


/**
 * Class MaxProfit
 * @package App\PhpQuestions
 */
class MaxProfit
{
    /**
     * @param array $prices
     * @return array
     */
    public function calculate(array $prices): array
    {
        if (count($prices) <= 0) {
            return 0;
        }

        $transactions = [];
        $total_profit = 0;
        $have_stock = false;
        $transaction = [];
        foreach (range(1, count($prices)-1) as $day) {
            if ($prices[$day] > $prices[$day - 1]) {
                $total_profit += $prices[$day] - $prices[$day - 1];
                if (false === $have_stock) {
                    $transaction['bought'] = [
                        'day' => $day,
                        'value' => $prices[$day - 1],
                    ];
                    $have_stock = true;
                }
            } elseif (true === $have_stock) {
                $transaction['sold'] = [
                    'day' => $day,
                    'value' => $prices[$day - 1],
                ];
                $transactions[] = $transaction;
                $transaction = [];
                $have_stock = false;
            }
        }

        return compact('transactions', 'total_profit');
    }
}