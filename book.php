<html>

<head>
  <style type="text/css">
    .form-group {
      margin-bottom: 16px;
    }

    input,
    select {
      padding: 4px 8px;
    }

    label {
      display: block;
    }

    button {
      padding: 4px 8px;
      border: none;
      background-color: green;
      color: white;
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

  $sql = "SELECT * FROM book";
  $result = $connect->query($sql);
  ?>
  <div>
    <h2>Search By ID</h2>
    <form action="search.php" method="get">
      <div class="form-group">
        <label for="IDbook">Book ID</label>
        <input name="idbook" type="text" id="IDbook" />
      </div>
      <button type="submit">Search</button>
    </form>
  </div>
  <div>---------------------------------------------------</div>
  <div>
    <h2>Select By Category</h2>
    <select id="idCategory" onchange="onChangeCategory()">
      <?php
      if ($result->num_rows > 0) { ?>
        <?php
        while ($row = $result->fetch_assoc()) { ?>
          <option value="<?php echo $row["bcategory"] ?>"><?php echo $row["bcategory"] ?></option>
        <?php
        } ?>
      <?php
      }  ?>
    </select>
  </div>
</body>

<script>
  function onChangeCategory() {
    const category = document.getElementById("idCategory").value;
    window.open(`http://localhost/select.php?category=${category}`, "_self");
  }
</script>

</html>