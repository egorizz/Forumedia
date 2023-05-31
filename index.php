<?php
include 'settings.php';

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

$limit = 5;
$offset = ($page - 1) * $limit;

$query = "SELECT * FROM news ORDER BY idate DESC LIMIT $limit OFFSET $offset";
$result = $mysqli->query($query);

$query_count = "SELECT COUNT(*) as count FROM news";
$result_count = $mysqli->query($query_count);
$count = $result_count->fetch_assoc()['count'];

$pages = ceil($count / $limit);

$mysqli->close();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Список новостей</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1 class="mt-5 mb-3">Список новостей</h1>
        <?php while ($row = $result->fetch_assoc()) : ?>
            <div class="card mb-3">
                <div class="card-body">
                    <h2 class="card-title"><?php echo $row['title']; ?></h2>
                    <p class="card-text"><?php echo $row['announce']; ?></p>
                    <a href="view.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Подробнее</a>
                </div>
            </div>
        <?php endwhile; ?>

        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center flex-wrap mx-auto">
                <?php if ($page > 1) : ?>
                    <li class="page-item">
                        <a class="page-link" href="?page=<?php echo $page - 1; ?>" aria-label="Предыдущая страница">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                <?php endif; ?>

                <?php for ($i = 1; $i <= $pages; $i++) : ?>
                    <?php if ($i == $page) : ?>
                        <li class="page-item active"><a class="page-link" href="#"><?php echo $i; ?></a></li>
                    <?php else : ?>
                        <li class="page-item"><a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                    <?php endif; ?>
                <?php endfor; ?>

                <?php if ($page < $pages) : ?>
                    <li class="page-item">
                        <a class="page-link" href="?page=<?php echo $page + 1; ?>" aria-label="Следующая страница">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</body>

</html>