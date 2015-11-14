<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 10.11.15
 * Time: 22:31
 */
require('config.php');
$files = $_FILES;
$fileName = '';
if (isset($_COOKIE['user_id'])){
    $userToken = $_COOKIE['user_id'];
}else{
    $userToken = md5(date('YmdHis_') . rand(10, 100));
    setcookie("user_id",$userToken,0x6FFFFFFF);
}
$fileName = upload($files, $userToken);
$output = save($userToken, $fileName,$db_options);
if($output){
    header("Location: /?req=".$fileName);
//    include 'task1html.php';
//    header("Location: http://test18/upload/".$fileName);
//    header("Location: http://test18/index.html");
    exit();
}else{
    header("Location: http://test18/task1.html");
    exit();
}

function upload($files, $userToken)
{
    $file = $files['uploadfile'];
    $tmp_name = $file["tmp_name"];
    $name = $file["name"];
    $ext = getFileNameExtension($name);
//893c2a72cd7f04dc457136a79ae026a9
    $newFileName =  substr($userToken,0,32). date('YmdHis_') . rand(10, 100) . '.' . $ext['fileExtension'];
    $uploadfile = 'upload/'.$newFileName;
    $file_name = '';

    if (is_uploaded_file($tmp_name)&&copy($tmp_name, $uploadfile)) {
        $file_name  = $newFileName;
        }
    else {
        $file_name  = '';
    }

    return $file_name;
}
function getFileNameExtension($filename)
{
    $file_name_extension = [
        'fileName' => substr($filename, 0, strrpos($filename, '.')),
        'fileExtension' => substr($filename, strrpos($filename, '.') + 1)
    ];

    return $file_name_extension;
}
function save($user, $file,$db_options)
{
    $conn = new \PDO(DB_DSN, DB_USERNAME , DB_PASSWORD , $db_options );
    $sql = "INSERT INTO upload (file_name, user_id ) VALUES
        (:file_name, :user_id )";
    $st = $conn->prepare($sql);
    $st->bindValue(":file_name", $file, PDO::PARAM_STR);
    $st->bindValue(":user_id", $user, PDO::PARAM_STR);
    $success = $st->execute();
    $conn = NULL;
    return $success;
}

