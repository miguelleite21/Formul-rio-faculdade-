<?php include('layouts/header.php'); ?>

<div class="container mt-5">
    <h1 class="text-center">Resultado do Signo</h1>
    
    <?php
    $data_nascimento = $_POST['data_nascimento'];
    $signos = simplexml_load_file("signos.xml");

    $dataNascimento = DateTime::createFromFormat('Y-m-d', $data_nascimento);
    $dataNascimentoFormatada = $dataNascimento->format('d/m');

    foreach ($signos->signo as $signo) {
        $dataInicio = DateTime::createFromFormat('d/m', (string)$signo->dataInicio);
        $dataFim = DateTime::createFromFormat('d/m', (string)$signo->dataFim);

        if ($dataNascimento >= $dataInicio && $dataNascimento <= $dataFim) {
            echo "<div class='text-center'>
                    <h2>Seu signo é: {$signo->signoNome}</h2>
                    <p>{$signo->descricao}</p>
                  </div>";
            break;
        }
    }
    ?>
    
    <div class="text-center mt-4">
        <a href="index.php" class="btn btn-secondary">Voltar</a>
    </div>
</div>

</body>
</html>
