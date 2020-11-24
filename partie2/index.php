<?php
include_once 'usine.php';
include_once 'usineFacade.php';
include_once 'Employe.php';
include_once 'Staff.php';
include_once 'Independant.php';
include_once 'employeFactory.php';
include_once 'InvoiceBuilder.php';
include_once 'invoiceList.php';

$invoiceBuilder = new InvoiceBuilder();
$listInvoice1 = [
  (new InvoiceBuilder())
  ->addDate('2020-10-02')
  ->addAmount(1500)
  ->addLabel('Facture 1')
  ->build(),
  (new InvoiceBuilder())
  ->addDate('2020-10-04')
  ->addAmount(1700)
  ->addLabel('Facture 2')
  ->build(),
  (new InvoiceBuilder())
  ->addDate('2020-10-05')
  ->addAmount(3500)
  ->addLabel('Facture 3')
  ->build()
];

$listInvoice2 = [
  (new InvoiceBuilder())
  ->addDate('2020-10-04')
  ->addAmount(1500)
  ->addLabel('Facture 1')
  ->build(),
  (new InvoiceBuilder())
  ->addDate('2020-10-04')
  ->addAmount(4500)
  ->addLabel('Frais de déplacement -')
  ->build(),
  (new InvoiceBuilder())
  ->addDate('2020-10-05')
  ->addAmount(1500)
  ->addLabel('Facture 3')
  ->build()
];


// $myEmployees = new Staff();
//staff n'est plus relancer de zero à chaque fois
$myEmployees = Staff::getInstance();
$myEmployees->add(EmployeeFactory::create('Salesman',["Pierre", "Business", 45, "1995", 30000]));
$myEmployees->add(EmployeeFactory::create('Representant',["Léon", "Ventout", 25, "2001", 20000]));
$myEmployees->add(EmployeeFactory::create('Producer',["Yves", "Ahalouest", 28, "1998", 1000]));
$myEmployees->add(EmployeeFactory::create('Wharehouseman',["Jeanne", "Stoktout", 32, "1998", 45]));
$myEmployees->add(EmployeeFactory::create('ProducerWithRisk',["Jean", "Flippe", 28, "2000", 1000]));
// $myEmployees->add(EmployeeFactory::create('Independant',["tata", "Stoktout", 30, "2011", 569032, $listInvoice1]));

$indie = EmployeeFactory::create('Independant',["tata", "Stoktout", 30, "2011", 569032, $listInvoice1]);
$indie->addInvoice($invoiceBuilder
->addDate('2020-10-05')
->addAmount(3000)
->addLabel('Facture 4')
->build());



$myEmployees->add(EmployeeFactory::create('Independant',["tutu", "Ahalouest", 30, "2013", 320910, $listInvoice2]));
$myEmployees->add($indie);

// echo $myEmployees->current()->getAmount();
// $myEmployees->next();
// echo $myEmployees->key();
// echo $myEmployees->current()->getAmount();

$myEmployees->displaySalaries();
$myEmployees->displayAverageSalary();


$usine = new usineFacade(new Usine);
$usine->newDay();