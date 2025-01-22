<?php
session_start();

// Verificar se o usuário está logado
if (!isset($_SESSION['usuario_id'])) {
    header('Location: ../index.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel do Investidor Conservador</title>
    <link rel="stylesheet" href="../css/painel-style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="sidebar">
        <h3 style="text-align: center"><i class="fa fa-user"></i></h3>
        <h3 id="user-name">Nome do Usuário</h3>
        <p id="user-email">Email do Usuário</p>
        <hr>
        <a href="#currency-values"><i class="fa-solid fa-coins"></i> Moedas</a>
        <a href="#investimento"><i class="fa-solid fa-chart-line"></i> Investimento</a>
        <a href="#orientacoes"><i class="fa-regular fa-lightbulb"></i> Orientações</a>
        <a href="#economia"><i class="fa fa-dollar"></i> Economia</a>
        <a href="#forum"><i class="fa-regular fa-comments"></i> Fórum</a>
        <a href="#links-uteis"><i class="fa-solid fa-link"></i> Links úteis</a>
        <a href="../index.php"><i class="fa-solid fa-power-off"></i> Sair</a>
    </div>
    <div class="content">
        <h1 class="text-white text-center f-300">Bem-vindo ao Painel do Investidor Conservador</h1>
        <p class="text-white text-center f-300">Aqui você terá informações necessárias para a <strong>segurança da sua vida financeira</strong>.</p>
        <hr>
        
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div id="currency-values" class="text-white text-center">
                        <h3 class="f-300">Valores das Moedas em <strong>Reais (BRL)</strong></h3>
                        <ul id="currency-list"></ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <h3 class="text-white f-300">Gráfico da Bolsa de Valores</h3>
                    <div id="chart-container">
                        <canvas id="stockChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="container">
            <div class="row" id="investimento">
                <div class="col-sm-4 card-inv"><h3 class="text-white f-300">Renda Fixa - Tesouro Direto</h3><br><p class="text-white">Plataforma segura para investir em títulos públicos e garantir rentabilidade.</p> <a href="https://www.tesourodireto.com.br/" target="_blank" class="btn btn-outline-light">Clique aqui</a></div>
                <div class="col-sm-4 card-inv"><h3 class="text-white f-300">CDBs - Certificados de Depósito Bancário</h3><p class="text-white">Uma opção segura e rentável para quem busca menor risco.</p> <a href="https://www.bb.com.br/site/investimentos/cdb/?gad_source=1&gclid=Cj0KCQjwmt24BhDPARIsAJFYKk0V1Rfd_xujB6tFMiXFXZl7c37LH5f4-Km2QPSkUNs8E7Hhhs_rhL0aAnxqEALw_wcB" target="_blank" class="btn btn-outline-light">Clique aqui</a></div>
                <div class="col-sm-4 card-inv"><h3 class="text-white f-300">Fundos Imobiliários - FIIs</h3><p class="text-white">Investimento em imóveis sem precisar comprar um imóvel físico.</p> <a href="https://lps.rico.com.vc/fiis?campaignid=19867016603&adgroupid=&feeditemid=&targetid=&loc_interest_ms=&loc_physical_ms=9100072&matchtype=&network=x&device=c&devicemodel=&ifmobile=&ifmobile=0&ifsearch=&ifsearch=&ifcontent=&ifcontent=&creative=&keyword=&placement=&target=&utm_source=google&utm_medium=cpc&utm_term=&utm_campaign=GGLE_PerformanceMax_Geral_LeadComplete_tCPA&gclid=Cj0KCQjwmt24BhDPARIsAJFYKk3ff591rjlnoLgeadXqEfdTAIlhSqH9JjV15chGH2AxiNt4QFibruAaAkbmEALw_wcB" target="_blank" class="btn btn-outline-light">Clique aqui</a></div>
            </div>
            <br>
            <h4 class="text-white f-300">Tópicos Importantes</h4>  <br>

            <div class="card-texto">
                <h3 class="text-white f-300" id="orientacoes">
                    Orientações
                </h3>
                <p class="text-white">O investidor conservador prioriza a segurança e a preservação do capital. É recomendável diversificar os investimentos, focando em produtos de renda fixa e em ativos que apresentem menor volatilidade. Mantenha um acompanhamento constante do mercado e revise seu portfólio periodicamente, buscando sempre os melhores rendimentos sem arriscar muito. A paciência e a disciplina são essenciais para garantir um crescimento sustentável ao longo do tempo.</p>
            </div>
            <br>

            <div class="card-texto">
                <h3 class="text-white f-300" id="economia">
                    Economia
                </h3>
                <p class="text-white">Para o investidor conservador, entender a economia é fundamental para tomar decisões informadas. Fique atento às taxas de juros, inflação e outros indicadores econômicos que possam impactar seus investimentos. Um ambiente econômico estável e previsível tende a favorecer os investimentos de baixo risco, proporcionando segurança e tranquilidade. Manter-se informado pode ajudá-lo a otimizar seus investimentos e garantir a proteção do seu patrimônio.</p>
            </div>

            <br>
            <div class="card-forum" id="forum">
                <div class="row">
                    <div class="col-sm-9">
                        <h4 class="text-white f-300">Participe do nosso fórum</h4>
                        <p class="text-white">Junte-se à nossa comunidade no InfoMoney! Entre no nosso fórum e conecte-se com outros investidores conservadores. Troque experiências, discuta estratégias e fique por dentro das melhores oportunidades do mercado. Não perca tempo, venha fazer parte dessa troca de conhecimentos!</p>
                    </div>
                    <div class="col-sm-3 align-self-center text-center"><a href="https://www.infomoney.com.br/" class="btn btn-outline-light">Clique aqui</a></div>
                </div>
            </div>

            <br>
            <h3 class="text-white f-300">Links úteis:</h3> <br>
            <div class="row" id="links-uteis">
                <div class="col-sm-6">
                    <iframe width="100%" height="315" src="https://www.youtube.com/embed/WazzfXaC1Ds?si=XqNNrt4qnrpoY0P5" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
                <div class="col-sm-6">
                    <iframe width="100%" height="315" src="https://www.youtube.com/embed/1A5hAHIsyp4?si=Hn8g7OxG1JrB3Ut5" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
            </div>
        </div>

        <div class="container mt-5">
            <div class="card-forum" id="forum">
                <div class="row">
                    <div class="col-sm-9">
                        <h4 class="text-white f-300">Não está satisfeito com as dicas?</h4>
                        <p class="text-white">Preencha novamente o formulário para analisarmos melhor qual tipo de investidor você se encaixa e montarmos uma área personalizada com tudo que você precisa!</p>
                    </div>
                    <div class="col-sm-3 align-self-center text-center"><a href="../cadastro/form.php" class="btn btn-outline-light">Clique aqui</a></div>
                </div>
            </div>
        </div>

        <p class="text-center text-white mb-0 mt-2">&copy; 2024 - giggles</p>
    </div>

    <script>
        fetch('../api/user-data.php')
            .then(response => response.json())
            .then(data => {
                document.getElementById('user-name').textContent = data.nome;
                document.getElementById('user-email').textContent = data.email;
            })
            .catch(error => console.error('Erro ao carregar dados do usuário:', error));

       
        async function fetchCurrencyValues() {
            try {
                const response = await fetch('https://api.exchangerate-api.com/v4/latest/USD'); 
                const data = await response.json();
                const currencyList = document.getElementById('currency-list');
                currencyList.innerHTML = '';

                for (const [currency, value] of Object.entries(data.rates)) {
                    const listItem = document.createElement('li');
                    listItem.textContent = `${currency}: R$ ${(value * data.rates.BRL).toFixed(2)}`; 
                    currencyList.appendChild(listItem);
                }
            } catch (error) {
                console.error('Erro ao buscar valores das moedas:', error);
            }
        }

        fetchCurrencyValues();

        const ctx = document.getElementById('stockChart').getContext('2d');
        const stockChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Seg', 'Ter', 'Qua', 'Qui', 'Sex'],
                datasets: [{
                    label: 'Índice da Bolsa de Valores',
                    data: [1000, 1020, 980, 1050, 1100],
                    backgroundColor: 'rgba(0, 179, 89, 0.2)',
                    borderColor: 'rgba(0, 179, 89, 1)',
                    borderWidth: 2,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: false 
                    }
                }
            }
        });
    </script>
</body>
</html>
