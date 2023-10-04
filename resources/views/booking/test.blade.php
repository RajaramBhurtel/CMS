<?php

// JSON data with locations
$jsonData = '[
    { "name": "Nagarkot", "latitude": 27.717299, "longitude": 85.521547 },
    { "name": "Boudhanath Stupa", "latitude": 27.721176, "longitude": 85.361908 },
    { "name": "Pashupatinath Temple", "latitude": 27.671018, "longitude": 85.427781 },
    { "name": "Kathmandu Durbar Square", "latitude": 27.704899, "longitude": 85.307997 },
    { "name": "Thamel", "latitude": 27.715229, "longitude": 85.312400 },
    { "name": "Garden of Dreams", "latitude": 27.711919, "longitude": 85.316533 },
    { "name": "Chandragiri Hills", "latitude": 27.635343, "longitude": 85.241498 },
    { "name": "Kalimati", "latitude": 28.160800, "longitude": 83.586640 },
    { "name": "Patan Durbar Square", "latitude": 27.676301, "longitude": 85.325462 },
    { "name": "Bhaktapur Durbar Square", "latitude": 27.671674, "longitude": 85.427222 },
    { "name": "Nagarkot", "latitude": 27.717299, "longitude": 85.521547 }
]
';

// Command to execute Python script
$command = 'python2 vrp.py';

// Create a pipe to write data to the Python script
$descriptorspec = array(
    0 => array('pipe', 'r'), // stdin
    1 => array('pipe', 'w'), // stdout
    2 => array('pipe', 'w'), // stderr
);

// Open the Python script process
$process = proc_open($command, $descriptorspec, $pipes);

if (is_resource($process)) {
    // Write the JSON data to the Python script
    fwrite($pipes[0], $jsonData);
    fclose($pipes[0]);

    // Read the output from the Python script
    $output = stream_get_contents($pipes[1]);
    fclose($pipes[1]);

    // Read the error output from the Python script
    $error = stream_get_contents($pipes[2]);
    fclose($pipes[2]);

    // Close the Python script process
    $returnValue = proc_close($process);

    if ($returnValue === 0) {
        // Execution succeeded, print the output
        print_r( $output );
    } else {
        // Execution failed, print the error
        echo 'Error: ' . $error;
    }
} else {
    echo 'Error: Unable to start Python script.';
}
