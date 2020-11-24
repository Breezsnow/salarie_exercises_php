<?php
include_once 'InvoiceBuilder.php'

class InvoiceList implements Countable, Iterator
{
    private $invoices = [];
    protected $counter = 0;

    public function addInvoice($invoice)
    {
        $this->invoices[] = $invoice;
    }

    public function removeInvoice(Invoice $toRemove) 
    {
        $this->invoices = array_filter($this->invoices, function(Invoice $invoice) use ($toRemove){
            return $toRemove->isSame($toRemove);
        });
    }

  public function count(): int
  {
    return count($this->invoices);
  }

  public function current(): Invoice
  {
    return $this->invoices[$this->counter];
  }

  public function key()
  {
    return $this->counter;
  }

  public function next()
  {
    $this->counter++;
  }

  public function rewind()
  {
    $this->counter = 0;
  }

  public function valid(): bool
  {
    return isset($this->invoices[$this->counter]);
  }

  public function getInvoices()
  {
    return $this->invoices;
  }
}