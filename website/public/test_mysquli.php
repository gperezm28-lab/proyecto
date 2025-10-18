<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Verificación de MYSQLI_STORE_RESULT</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 2rem;
        }
        .resultado {
            padding: 1rem;
            border-radius: 5px;
            background-color: #fff;
            box-shadow: 0 0 5px rgba(0,0,0,0.1);
            max-width: 400px;
            margin: auto;
            text-align: center;
        }
        .existe {
            color: green;
            font-weight: bold;
        }
        .no-existe {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="resultado">
        <h2>Verificación de constante MYSQLI_STORE_RESULT</h2>
        <?php
            if (defined('MYSQLI_STORE_RESULT')) {
                echo '<p class="existe">✅ La constante MYSQLI_STORE_RESULT está definida.</p>';
            } else {
                echo '<p class="no-existe">❌ La constante MYSQLI_STORE_RESULT NO está definida.</p>';
            }
        ?>
    </div>
</body>
</html>
