
<?php
$conn = mysqli_connect("127.0.0.1", "root", "", "mp3");


if (isset($_POST['search_term'])) {
    $key = mysqli_real_escape_string($conn, $_POST['search_term']);

    $rs = mysqli_query($conn, "SELECT * FROM album WHERE title LIKE '$key%'");

    if (mysqli_num_rows($rs) > 0) {
        while ($r = mysqli_fetch_array($rs)) {
            $code = $r["code"];
            $title = $r["title"];
            ?>

            <div class="search-item" id="<?=$code?>">
              <img src="album/<?= $code ?>.jpg" alt="cover">
              <div class="info">
                <h5><?= $title ?></h5>
                <small>Artist or Album</small>
              </div>
            </div>

            <?php
        }
    } else {
        echo "<div class='search-item'>
                <div class='info'>
                  <h5>No results found</h5>
                </div>
              </div>";
    }
}
?>
