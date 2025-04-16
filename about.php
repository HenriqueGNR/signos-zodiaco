<?php include('layouts/header.php'); ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white text-center">
                    <h3>Sobre o Projeto</h3>
                </div>
                <div class="card-body">
                    <div class="text-center mb-4">
                        <img src="assets/imgs/about-zodiac.png" alt="Signos do Zodíaco" class="img-fluid about-img">
                    </div>
                    
                    <div class="about-section mb-4">
                        <h4 class="section-title">Autor</h4>
                        <div class="author-info p-3">
                            <p class="mb-1"><strong>Nome:</strong> Henrique Gonzaga do Nascimento Rodrigues</p>
                            <p class="mb-0"><strong>Curso:</strong> Engenharia de Software</p>
                        </div>
                    </div>
                    
                    <div class="about-section mb-4">
                        <h4 class="section-title">Sobre o Projeto</h4>
                        <p>Este site foi desenvolvido como um relatório de aula prática da disciplina de Programação Web (5º Semestre). O objetivo do projeto é criar uma aplicação que permita aos usuários descobrir seu signo zodiacal com base em sua data de nascimento.</p>
                        <p>A aplicação utiliza PHP, HTML, CSS e Bootstrap para criar uma interface amigável e responsiva, além de implementar a leitura de dados a partir de um arquivo XML.</p>
                    </div>
                    
                    <div class="about-section mb-4">
                        <h4 class="section-title">Tecnologias Utilizadas</h4>
                        <ul class="tech-list">
                            <li><span class="tech-badge">PHP</span> - Processamento server-side e manipulação de XML</li>
                            <li><span class="tech-badge">HTML5</span> - Estruturação do conteúdo web</li>
                            <li><span class="tech-badge">CSS3</span> - Estilização personalizada</li>
                            <li><span class="tech-badge">Bootstrap</span> - Framework CSS para design responsivo</li>
                            <li><span class="tech-badge">XML</span> - Armazenamento de dados dos signos</li>
                        </ul>
                    </div>
                    
                    <div class="about-section mb-4">
                        <h4 class="section-title">Fontes de Informação</h4>
                        <p>As informações sobre os signos zodiacais utilizadas neste projeto foram obtidas a partir da seguinte fonte:</p>
                        <div class="source-box p-3">
                            <p class="mb-1"><strong>Wikipedia:</strong> <a href="https://pt.wikipedia.org/wiki/Signo_astrol%C3%B3gico" target="_blank">Signo Astrológico</a></p>
                            <p class="mb-0 small text-muted">Artigo com informações detalhadas sobre cada signo do zodíaco, suas características e períodos.</p>
                        </div>
                    </div>
                    
                    <div class="about-section">
                        <h4 class="section-title">Como Funciona</h4>
                        <p>O funcionamento do site é bem simples:</p>
                        <ol>
                            <li>Na página inicial, o usuário insere sua data de nascimento e clica em "Consultar Signo".</li>
                            <li>O sistema processa essa informação, comparando com os períodos de cada signo armazenados em um arquivo XML.</li>
                            <li>Uma vez identificado o signo correspondente, o usuário é redirecionado para uma página que exibe informações detalhadas sobre seu signo.</li>
                        </ol>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <a href="index.php" class="btn btn-primary">Voltar para Consulta</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Scripts Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" 
crossorigin="anonymous"></script>

</body>
</html>
