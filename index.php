<?php include "include/header.php"; ?>
<?php
$select = "SELECT * FROM `video`";
$run = mysqli_query($con , $select);

?>      <?php foreach($run as $video) { ?>
        <div class="video">
            <video src="video/<?php echo $video['file']; ?>" class="video-player"></video>
            <div class="footer">
                <div class="footer-text">
                    <h3><?php echo $video['name']; ?></h3>
                    <p class="description"> <?php echo $video['desribtion']; ?></p>
                    <div class="img-marq">
                        <a href="upload.php"><img src="img/up4.png"></a>
                        <marquee><?php echo $video['marque']; ?></marquee>
                    </div>
                </div>
                <img src="img/play.png" class="img-play">
            </div>
        </div>
        <?php } ?>
        <?php include "include/footer.php"; ?>