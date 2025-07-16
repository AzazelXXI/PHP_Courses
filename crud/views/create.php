<?php include '../include/header.php'; ?>

<p>This is create</p>

<form action="../functions/crud.php" method="POST">
    <div>
        <label for="">Name:</label>
        <input type="text" name="name">
    </div>

    <div>
        <label for="">Age:</label>
        <input type="number" name="name">
    </div>

    <div>
        <label for="">Email:</label>
        <input type="email" name="email">
    </div>

    <div>
        <input type="submit" name="submit" value="Submit">
    </div>
</form>

<?php include '../include/footer.php'; ?>