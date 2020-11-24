<?php

interface ObserverInterface
{
    public function handle();
}

class AddHandler implements ObserverInterface
{
    public function handle()
    {
        echo "You have added an new employe !";
    }
}

class RemoveHandler implements ObserverInterface
{
    public function handle()
    {
        echo "You have removed an employe.";
    }
}

