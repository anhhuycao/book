<html>

<head>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>

<body>
    <?php
    $servername = "192.168.2.113";
    $username = "mysql";
    $password = "mysql";
    $dbname = "mbook";
    $connect = new mysqli($servername, $username, $password, $dbname);
    if ($connect->connect_error) {
        die("Connection failed: " . $connect->connect_error);
    }

    $sql = "SELECT * FROM book WHERE bcategory = '{$_GET["category"]}'";
    $result = $connect->query($sql); ?>

    <h2>Table Books</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Author</th>
            <th>Publishing</th>
            <th>Category</th>
            <th>Price</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
        ?>
            <?php
            while ($row = $result->fetch_assoc()) {
            ?>
                <tr>
                    <td><?php echo $row["idbook"] ?></td>
                    <td><?php echo $row["bname"] ?></td>
                    <td><?php echo $row["author"] ?></td>
                    <td><?php echo $row["publishing"] ?></td>
                    <td><?php echo $row["bcategory"] ?></td>
                    <td><?php echo $row["price"] ?></td>
                </tr>
            <?php
            } ?>
        <?php
        }  ?>
    </table>
</body>

</html>