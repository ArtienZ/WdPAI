<?php

require_once __DIR__ . '/../models/User.php';
class Therapist extends User
{
    private $specialization;
    private $account_number;
    private $hourly_rate;

    public function __construct(string $name, string $surname,string $photo, string $specialization,
                                string $account_number, string $hourly_rate, string $phone, string $email, string $password)
    {
        parent::__construct($email,$password,$name,$surname,$phone,$photo);
        $this->specialization = $specialization;
        $this->account_number = $account_number;
        $this->hourly_rate = $hourly_rate;
    }

    public function getSpecialization()
    {
        return $this->specialization;
    }

    public function setSpecialization($specialization): void
    {
        $this->specialization = $specialization;
    }

    public function getAccountNumber()
    {
        return $this->account_number;
    }

    public function setAccountNumber($account_number): void
    {
        $this->account_number = $account_number;
    }

    public function getHourlyRate()
    {
        return $this->hourly_rate;
    }

    public function setHourlyRate($hourly_rate): void
    {
        $this->hourly_rate = $hourly_rate;
    }


}