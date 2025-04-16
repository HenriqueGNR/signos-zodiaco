<?php include('layouts/header.php'); ?>

<?php
// Verificar se recebeu o formulário
if (isset($_POST['data_nascimento'])) {
    // Receber a data de nascimento
    $data_nascimento = $_POST['data_nascimento'];
    
    // Converter para um objeto DateTime
    $data_nascimento_obj = new DateTime($data_nascimento);
    
    // Extrair dia e mês
    $dia = $data_nascimento_obj->format('d');
    $mes = $data_nascimento_obj->format('m');
    
    // Carregar o arquivo XML
    $signos = simplexml_load_file("signos.xml");
    
    // Inicializa variáveis para armazenar informações do signo
    $signoEncontrado = null;
    $signoNome = "";
    $signoDescricao = "";
    
    // Iteração através de cada signo no XML
    foreach ($signos->signo as $signo) {
        // Converter datas de início e fim do formato DD/MM para objetos DateTime
        $partes_inicio = explode('/', $signo->dataInicio);
        $partes_fim = explode('/', $signo->dataFim);
        
        // Aplicamos o mesmo ano (2000 neste caso) para comparação
        $ano_atual = date('Y');
        $data_inicio = new DateTime($ano_atual . '-' . $partes_inicio[1] . '-' . $partes_inicio[0]);
        $data_fim = new DateTime($ano_atual . '-' . $partes_fim[1] . '-' . $partes_fim[0]);
        
        // Criar data de comparação (usando o mesmo ano)
        $data_comparacao = new DateTime($ano_atual . '-' . $mes . '-' . $dia);
        
        // Tratar o caso especial de Capricórnio (final de dezembro a início de janeiro)
        if ((int)$partes_inicio[1] == 12 && (int)$partes_fim[1] == 1) {
            // Se estamos testando para datas em janeiro
            if ($mes == '01') {
                $data_inicio->modify('-1 year'); // Voltamos o ano da data de início
            } 
            // Se estamos testando para datas em dezembro
            else if ($mes == '12') {
                $data_fim->modify('+1 year'); // Avançamos o ano da data de fim
            }
        }
        
        // Verificar se a data está dentro do período do signo
        if ($data_comparacao >= $data_inicio && $data_comparacao <= $data_fim) {
            $signoEncontrado = $signo;
            $signoNome = (string)$signo->signoNome;
            $signoDescricao = (string)$signo->descricao;
            break;
        }
    }
}
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <?php if (isset($signoEncontrado)): ?>
                <div class="card shadow">
                    <div class="card-header bg-primary text-white text-center">
                        <h3>Seu Signo: <?php echo $signoNome; ?></h3>
                    </div>
                    <div class="card-body">
                        <div class="text-center mb-4">
                            <img src="assets/imgs/signs/<?php echo strtolower($signoNome); ?>.png" alt="<?php echo $signoNome; ?>" class="img-fluid signo-img">
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-4 text-center">
                                <div class="info-box">
                                    <h5>Data</h5>
                                    <p><?php echo $signoEncontrado->dataInicio; ?> - <?php echo $signoEncontrado->dataFim; ?></p>
                                </div>
                            </div>
                            <div class="col-md-4 text-center">
                                <div class="info-box">
                                    <h5>Signo</h5>
                                    <p><?php echo $signoNome; ?></p>
                                </div>
                            </div>
                            <div class="col-md-4 text-center">
                                <div class="info-box">
                                    <h5>Sua Data</h5>
                                    <p><?php echo date('d/m/Y', strtotime($data_nascimento)); ?></p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="descricao-box p-3 mb-3">
                            <h4 class="text-center mb-3">Características</h4>
                            <p><?php echo $signoDescricao; ?></p>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <a href="index.php" class="btn btn-primary">Nova Consulta</a>
                    </div>
                </div>
            <?php else: ?>
                <div class="alert alert-danger">
                    <h4 class="alert-heading">Erro!</h4>
                    <p>Não foi possível determinar o signo com a data fornecida. Por favor, tente novamente.</p>
                    <hr>
                    <p class="mb-0">
                        <a href="index.php" class="btn btn-outline-danger">Voltar</a>
                    </p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Scripts Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" 
crossorigin="anonymous"></script>

</body>
</html>
