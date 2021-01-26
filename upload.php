<?php
session_start();
include ('db.php');
header("Content-type: text/css; charset: UTF-8");

if(isset($_POST['submit']))
{
    // variables for thumbnail generation
    $ffmpeg = "C:/xampp/htdocs/kametube/bin/ffmpeg"; // changes depend on system. take note.
    $customImage = $_FILES['inpFile']['size'];
    
    // variables for file uploading
    $file = $_FILES['file'];

    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];
    $unique = uniqid('',true);
    $deleteKey = substr($unique, strlen($unique) - 4, strlen($unique));
    $_SESSION['deleteKey'] = $deleteKey;

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $userInputTitle = $_POST['title'];

    // if user does not enter any title for the video, name the video as it is
    if($userInputTitle == null)
    {
        $userInputTitle = basename($fileName, ".".$fileActualExt);
    }

    $allowed = array('webm', 'mp4', 'ogm', 'wmv', 'mpg', 'ogv', 'mov', 'asx', 'mpeg','m4v', 'avi');
    
    if(in_array($fileActualExt, $allowed))
    {
        if($fileError === 0)
        {
            if($fileSize <  30000000) // 30,000,000 bytes = 30Mbytes
            {
                $fileNameNew = $userInputTitle.".".$fileActualExt;
                $_SESSION['fileUploaded'] = $fileName;
                $_SESSION['titleUploaded'] = $fileNameNew;
                $fileDestination = 'uploads/'.$fileNameNew;

                // thumbnail generation
                $imageName = $userInputTitle."."."png";
                $imageNameNew = str_replace(" ", "", $imageName);
                $thumbnailDestination = "thumbnails/$imageNameNew";

                if($customImage == 0)
                {
                    $cmd = "$ffmpeg -i $fileTmpName -vf thumbnail,scale=640:360 -frames:v 1 $thumbnailDestination";
                    shell_exec($cmd);
                }
                else
                {
                    $customImageTmp = $_FILES['inpFile']['tmp_name'];
                    move_uploaded_file($customImageTmp, $thumbnailDestination);
                }

                // store file-video in server
                move_uploaded_file($fileTmpName, $fileDestination);

                $sql = "INSERT INTO videos (fullname, title, image, deleteKey) VALUES ('$fileNameNew', '$userInputTitle', '$imageNameNew', '$deleteKey')";
                $res = mysqli_query($con, $sql); // store the submitted data into the database table: videos

                if($res == 1)
                {
                    echo "<h1>Video uploaded successfully</h1>";
                    header("Location: uploadSuccess.php?");
                }
            }
            else
            {
                echo "ファイルサイズが大きすぎ！10MB 以下ファイルのみ！";
            }
        }
        else
        {
            echo "動画をアップロードする際にエラーが発生しました";
        }
    }
    else
    {
        echo "動画ファイルではない!";
    }
}
?>
