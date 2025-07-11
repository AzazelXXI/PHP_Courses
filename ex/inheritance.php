<?php

class Vehicle
{
    protected $brand;

    public function __construct($brand)
    {
        $this->brand = $brand;
    }

    public function move()
    {
        return '<h3>Vehicle is running</h3><br>';
    }
}

class Car extends Vehicle
{
    protected $hasDoor;

    public function __construct($brand, $hasDoor)
    {
        parent::__construct($brand);
        $this->hasDoor = $hasDoor;
    }

    public function move()
    {
        if (!$this->hasDoor)
        {
            return '<h3>'. $this->brand . ' doesnt has door and is running</h3><br>';
        }
        return '<h3>'. $this->brand . ' does has door and is running</h3><br>';

    }
}

class Bike extends Vehicle
{
    protected $type;

    public function __construct($brand, $type)
    {
        parent::__construct($brand);
        $this->type = $type;
    }

    public function move()
    {
        return '<h3>'. $this->type . ' Bike with running</h3><br>';
    }
}

$vehicle = new Vehicle('Vinfast');
$vehicleCar = new Car('Lamborghini', true);
$vehicleBike = new Bike('Flash', 'Moutain');

echo $vehicle->move();
echo $vehicleCar->move();
echo $vehicleBike->move();