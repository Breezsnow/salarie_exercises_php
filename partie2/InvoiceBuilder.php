<?php
include_once 'Independant.php';

class InvoiceBuilder
{
    public $date = false;
    public $amount = false;
    public $label = false;

    public function __construct(){}

    public function addDate($date)
    {
        $this->date = $date;
        return $this;
    }
    public function addAmount($amount)
    {
        $this->amount = $amount;
        return $this;
    }
    public function addLabel($label)
    {
        $this->label = $label;
        return $this;
    }

    public function build(): Invoice
    {
        return new Invoice($this);
    }
}


