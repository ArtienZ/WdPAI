<?php
require_once __DIR__ . '/../models/User.php';

class Kid extends User
{
    private $therapist;
    private $parent_name;
    private $parent_surname;
    private $diagnosis_files;
    private $age;

    public function __construct(string $name, string $surname, string $age,string $therapist, $diagnosis_files = null,string $photo,
                                string $parent_name, string $parent_surname, string $phone, string $email, string $password)
    {
        parent::__construct($email,$password,$name,$surname,$phone,$photo);
        $this->therapist = $therapist;
        $this->parent_name = $parent_name;
        $this->parent_surname = $parent_surname;
        $this->diagnosis_files = $diagnosis_files;
        $this->age =$age;
    }

    public function getAge(): string
    {
        return $this->age;
    }

    public function setAge(string $age)
    {
        $this->age = $age;
    }

    public function getTherapist()
    {
        return $this->therapist;
    }

    public function setTherapist($therapist)
    {
        $this->therapist = $therapist;
    }

    public function getParentName()
    {
        return $this->parent_name;
    }

    public function setParentName($parent_name)
    {
        $this->parent_name = $parent_name;
    }

    public function getParentSurname()
    {
        return $this->parent_surname;
    }

    public function setParentSurname($parent_surname)
    {
        $this->parent_surname = $parent_surname;
    }

    public function getDiagnosisFiles()
    {
        return $this->diagnosis_files;
    }

    public function setDiagnosisFiles($diagnosis_files)
    {
        $this->diagnosis_files = $diagnosis_files;
    }
}