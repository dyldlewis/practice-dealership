<?php
    class Car
    {
        private $make_model;
        private $price;
        private $miles;
        private $image_path;

        function __construct($make_model, $price, $miles, $image_path)
        {
            $this->make_model = $make_model;
            $this->price = $price;
            $this->miles = $miles;
            $this->image_path = $image_path;
        }


        function getMakeModel()
        {
            return $this->make_model;
        }

        function setPrice($new_price)
        {
            $float_price = (float) $new_price;
            var_dump($float_price);
            if ($float_price != 0) {
                 $this->price = $float_price;
            }
        }
        function getPrice()
        {
            return $this->price;
        }

        function getMiles()
        {
            return $this->miles;
        }

        function getImage()
        {
            return $this->image_path;
        }

        function worthBuying($max_price)
        {
            return $this->price < ($max_price + 100);
        }
    }

    $porsche = new Car("2014 Porsche 911", 114991.00, 7864, "img/porsche.jpg");
    $ford = new Car("2011 Ford F450", 55995.00, 14241, "img/ford.jpg");
    $lexus = new Car("2013 Lexus RX 350", 44700.00, 20000, "img/lexus.jpg");
    $mercedes = new Car("Mercedes Benz CLS550", 39900.00, 37979, "img/mercedes.jpg");
    $porsche->setPrice("100000.00");
    $cars = array($porsche, $ford, $lexus, $mercedes);

    $cars_matching_search = array();
    foreach ($cars as $car) {
      if ($car->worthBuying($_GET["price"])){
        array_push($cars_matching_search, $car);
      }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Your Car Dealership's Homepage</title>
</head>
<body>
    <h1>Your Car Dealership</h1>
    <ul>
        <?php
            if (count($cars_matching_search) == 0) {
              echo "<h2> No cars matched your search. </h2>";
            } else {
                foreach ($cars_matching_search as $car) {
                  $car_model = $car->getMakeModel();
                  echo "<li> $car_model </li>";
                  echo "<ul>";
                  $car_price = $car->getPrice();
                  echo "<li> $$car_price </li>";
                  $car_miles = $car->getMiles();
                  echo "<li> Miles: $car_miles </li>";
                  $car_img = $car->getImage();
                  echo "<li> <img src='$car_img'> </li>";
                  echo "</ul>";
                }
            }
        ?>
    </ul>
</body>
</html>
