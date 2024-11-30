<?php
// Set the API endpoint URL
$URL = "https://data.gov.bh/api/explore/v2.1/catalog/datasets/01-statistics-of-students-nationalities_updated/records?where=colleges%20like%20%22IT%22%20AND%20the_programs%20like%20%22bachelor%22&limit=100";

// Fetch the data
$response = file_get_contents($URL);

// Parse the JSON response
$result = json_decode($response, true);

// Check for errors
if ($result === null && json_last_error() !== JSON_ERROR_NONE) {
    die('Error parsing JSON');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Enrollment Data</title>
    <link rel="stylesheet" href="css/pico.min.css">
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css"
    >
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <h1> University of Bahrain Students Enrollment by Nationality </h1>
    <table class="striped">
        <thead data-theme="darck">
                <tr>
                <th scope="col">Year</th>
                <th scope="col">Semester</th>   
                <th scope="col">The Programs</th>
                <th scope="col">Nationality</th>
                <th scope="col">College</th>
                <th scope="col">Number of Students</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($result['results'] as $record): ?>
                <tr>
                    <td><?php echo htmlspecialchars($record['year']); ?></td>
                    <td><?php echo htmlspecialchars($record['semester']); ?></td>
                    <td><?php echo "number of students enrolled in bachelor programs"; ?></td>
                    <td><?php echo htmlspecialchars($record['nationality']); ?></td>
                    <td><?php echo htmlspecialchars($record['colleges']); ?></td>
                    <td><?php echo htmlspecialchars($record['number_of_students']); ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table></body>
</html>