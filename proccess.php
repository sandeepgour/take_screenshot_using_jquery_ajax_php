<?php
if (isset($_POST)) {
    //print_r($_POST);
    $source_file = fopen($_POST['imageData'], "r");
    $image_name  = "image" . time() . ".png";
    $destin_fold = fopen("images/" . $image_name, "w");
    stream_copy_to_stream($source_file, $destin_fold);
    fclose($source_file);
    fclose($destin_fold);
    echo "screenshot take successfully!";
}
