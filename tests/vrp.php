<?php

function haversineDistance($lat1, $lon1, $lat2, $lon2) {
    $lat1 = deg2rad($lat1);
    $lon1 = deg2rad($lon1);
    $lat2 = deg2rad($lat2);
    $lon2 = deg2rad($lon2);
    
    $earthRadius = 6371;

    $dlat = $lat2 - $lat1;
    $dlon = $lon2 - $lon1;
    $a = sin($dlat / 2) ** 2 + cos($lat1) * cos($lat2) * sin($dlon / 2) ** 2;
    $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
    $distance = $earthRadius * $c;
    
    return $distance;
}

function buildDistanceMatrix($coordinates) {
    $numPoints = count($coordinates);
    $distanceMatrix = [];

    for ($i = 0; $i < $numPoints; $i++) {
        $distanceMatrix[$i] = [];

        for ($j = 0; $j < $numPoints; $j++) {
            if ($i == $j) {
                $distanceMatrix[$i][$j] = 0; // Distance to itself is 0
            } else {
                $lat1 = $coordinates[$i]["lat"];
                $lon1 = $coordinates[$i]["lon"];
                $lat2 = $coordinates[$j]["lat"];
                $lon2 = $coordinates[$j]["lon"];

                $distance = haversineDistance($lat1, $lon1, $lat2, $lon2);
                $distanceMatrix[$i][$j] = $distance;
            }
        }
    }

    return $distanceMatrix;
}

function findNearestCustomer($currentCustomer, $visited, $distanceMatrix) {
    $minDistance = PHP_INT_MAX;
    $nearestCustomer = -1;
    $numCustomers = count($visited);

    for ($i = 0; $i < $numCustomers; $i++) {
        if (!$visited[$i] && $distanceMatrix[$currentCustomer][$i] < $minDistance) {
            $minDistance = $distanceMatrix[$currentCustomer][$i];
            $nearestCustomer = $i;
        }
    }

    return $nearestCustomer;
}

function nearestNeighbor($distanceMatrix, $vehicleCapacity) {
    $numCustomers = count($distanceMatrix) - 1;
    $visited = array_fill(0, $numCustomers, false);
    $routes = [];

    $currentCustomer = 0;

    $totalDistance = 0; 
    $currentRoute = [];
    $currentLoad = 0;

    while (in_array(false, $visited)) {
        $nearestCustomer = findNearestCustomer($currentCustomer, $visited, $distanceMatrix);

        if ($nearestCustomer == -1) {
            break; 
        }

        if ($currentLoad + 1 <= $vehicleCapacity) {
            $currentRoute[] = $nearestCustomer;
            $visited[$nearestCustomer] = true;
            $currentLoad += 1;
            $totalDistance += $distanceMatrix[$currentCustomer][$nearestCustomer];
            $currentCustomer = $nearestCustomer;
        } else {
            $currentRoute[] = 0; 
            $routes[] = $currentRoute;
            $currentRoute = [0]; 
            $currentLoad = 0;
            $totalDistance += $distanceMatrix[$currentCustomer][0]; 
            $currentCustomer = 0;
        }
    }

    if (!empty($currentRoute)) {
        $currentRoute[] = 0;
        $routes[] = $currentRoute;
    }

    return ["routes" => $routes, "totalDistance" => $totalDistance];
}

$vehicleCapacity = 10;
$jsonData = '[
    {"location": "Office", "lat": 27.69767654394376, "lon": 85.29203955659513},
    {"location": "Kalanki", "lat": 27.69331368823341, "lon": 85.28168016418789},
    {"location": "Gurjudhara", "lat": 27.688658328533737, "lon": 85.24245789945164},
    {"location": "Nagdhunga", "lat": 27.705524077700307, "lon": 85.208280408543},
    {"location": "Swayambhu", "lat": 27.717031557421695, "lon": 85.28370503208029},
    {"location": "Balaju", "lat": 27.727275304186158, "lon": 85.30469868807273},
    {"location": "Goldhunga", "lat": 27.75943257553317, "lon": 85.28555741615676},
    {"location": "Basundhara", "lat": 27.742394921885253, "lon": 85.3319729180005}

]';

$coordinates = json_decode($jsonData, true);

$result = nearestNeighbor(buildDistanceMatrix($coordinates), $vehicleCapacity);
$routes = $result["routes"];
$totalDistance = $result["totalDistance"];

foreach ($routes as $index => $route) {
    echo "Route " . ($index + 1) . ": " . implode(" -> ", array_map(function ($customer) use ($coordinates) {
        return $coordinates[$customer]["location"];
    }, $route)) . "  <br>";
}

echo "Total Distance: " . $totalDistance . " kilometers";
?>
