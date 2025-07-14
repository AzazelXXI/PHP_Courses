<?php
$server_name = 'localhost';
$username = 'root';
$password = '';
$dbname = 'php_demo';

// create connection
$conn = new mysqli($server_name, $username, $password, $dbname);

// connection checking
if ($conn->connect_error) {
    die("Failed to connect" . $conn->connect_error);
}

// proceed the redirect, prevent the auto submit when reload page
if (isset($_GET['success']) && $_GET['success'] == 1) {
    $messages = 'User Added Successfully';
}

// Add user
function addUsers($conn)
{
    if (
        $_SERVER['REQUEST_METHOD'] === 'POST' &&
        isset($_POST['name'], $_POST['age'], $_POST['email'])
    ) {
        $name = $_POST['name'];
        $age = $_POST['age'];
        $email = $_POST['email'];

        $sql = "INSERT INTO User(name, age, email) VALUES ('$name', $age, '$email')";

        if ($conn->query($sql) === TRUE) {
            header("Location: " . $_SERVER['PHP_SELF'] . "?success=1");
            exit(); // Stop the execute the code
        } else {
            return 'Error' . $conn->error;
        }
    }
}

// Get users this will return into an array
function getUsers($conn)
{
    if (
        $_SERVER['REQUEST_METHOD'] === 'GET' &&
        isset($_GET['getUsers'])
    ) {
        $sql = "SELECT * FROM User";

        // Check if the data is exist
        $result = $conn->query($sql);
        if ($result && $result->num_rows > 0) {
            $users = $result->fetch_all(MYSQLI_ASSOC);
        }

        /*
            First way: Using array and fetch_assoc
            with every call store the data in the array one by one
        */
        // $users = [];
        // while ($row = $result->fetch_assoc()) {
        //     $users[] = $row;
        // }

        /*
            Second way: Using fetch_all(MYSQLI_ASSOC)
        */
        // $users = $result->fetch_all(MYSQLI_ASSOC);
    }
    return $users;
}

function getUserById($conn)
{
    if (
        $_SERVER['REQUEST_METHOD'] === 'GET' &&
        isset($_GET['user-id'])
    ) {
        $id = $_GET['user-id'];
        $sql = "SELECT * FROM User
        WHERE id =" . $id;

        // if(!empty())
    }
}

$messages = addUsers($conn);

$users = getUsers($conn);

$conn->close();
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connect & Add User Database</title>
</head>

<body>
    <!-- Add user -->
    <h3>Add User</h3>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
        <label>Name:</label>
        <input type="text" name="name" placeholder="Enter your name" required>
        <br>

        <label>Age:</label>
        <input type="number" name="age" placeholder="Enter your age" required>
        <br>

        <label>Email:</label>
        <input type="email" name="email" placeholder="Enter your email" required>

        <br>

        <button type="submit" name="submit">Add User</button>
        <br>

        <?php echo $messages; ?>
        <br>

    </form>
    <!-- Get Users -->
    <h3>Get All User</h3>
    <form action="" method="GET">
        <button type="submit" name="getUsers">Get all users</button>
    </form>

    <table border="1" width="50%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Age</th>
                <th>Email</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($users as $user) { ?>
                <tr>
                    <td> <?php echo htmlspecialchars($user['id']) ?></td>
                    <td> <?php echo htmlspecialchars($user['name']) ?></td>
                    <td> <?php echo htmlspecialchars($user['age']) ?></td>
                    <td> <?php echo htmlspecialchars($user['email']) ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <!-- Get User By ID -->
    <h3>Get User By ID</h3>
    <form action="" method="GET">
        <div>
            <label for="">Enter ID:</label>
            <input type="number" name="user-id">
        </div>
        <!-- call the php here -->
    </form>
</body>

</html>