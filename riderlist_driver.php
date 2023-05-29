
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body style="margin: 50px;">
    <h1>Ride Requests</h1>
    <br>
    <table class="table">
        <thead>
        <tr>
                                <td> Id </td>
                                <td> From </td>
                                <td> Landmark </td>
                                <td> No of Passengers </td>
                                <td> To </td>
                                <td >Action</td>
                            </tr>
		</thead>

        <tbody>
            <?php
            $servername = "localhost";
			$username = "root";
			$password = "";
			$database = "user_db1";

			// Create connection
			$connection = new mysqli($servername, $username, $password, $database);

            // Check connection
			if ($connection->connect_error) {
				die("Connection failed: " . $connection->connect_error);
			}

            // read all row from database table
			$sql = "SELECT * FROM ride_request";
			$result = $connection->query($sql);

            if (!$result) {
				die("Invalid query: " . $connection->error);
			}

            // read data of each row
			while($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>" . $row["id"] . "</td>
                    <td>" . $row["From"] . "</td>
                    <td>" . $row["Landmark"] . "</td>
                    <td>" . $row["Passengers"] . "</td>
                    <td>" . $row["To"] . "</td>
                    <td>
                        <a class='btn btn-primary btn-sm' href='Accept'>Accept the Ride</a>
                        <a class='btn btn-danger btn-sm' href='Reject'>Reject</a>
                    </td>
                </tr>";
            }

            $connection->close();
            ?>
        </tbody>
    </table>
</body>
</html>