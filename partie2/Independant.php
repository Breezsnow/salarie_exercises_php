<?php
include_once('Employe.php');
include_once('InvoiceBuilder.php');

class Independant extends Employe
{
  public $siren;
  public $invoiceList;
  public $type='Independant';
  


  public function __construct($name, $lastname, $age, $year, $siren, $invoices)
  {
    parent::__construct($name, $lastname, $age, $year);
    $this->siren = $siren;
    $this->invoices = $invoices;
  }
  public function getName()
  {
    return "Employé indépendant: '$this->name'";
  }

  function getSalary()
  {
    $totalAmount = 0;
    foreach($this->invoices as $invoice) {
      if (strpos("Frais de déplacement -", $invoice->getLabel()) === false) {
        $totalAmount += $invoice->amount;
      }
    }
    return $totalAmount;
  }

  public function getType() {
    return $this->type;
  }

  public function getInvoiceList()
  {
    return $this->invoiceList;
  }
}

class Invoice
{

  // public function __construct($date, $amount, $label)
  // {
  //   $this->date = $date;
  //   $this->amount = $amount;
  //   $this->label = $label;
  // }

  // utilisation de builder -> InvoiceBuilder

  public $date;
  public $amount;
  public $label;

  public function __construct(InvoiceBuilder $invoiceBuilder)
  {
    $this->date = $invoiceBuilder->date;
    $this->amount = $invoiceBuilder->amount;
    $this->label = $invoiceBuilder->label;
  }

   public function getLabel()
  {
    return $this->label;
  }

  public function getAmount()
  {
    return $this->getAmount;
  }
  
}