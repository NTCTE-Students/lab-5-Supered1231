<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars(trim($_POST["username"]));
    $password = htmlspecialchars(trim($_POST["password"]));
    
    $errors = [];
    
    if (empty($username)) {
        $errors[] = "Имя пользователя обязательно для заполнения";
    } elseif (strlen($username) < 4) {
        $errors[] = "Имя пользователя должно содержать минимум 4 символа";
    }
    
    if (empty($password)) {
        $errors[] = "Пароль обязателен для заполнения";
    }
    
    if (empty($errors)) {
        echo "Добро пожаловать, " . $username . "! Вы успешно вошли в систему.";
    } else {
        echo "<h2>Ошибки при входе:</h2>";
        foreach ($errors as $error) {
            echo "<p>" . $error . "</p>";
        }
        echo '<p><a href="login.html">Попробовать снова</a></p>';
    }
} else {
    header("Location: login.html");
    exit();
}
?>
