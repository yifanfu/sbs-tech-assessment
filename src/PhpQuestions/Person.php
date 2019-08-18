<?php


namespace App\PhpQuestions;


/**
 * Class Person
 * @package App\PhpQuestions
 */
class Person
{
    /** @var string $name */
    private $name;

    /** @var string $phoneNumber */
    private $phoneNumber;

    /** @var string $email */
    private $email;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Person
     */
    public function setName(string $name): Person
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    /**
     * @param string $phoneNumber
     * @return Person
     */
    public function setPhoneNumber(string $phoneNumber): Person
    {
        $this->phoneNumber = $phoneNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return Person
     */
    public function setEmail(string $email): Person
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'Name' => $this->getName(),
            'Phone Number' => $this->getPhoneNumber(),
            'Email' => $this->getEmail()
        ];
    }

    /**
     * @return string
     */
    public function toJson()
    {
        return json_encode($this->toArray());
    }
}