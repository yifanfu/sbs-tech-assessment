<?php

namespace App;

use App\PhpQuestions\CardChecker;
use App\PhpQuestions\Cipher;
use App\PhpQuestions\MaxProfit;
use App\PhpQuestions\Person;
use App\PhpQuestions\PlayingCard;
use App\PhpQuestions\Shipping;
use App\PhpQuestions\WaterVolume;
use Exception;

require __DIR__ . '/../vendor/autoload.php';

echo 'Question 1.1:' . PHP_EOL;

$person = (new Person())
    ->setName('Yifan Fu')
    ->setEmail('ypqfyf@gmail.com')
    ->setPhoneNumber('+61455593352');

print_r($person->toArray());
print_r($person->toJson());

echo PHP_EOL . "----------------" . PHP_EOL;

echo 'Question 1.2:' . PHP_EOL;

$cards = (new PlayingCard())->getCards(5);

print_r($cards);

echo PHP_EOL . "----------------" . PHP_EOL;

echo 'Question 1.3:' . PHP_EOL;

var_dump((new CardChecker())->checker($cards));

echo PHP_EOL . "----------------" . PHP_EOL;

echo 'Question 1.4:' . PHP_EOL;

print_r((new Cipher())->encode('Ipsum'));

echo PHP_EOL . "----------------" . PHP_EOL;

echo 'Question 1.5:' . PHP_EOL;

print_r((new WaterVolume())->calculate([0,1,0,2,1,0,1,3,1,3,2,1,0]));

echo PHP_EOL . "----------------" . PHP_EOL;

echo 'Question 1.6:' . PHP_EOL;

echo 'Please check src/PhpQuestions/ExampleColumn.php';

echo PHP_EOL . "----------------" . PHP_EOL;

echo 'Question 1.7:' . PHP_EOL;

print_r((new MaxProfit())->calculate([360, 255, 260, 230, 150, 100, 135, 265, 750, 460, 600]));

echo 'Question 1.8:' . PHP_EOL;

echo 'Dispatch Date: ';
try {
    print_r((new Shipping('2019-08-11 13:00:00'))->getDispatchDate());
} catch (Exception $e) {
    echo 'Unable to show dispatch date: ' . $e->getMessage();
}

echo PHP_EOL;

echo 'Delivery Date: ';
try {
    print_r((new Shipping('2019-08-11 13:00:00'))->getDeliveryDate());
} catch (Exception $e) {
    echo 'Unable to show delivery date: ' . $e->getMessage();
}


