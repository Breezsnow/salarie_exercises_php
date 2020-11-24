<?php

class UsineFacade
{
    protected $work;

    public function __construct(Usine $usine)
    {
        $this->work = $usine;
    }

    public function newDay()
    {
        $this->work->openTheGate();
        $this->work->turnLightsOn();
        $this->work->prepareCofee();
        $this->work->checkTheMachinery();
        $this->work->startWorking();
    }
}