<?php
// Fetching data from the API
$url = "https://data.gov.bh/api/explore/v2.1/catalog/datasets/01-statistics-of-students-nationalities_updated/records?where=colleges%20like%20%22IT%22%20AND%20the_programs%20like%20%22bachelor%22&limit=100";
$response = file_get_contents($url);

if ($response === false) {
    die('Error fetching data. The API request failed.');
}
// Decode the JSON response
$result = json_decode($response, true);

if (json_last_error() !== JSON_ERROR_NONE) {
    die('Error decoding JSON: ' . json_last_error_msg());
}
// Check if 'results' key exists in the decoded data
if (!isset($result['results']) || !is_array($result['results'])) {
    die('Error: No valid data found in the response.');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students Enrollment Data</title>
    <!-- Link to Pico CSS -->
    <link rel="stylesheet" href="https://unpkg.com/pico.css">
    <style>
