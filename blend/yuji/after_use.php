$username = $_POST['username'];

if($username == ''){ // [J-09]
$errors['username']='blank';
} // [J-09]usernameがブランクかどうかの条件閉鎖
