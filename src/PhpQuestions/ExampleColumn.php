<?php


namespace App\PhpQuestions;


use PDO;
use PDOException;

/**
 * Class ExampleColumn
 * @package App\PhpQuestions
 */
class ExampleColumn
{
    /**
     * display result from db
     */
    public function run()
    {
        $dsn = 'mysql:host=localhost;dbname=my_database;charset=utf8mb4';
        try {
            $pdo = new PDO($dsn, 'admin', 'password', [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ]);


            $example_integer = '123';
            if ($example_integer == $_GET['parameter']) {
                return;//
            }

            $statement = $pdo->prepare('select example_column from example_table where example_column = ?');
            $statement->execute([$_GET['parameter']]);
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);

            foreach ($results as $result) {
                echo $result . PHP_EOL;
            }

            $pdo = null;
        } catch (PDOException $exception) {
            //TODO: Log message here to trigger the alarm
        }
    }
}