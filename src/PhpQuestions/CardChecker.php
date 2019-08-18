<?php


namespace App\PhpQuestions;


/**
 * Class CardChecker
 * @package App\PhpQuestions
 */
class CardChecker
{
    public function checker(array $c)
    {
        $b=0;$m=['a'=>1,1=>10,'j'=>11,'q'=>12,'k'=>13];foreach($c as $a){$b|=1<<(($m[$a[0]])??$a[0]);}$b=($b<<3)|($b>>10);foreach(range(0,13)as $i){if((($b>>$i)&31)==31){return true;}}return false;
    }

}