<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = htmlspecialchars(trim($_POST["email"]));
    
    $errors = [];
    
    if (empty($email)) {
        $errors[] = "Email обязателен для заполнения";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Некорректный формат email";
    }
    
    if (empty($errors)) {
        echo "Спасибо за подписку! На адрес " . $email . " будут приходить наши новости.";
    } else {
        echo "<h2>Ошибки при подписке:</h2>";
        foreach ($errors as $error) {
            echo "<p>" . $error . "</p>";
        }
        echo '<p><a href="subscribe.html">Попробовать снова</a></p>';
    }
} else {
    header("Location: subscribe.html");
    exit();
}
?>