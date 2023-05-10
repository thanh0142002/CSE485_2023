<?php

class Student {
  public $id;
  public $name;
  public $age;
  public $grade;

  public function __construct($id, $name, $age, $grade) {
    $this->id = $id;
    $this->name = $name;
    $this->age = $age;
    $this->grade = $grade;
  }

  public function getID() {
    return $this->id;
  }

  public function getName() {
    return $this->name;
  }

  public function getAge() {
    return $this->age;
  }

  public function getGrade() {
    return $this->grade;
  }

  public function setID($id) {
    $this->id = $id;
  }

  public function setName($name) {
    $this->name = $name;
  }

  public function setAge($age) {
    $this->age = $age;
  }

  public function setGrade($grade) {
    $this->grade = $grade;
  }
}
?>
