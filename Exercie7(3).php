<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add data in Databases</title>//page title
    <style>
        #submit-btn {
            //button stylesheet css
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;//mouse icon will change
        }
    </style>
</head>
<body>
    <h1>Add data in Database</h1>//header added
    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $servername = "localhost";
        $username = "root";
        $dbname = "themepark";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $parkcode = $_POST['parkcode'];
            $parkname = $_POST['parkname'];
            $parkcity = $_POST['parkcity'];
            $parkcountry = $_POST['parkcountry'];

            $stmt = $conn->prepare("INSERT INTO themepark (parkcode, parkname, parkcity, parkcountry) VALUES (:parkcode, :parkname, :parkcity, :parkcountry)");

            $stmt->bindParam(':parkcode', $parkcode);
            $stmt->bindParam(':parkname', $parkname);
            $stmt->bindParam(':parkcity', $parkcity);
            $stmt->bindParam(':parkcountry', $parkcountry);

            $stmt->execute();

            echo "New record created successfully";
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        $conn = null;
    }
    ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="parkcode">Park Code:</label>
        <input type="text" name="parkcode" id="parkcode" required><br><br>//br break
        <label for="parkname">Park Name:</label>
        <input type="text" name="parkname" id="parkname" required><br><br>
        <label for="parkcity">Park City:</label>
        <input type="text" name="parkcity" id="parkcity" required><br><br>
        <label for="parkcountry">Park Country:</label>
        <input type="text" name="parkcountry" id="parkcountry" required><br><br>
        <button type="submit" id="submit-btn">Submit</button>
    </form>//form created
</body>
</html>//html use for style.
