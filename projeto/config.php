<!DOCTYPE html>
<html style="text-align: center; background-color: #e3e3e3;">
<head>
    <style>
        /* Estilo do Toast */
        .toast {
            position: fixed;
            top: 20px; 
            left: 50%;
            transform: translateX(-50%);
            background-color: #4CAF50;
            color: white;
            padding: 15px;
            border-radius: 5px;
            font-size: 18px;
            font-weight: bold;
            display: none;
            z-index: 9999;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .error-toast {
            background-color: #f44336;
        }

        /* Estilo do Link */
        .toast-link {
            display: block;
            margin-top: 8%;
            color: #000;
            text-decoration: none;
            font-size: 16px;
            font-weight: normal;
        }

        .toast-link:hover {
            text-decoration: underline;
        }

        /* Animação do Toast */
        .toast-show {
            display: block;
            animation: fadeInOut 4s ease-in-out;
        }

        @keyframes fadeInOut {
            0% { opacity: 0; top: 0; }
            10% { opacity: 1; top: 20px; }
            90% { opacity: 1; top: 20px; }
            100% { opacity: 0; top: 0; }
        }
    </style>
</head>
<body>
<?php
    $host = "localhost";
    $user = "root"; 
    $pass = ""; 
    $dbname = "formulario";

    $conn = new mysqli($host, $user, $pass, $dbname);

    if ($conn->connect_error) {
        die("Erro na conexão: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO usuario (nome, email, telefone, curso, identificacao_racial, evento) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $_POST['nome'], $_POST['email'], $_POST['telefone'], $_POST['curso'], $_POST['identificacao_racial'], $_POST['evento']);
    
    if ($stmt->execute()) {
        echo '<div class="toast toast-show" id="toast">Dados inseridos com sucesso!</div>';
        echo '<a href="index.html" class="toast-link">Clique aqui para voltar à página inicial</a>';
    } else {
        echo '<div class="toast error-toast toast-show" id="toast">Erro ao inserir dados: ' . $stmt->error . '</div>';
        echo '<a href="index.html" class="toast-link">Clique aqui para voltar à página inicial</a>';
    }

    $stmt->close();
    $conn->close();
?>

<script>
    setTimeout(function() {
        var toast = document.getElementById('toast');
        if (toast) {
            toast.style.display = 'none'; 
        }
    }, 4000); // 4000 milissegundos = 4 segundos
</script>

</body>
</html>
 


