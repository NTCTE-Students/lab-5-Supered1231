<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars(trim($_POST["username"]));
    $password = htmlspecialchars(trim($_POST["password"]));
    $confirm_password = htmlspecialchars(trim($_POST["confirm_password"]));

    $errors = [];
    
    if (empty($username)) {
        $errors[] = "Имя пользователя обязательно для заполнения";
    }
    
    if (empty($password)) {
        $errors[] = "Пароль обязателен для заполнения";
    }
    
    if ($password !== $confirm_password) {
        $errors[] = "Пароль и подтверждение пароля не совпадают";
    }
    

    if (empty($errors)) {
    
        echo "Регистрация успешно завершена! Добро пожаловать, " . $username;
    } else {

        echo "<h2>Ошибки при регистрации:</h2>";
        foreach ($errors as $error) {
            echo "<p>" . $error . "</p>";
        }
        echo '<p><a href="register.html">Попробовать снова</a></p>';
    }
} else {
    header("Location: register.html");
    exit();
}
?>