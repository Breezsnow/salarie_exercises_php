<?php

include_once 'usine.php';
include_once 'usineFacade.php';

$usine = new usineFacade(new Usine);
$usine->newDay();