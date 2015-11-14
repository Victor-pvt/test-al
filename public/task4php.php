<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 11.11.15
 * Time: 1:18
 */
require('config.php');

$email = isset($_POST['email']) ? $_POST['email'] : '';
$users = findAll($db_options);
$sortUsers = getSortEmailUsers($users, $email);

$params = [
        'users' => $sortUsers,
        'email' =>$email
];
include 'task4html.php';


 function getSortEmailUsers($users, $email)
{
    $output = [];
    if (empty($email)) {
        return $users;
    }
    $email = (substr($email, 0, 1) == '@') ? $email : '@' . $email;
    $email = strpos($email, '.') ? $email : (substr($email, strlen($email) - 1, 1) == '.') ? $email : $email . '.';
    foreach ($users as $user) {
        $p = strpos($user['email'], $email);
        if ($p !== FALSE) {
            $output[] = $user;
        }
    }

    return $output;
}

function findAll($db_options){
    $conn = new \PDO(DB_DSN, DB_USERNAME , DB_PASSWORD , $db_options );
    $conn->exec("set names utf8");
    $sql = "SELECT * FROM users";
    $st = $conn->prepare($sql);
    $st->execute();
    $users = array();
    $i= 0;
    while ( $row = $st->fetch() ) {
        $users[$i]['id'] = $row['id'];
        $users[$i]['email'] = decode($row['email']);
        $i=$i+1;
    }
    $conn = null;
    return $users;
}

 function encode($string){
    $iv = mcrypt_create_iv(
        mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC),
        MCRYPT_DEV_URANDOM
    );

    $encrypted = base64_encode(
        $iv .
        mcrypt_encrypt(
            MCRYPT_RIJNDAEL_128,
            hash('sha256', CRYPT_KEY, true),
            $string,
            MCRYPT_MODE_CBC,
            $iv
        )
    );
    return $encrypted ;
}
 function decode($encrypted){
    $data = base64_decode($encrypted);
    $iv = substr($data, 0, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC));

    $decrypted = rtrim(
        mcrypt_decrypt(
            MCRYPT_RIJNDAEL_128,
            hash('sha256', CRYPT_KEY, true),
            substr($data, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC)),
            MCRYPT_MODE_CBC,
            $iv
        ),
        "\0"
    );
    return $decrypted ;
}