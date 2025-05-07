<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST["name"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $message = htmlspecialchars(trim($_POST["message"]));
    
    $errors = [];
    
    if (empty($name)) {
        $errors[] = "Имя обязательно для заполнения";
    }
    
    if (empty($email)) {
        $errors[] = "Email обязателен для заполнения";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Некорректный формат email";
    }
    
    if (empty($message)) {
        $errors[] = "Сообщение обязательно для заполнения";
    } elseif (strlen($message) < 10) {
        $errors[] = "Сообщение должно содержать не менее 10 символов";
    }
    

    if (empty($errors)) {
        echo "Спасибо за ваше сообщение, " . $name . "! Мы скоро с вами свяжемся.";
    } else {

        echo "<h2>Ошибки при отправке формы:</h2>";
        foreach ($errors as $error) {
            echo "<p>" . $error . "</p>";
        }
        echo '<p><a href="feedback.html">Попробовать снова</a></p>';
    }
} else {
    header("Location: feedback.html");
    exit();
}
?>