<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "portfolio_db";

$connection = new mysqli($host, $username, $password, $database);

if ($connection->connect_error) {
    die("Database connection failed: " . $connection->connect_error);
}

$sql = "SELECT title, category, description FROM services ORDER BY title";
$result = $connection->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>PHP MySQL Services | Sherlyn Muthoni</title>
  <link rel="stylesheet" href="index.css" />
</head>
<body>
  <header>
    <div class="container">
      <nav>
        <a class="brand" href="index.html">Sherlyn Muthoni</a>
        <div>
          <a href="index.html">Home</a>
          <a href="about.html">About</a>
          <a href="services.html">Services</a>
          <a href="database.html">Database</a>
          <a href="contact.html">Contact</a>
        </div>
      </nav>
    </div>
  </header>

  <main class="container">
    <section class="section">
      <div class="section-heading">
        <h1>Services From MySQL</h1>
        <p>Basic SELECT query result</p>
      </div>

      <div class="table-wrap">
        <table>
          <thead>
            <tr>
              <th>Title</th>
              <th>Category</th>
              <th>Description</th>
            </tr>
          </thead>
          <tbody>
            <?php if ($result && $result->num_rows > 0): ?>
              <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                  <td><?php echo htmlspecialchars($row["title"]); ?></td>
                  <td><?php echo htmlspecialchars($row["category"]); ?></td>
                  <td><?php echo htmlspecialchars($row["description"]); ?></td>
                </tr>
              <?php endwhile; ?>
            <?php else: ?>
              <tr>
                <td colspan="3">No services found.</td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </section>
  </main>

  <footer>
    <div class="container">
      <p>&copy; 2026 Sherlyn Muthoni</p>
    </div>
  </footer>
</body>
</html>
<?php
$connection->close();
?>
