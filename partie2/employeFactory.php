<?php

include_once 'employe.php';
include_once 'independant.php';

class EmployeeFactory
{
    public static function create($type, $params = [])
    {
        switch($type) {
            case 'Salesman':
                $created = new Salesman (... $params);
            break;
            case 'Representant':
                $created = new Representant (... $params);
            break;
            case 'Producer':
                $created = new Producer (... $params);
            break;
            case 'Wharehouseman':
                $created = new Wharehouseman (... $params);
            break;
            case 'ProducerWithRisk':
                $created = new ProducerWithRisk (... $params);
            break;
            case 'WharehousemanWithRisk':
                $created = new WharehousemanWithRisk (... $params);
            break;
            case 'Independant':
                $created = new Independant (... $params);
            break;
            default;
                throw new Exception('unknown class name');
        }
        return $created;
    }
}

// class employeFactory
// {
//     public static function makeEmploye($name, $lastname, $age, $year, $type)
//     {
//         switch($type) {
//             case 'Salesman':
//                 return new Salesman ($name, $lastname, $age, $year, $ca);
//             case 'Representant':
//                 return new Representant ($name, $lastname, $age, $year, $ca);
//             case 'Producer':
//                 return new Producer ($name, $lastname, $age, $year, $nbUnits);
//             case 'Wharehouseman':
//                 return new Wharehouseman ($name, $lastname, $age, $year, $nbHour);
//             case 'ProducerWithRisk':
//                 return new ProducerWithRisk ($name, $lastname, $age, $year, $nbUnits);
//             case 'WharehousemanWithRisk':
//                 return new WharehousemanWithRisk ($name, $lastname, $age, $year, $nbHour);
//         }
//     }
// }