<?php include "include/header.php"; ?>


<?php

if(isset($_POST['upload'])){
    $title = $_POST['title'];
    $describtion = $_POST['describtion'];
    $marque = $_POST['marque'];
    $file = $_FILES['file']['name'];
    $tmp_video = $_FILES['file'] ['tmp_name'];

    $maxsize = 5242880; //5mb
    $target_file = "video/$file";
    $videoFiletype = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $extention_arr = array("mp4","mpeg","avi","3gp");
    move_uploaded_file($tmp_video, $target_file);


    if(empty($title) || empty($describtion) || empty($marque)){
        
        $worning = "<div class='alert-worning'><p style='text-align: center;padding-top: 15px;'>ادخل جميع الحقول</p></div>";
    }
    elseif (in_array($videoFiletype,$extention_arr)) {
        
        $insert ="INSERT INTO `video`(`id`, `name`, `desribtion`, `marque`, `file`) VALUES 
        ('',
        '$title',
        '$describtion',
        '$marque',
        '$file')";
        $run_video = mysqli_query($con, $insert);

        if(isset($run_video)){
      
            $success= "<div class='alert-success'><p style='text-align: center;padding-top: 15px;'>تم رفع الفيديو </p></div>";
        }
        else {

            
        }
    
     }
    
  

}
//////////////////////////////////////////////

// if(isset($_POST['upload'])){
//     $title = $_POST['title'];
//     $describtion = $_POST['describtion'];
//     $marque = $_POST['marque'];
//     $file = $_FILES['file']['name'];
//     $tmp_video = $_FILES['file'] ['tmp_name'];

//     $maxsize = 5242880; //5mb
//     // $target_dir = "vedio/"; 
//     // $target_file = $target_dir . $_FILES['file'] ['name'];
//     // $videoFiletype = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
//     $extention_arr = array("mp4","mpeg","avi","3gp");

//     move_uploaded_file($tmp_video, "video/$file");
//     echo "<br><br><br><br><br>";
    
//     if(in_array($videoFiletype,$extention_arr)){
//         if($_FILES['file'] ['size'] >= $maxsize || $_FILES['file'] ['size'] == 0){
//             echo "<cnter><p class='alert-worning'>الملف كبير يجب ان يكون اقل من عشرة ميغا </p></center>";
//         }
//         else{
//             if(move_uploaded_file($_FILES['file'] ['tmp_name'] , $target_file)){
//                 $insert ="INSERT INTO `video`(`id`, `name`, `desribtion`, `marque`, `file`) VALUES 
//                 ('',
//                 '$title',
//                 '$describtion',
//                 '$marque',
//                 '$file')";
//                 $run_video = mysqli_query($con, $insert);

//                 if(isset($run_video)){
//                     echo "<cnter><p class='alert-success'>تم رفع الفيديو </p></center>";
//                 }
               
                
//             }
//         }

//     }

// }
?>

        <div class="video bg-control">
            <center class="center">
                <div class="center">
                    <?php
                    if(isset($worning)){
                        echo "$worning";
                    }
                    if(isset($success)){
                        echo "$success";
                    }
                    
                    ?>
                    <h3>رفع فيديو</h3>
                    <img src="img/logo.png" class="logo">
                    <br>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <input type="text" name="title" class="input-all" placeholder="اسم الفيديو">
                        <input type="text" name="describtion" class="input-all" placeholder="وصف الفيديو">
                        <input type="text" name="marque" class="input-all" placeholder="صنف الفيديو ">
                        <input type="file" name="file" class="input-all">
                        <input type="submit" name="upload" class="submit" value="رفع الملف">
                    </form>
                </div>
            </center>
            <a href="index.php" class="btn-to">الرجوع للموقع</a>
        </div>

<?php include "include/footer.php"; ?>