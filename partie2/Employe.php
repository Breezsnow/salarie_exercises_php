<?php

abstract class Employe
{
  public $name;
  public $lastname;
  public $age;
  public $year;

  public function __construct($name, $lastname, $age, $year)
  {
    $this->name = $name;
    $this->lastname = $lastname;
    $this->age = $age;
    $this->year = $year;
  }
  public function getName()
  {
    return "Employé salarié: '$this->name'";
  }
  abstract function getSalary();
}

class Salesman extends Employe
{
  public $ca;
  public $type='Salesman';

  public function __construct($name, $lastname, $age, $year, $ca) {
    parent::__construct($name, $lastname, $age, $year);
    $this->ca = $ca;
  }
  public function getSalary() {
    return ($this->ca * 0.2) + 400;
  }
  public function getType() {
    return $this->type;
  }
}

class Representant extends Employe
{
  public $ca;
  public $type='Representant';

  public function __construct($name, $lastname, $age, $year, $ca) {
    parent::__construct($name, $lastname, $age, $year);
    $this->ca = $ca;
  }
  public function getSalary() {
    return ($this->ca * 0.2) + 800;
  }
  public function getType() {
    return $this->type;
  }
}

class Producer extends Employe
{
  public $nbUnits;
  public $type='Producer';

  public function __construct($name, $lastname, $age, $year, $nbUnits) {
    parent::__construct($name, $lastname, $age, $year);
    $this->nbUnits = $nbUnits;
  }
  public function getSalary() {
    return $this->nbUnits * 5;
  }
  public function getType() {
    return $this->type;
  }
}

class Wharehouseman extends Employe
{
  public $nbHour;
  public $type='Wharehouseman';

  public function __construct($name, $lastname, $age, $year, $nbHour) {
    parent::__construct($name, $lastname, $age, $year);
    $this->nbHour = $nbHour;
  }
  public function getSalary() {
    return $this->nbHour * 65;
  }
  public function getType() {
    return $this->type;
  }
}

class ProducerWithRisk extends Producer
{
  public $nbUnits;
  public $type='ProducerWithRisk';
    
  public function getSalary() {
    return parent::getSalary() + 200;
  }
  public function getType() {
    return $this->type;
  }
}

class WharehousemanWithRisk extends Wharehouseman
{
  public $nbHour;
  public $type='WharehousemanWithRisk';

  public function getSalary() {
    return parent::getSalary() + 200;
  }
  public function getType() {
    return $this->type;
  }
}