<?php
include_once "observer.php";

class Staff
{
  private $observers = [];
  private static $instance;
  protected $employees;


  public function __construct(){}
  //on utilise le singleton pour instancier qu'une seule fois staff
  public static function getInstance(): Staff
  {
    if (!self::$instance) {
      self::$instance = new self();
      self::$observers['add'] = new AddHandler();
      self::$observers['remove'] = new RemoveHandler();

    }
    return self::$instance;
  }
  
  public function add($employee)
  {
    $this->employees[] = $employee;
    $this->notify('add', $employee);
  }

  public function remove($employeeToRemove)
  {
    $this->employees[] = array_filter($this->employees, function() use ($employeeToRemove){
      foreach($this->employees as $employee) {
        $employee !== $employeeToRemove;
      }
    });
    $this->notify('remove', $employeeToRemove);
  }

  public static function notify($type, $instance)
  {
    self::$observers[$type]->handle($instance);
  }


  public function displaySalaries()
  {
    foreach($this->employees as $employee) {
      echo $employee->getName() . ' ' . $employee->getSalary() . PHP_EOL;
    }
  }

  public function displayAverageSalary()
  {
    $total = 0;
    foreach ($this->employees as $employee) {
       $total += $employee->getSalary();
    }
    echo 'Salaire moyen: ' .  $total / count($this->employees) . PHP_EOL;
  }
    
}