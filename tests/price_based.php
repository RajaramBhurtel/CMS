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

$dataset  = [
    [
        "coordinates" => [
            ["lat" => 27.71163028576947, "lon" => 85.33947998332548],
            ["lat" => 28.19540897413969, "lon" => 83.98775978117004],
        ],
        "description" => "KTM - PKR",
        "actual_distance" => 143.07,
    ],
    [
        "coordinates" => [
            ["lat" => 27.705453147672866, "lon" => 85.20774644093721],
            ["lat" => 27.693953648311584, "lon" => 85.28118310781078],
        ],
        "description" => "Nag, Kalanki",
        "actual_distance" => 7.39,
    ],
    [
        "coordinates" => [
            ["lat" => 27.74179272641107, "lon" => 85.32758950550311],
            ["lat" => 27.651814633432714, "lon" => 85.54469105219599],
        ],
        "description" => "KTM, Dhulikhel",
        "actual_distance" => 23.40,
    ],
    [
        "coordinates" => [
            ["lat" => 27.74179272641107, "lon" => 85.32758950550311],
            ["lat" => 27.943971694195366, "lon" => 85.94425028174776],
        ],
        "description" => "KTM, Kodari",
        "actual_distance" => 63.52,
    ],
    [
        "coordinates" => [
            ["lat" => 27.74179272641107, "lon" => 85.32758950550311],
            ["lat" => 28.147809391301724, "lon" => 85.52852391574014],
        ],
        "description" => "KTM, Langtang",
        "actual_distance" => 49.84,
    ],
    [
        "coordinates" => [
            ["lat" => 27.74179272641107, "lon" => 85.32758950550311],
            ["lat" => 27.984770125340237, "lon" => 84.63009304697921],
        ],
        "description" => "KTM, Gorkha",
        "actual_distance" => 74.46,
    ],
    [
        "coordinates" => [
            ["lat" => 27.74179272641107, "lon" => 85.32758950550311],
            ["lat" => 27.694767975907485, "lon" => 84.42453945489765],
        ],
        "description" => "KTM, Bharatpur",
        "actual_distance" => 89.53,
    ],
    [
        "coordinates" => [
            ["lat" => 27.74179272641107, "lon" => 85.32758950550311],
            ["lat" => 27.432695410615864, "lon" => 85.02734268560872],
        ],
        "description" => "KTM, Hetauda",
        "actual_distance" => 46.10,
    ],
    [
        "coordinates" => [
            ["lat" => 27.74179272641107, "lon" => 85.32758950550311],
            ["lat" => 28.149994486818173, "lon" => 84.0702723977674],
        ],
        "description" => "KTM, Lekhnath",
        "actual_distance" => 130.95,
    ],
    [
        "coordinates" => [
            ["lat" => 27.74179272641107, "lon" => 85.32758950550311],
            ["lat" => 28.50899368621492, "lon" => 83.82556443013581],
        ],
        "description" => "KTM, Ghandruk",
        "actual_distance" => 171.20,
    ],
    [
        "coordinates" => [
            ["lat" => 27.74179272641107, "lon" => 85.32758950550311],
            ["lat" => 28.266374543560215, "lon" => 83.58085646250424],
        ],
        "description" => "KTM, Baglung",
        "actual_distance" => 182.21,
    ],
    [
        "coordinates" => [
            ["lat" => 27.74179272641107, "lon" => 85.32758950550311],
            ["lat" => 27.153178559627058, "lon" => 87.75753316481047],
        ],
        "description" => "KTM, Phidim",
        "actual_distance" => 247.45,
    ],
    [
        "coordinates" => [
            ["lat" => 27.74179272641107, "lon" => 85.32758950550311],
            ["lat" => 27.186054519606973, "lon" => 87.03232161521939],
        ],
        "description" => "KTM, Bhijpur",
        "actual_distance" => 178.12,
    ],
    [
        "coordinates" => [
            ["lat" => 27.74179272641107, "lon" => 85.32758950550311],
            ["lat" => 26.809459549195243, "lon" => 87.2794478439017],
        ],
        "description" => "KTM, Dharan",
        "actual_distance" => 217.99,
    ],
    [
        "coordinates" => [
            ["lat" => 27.74179272641107, "lon" => 85.32758950550311],
            ["lat" => 27.241510733877984, "lon" => 86.80136252299293],
        ],
        "description" => "KTM, Diktel",
        "actual_distance" => 154.59,
    ],
    [
        "coordinates" => [
            ["lat" => 27.96404175066433, "lon" => 83.77292980235228],
            ["lat" => 27.881672696896544, "lon" => 83.54764310199303],
        ],
        "description" => "Waling, Tansen",
        "actual_distance" => 23.38,
    ],
    [
        "coordinates" => [
            ["lat" => 27.96404175066433, "lon" => 83.77292980235228],
            ["lat" => 28.048062029839308, "lon" => 83.26409259981676],
        ],
        "description" => "Waling, Resunga",
        "actual_distance" => 50.00,
    ],
];


$tp = 0;
$fp = 0;
$fn = 0;

$threshold = 1.08;

foreach ($dataset as $item) {
    $coordinates = $item["coordinates"];
    $actualDistance = $item["actual_distance"];

    $haversineDistance = haversineDistance(
        $coordinates[0]["lat"],
        $coordinates[0]["lon"],
        $coordinates[1]["lat"],
        $coordinates[1]["lon"]
    );

    if (abs($haversineDistance - $actualDistance) <= $threshold) {
        $tp++;
    } elseif ($haversineDistance <= $actualDistance) {
        $fn++;
    } else {
        $fp++;
    }
}

$precision = $tp / ($tp + $fp);
$recall = $tp / ($tp + $fn);
$fScore = (2 * $precision * $recall) / ($precision + $recall);

echo "Precision: " . $precision . PHP_EOL;
echo "Recall: " . $recall . PHP_EOL;
echo "F-score: " . $fScore . PHP_EOL;
?>
