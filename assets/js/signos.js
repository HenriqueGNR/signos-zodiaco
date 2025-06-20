// Dados dos signos convertidos do XML para JSON
const signosData = [
    {
        dataInicio: "21/03",
        dataFim: "20/04",
        signoNome: "Áries",
        descricao: "Áries é o primeiro signo do zodíaco, regido por Marte. Os arianos são conhecidos por sua energia inesgotável, espírito aventureiro e atitude pioneira. São pessoas diretas, impulsivas e que adoram iniciar novos projetos."
    },
    {
        dataInicio: "21/04",
        dataFim: "20/05",
        signoNome: "Touro",
        descricao: "Touro é o segundo signo do zodíaco, regido por Vênus. Os taurinos são conhecidos por sua determinação, praticidade e amor pelo conforto. São pessoas estáveis, pacientes e muito ligadas aos prazeres sensoriais."
    },
    {
        dataInicio: "21/05",
        dataFim: "20/06",
        signoNome: "Gêmeos",
        descricao: "Gêmeos é o terceiro signo do zodíaco, regido por Mercúrio. Os geminianos são conhecidos por sua versatilidade, curiosidade e inteligência. São pessoas comunicativas, adaptáveis e que adoram aprender coisas novas."
    },
    {
        dataInicio: "21/06",
        dataFim: "22/07",
        signoNome: "Câncer",
        descricao: "Câncer é o quarto signo do zodíaco, regido pela Lua. Os cancerianos são conhecidos por sua sensibilidade, intuição e profundidade emocional. São pessoas protetoras, acolhedoras e que valorizam muito a família."
    },
    {
        dataInicio: "23/07",
        dataFim: "22/08",
        signoNome: "Leão",
        descricao: "Leão é o quinto signo do zodíaco, regido pelo Sol. Os leoninos são conhecidos por sua confiança, generosidade e carisma. São pessoas criativas, orgulhosas e que adoram ser o centro das atenções."
    },
    {
        dataInicio: "23/08",
        dataFim: "22/09",
        signoNome: "Virgem",
        descricao: "Virgem é o sexto signo do zodíaco, regido por Mercúrio. Os virginianos são conhecidos por sua praticidade, perfeccionismo e senso analítico. São pessoas metódicas, dedicadas e que prestam muita atenção aos detalhes."
    },
    {
        dataInicio: "23/09",
        dataFim: "22/10",
        signoNome: "Libra",
        descricao: "Libra é o sétimo signo do zodíaco, regido por Vênus. Os librianos são conhecidos por seu senso de justiça, diplomacia e apreciação pela beleza. São pessoas sociáveis, equilibradas e que valorizam muito os relacionamentos."
    },
    {
        dataInicio: "23/10",
        dataFim: "21/11",
        signoNome: "Escorpião",
        descricao: "Escorpião é o oitavo signo do zodíaco, regido por Plutão e Marte. Os escorpianos são conhecidos por sua intensidade, intuição e poder de transformação. São pessoas determinadas, misteriosas e profundamente emocionais."
    },
    {
        dataInicio: "22/11",
        dataFim: "21/12",
        signoNome: "Sagitário",
        descricao: "Sagitário é o nono signo do zodíaco, regido por Júpiter. Os sagitarianos são conhecidos por seu otimismo, espírito aventureiro e busca pela verdade. São pessoas independentes, filosóficas e amantes da liberdade."
    },
    {
        dataInicio: "22/12",
        dataFim: "20/01",
        signoNome: "Capricórnio",
        descricao: "Capricórnio é o décimo signo do zodíaco, regido por Saturno. Os capricornianos são conhecidos por sua ambição, responsabilidade e determinação. São pessoas práticas, disciplinadas e que têm grandes objetivos de vida."
    },
    {
        dataInicio: "21/01",
        dataFim: "18/02",
        signoNome: "Aquário",
        descricao: "Aquário é o décimo primeiro signo do zodíaco, regido por Urano e Saturno. Os aquarianos são conhecidos por sua originalidade, independência e visão humanitária. São pessoas progressistas, intelectuais e que valorizam muito a amizade."
    },
    {
        dataInicio: "19/02",
        dataFim: "20/03",
        signoNome: "Peixes",
        descricao: "Peixes é o décimo segundo signo do zodíaco, regido por Netuno e Júpiter. Os piscianos são conhecidos por sua sensibilidade, intuição e compaixão. São pessoas sonhadoras, artísticas e profundamente conectadas com o mundo espiritual."
    }
];

// Função para determinar o signo baseado na data
function determinarSigno(dataNascimento) {
    const data = new Date(dataNascimento + 'T00:00:00');
    const dia = data.getDate();
    const mes = data.getMonth() + 1; // getMonth() retorna 0-11, então adicionamos 1
    
    for (let signo of signosData) {
        const [diaInicio, mesInicio] = signo.dataInicio.split('/').map(Number);
        const [diaFim, mesFim] = signo.dataFim.split('/').map(Number);
        
        // Caso especial para Capricórnio (dezembro a janeiro)
        if (mesInicio === 12 && mesFim === 1) {
            if ((mes === 12 && dia >= diaInicio) || (mes === 1 && dia <= diaFim)) {
                return signo;
            }
        } else {
            // Casos normais
            if (mes === mesInicio && dia >= diaInicio) {
                return signo;
            } else if (mes === mesFim && dia <= diaFim) {
                return signo;
            } else if (mes > mesInicio && mes < mesFim) {
                return signo;
            }
        }
    }
    
    return null;
}

// Função para formatar data no formato brasileiro
function formatarData(data) {
    const dataObj = new Date(data);
    const dia = String(dataObj.getUTCDate()).padStart(2, '0');
    const mes = String(dataObj.getUTCMonth() + 1).padStart(2, '0');
    const ano = dataObj.getUTCFullYear();
    return `${dia}/${mes}/${ano}`;
}

// Função para exibir resultado do signo
function exibirResultado(signo, dataNascimento) {
    document.getElementById('signo-titulo').textContent = `Seu Signo: ${signo.signoNome}`;
    document.getElementById('signo-nome').textContent = signo.signoNome;
    document.getElementById('signo-periodo').textContent = `${signo.dataInicio} - ${signo.dataFim}`;
    document.getElementById('data-usuario').textContent = formatarData(dataNascimento);
    document.getElementById('signo-descricao').textContent = signo.descricao;
    
    // Configurar imagem do signo
    const signoImg = document.getElementById('signo-imagem');
    signoImg.src = `assets/imgs/signs/${signo.signoNome.toLowerCase()}.png`;
    signoImg.alt = signo.signoNome;
    
    // Mostrar resultado e esconder formulário
    document.querySelector('.container.mt-5').style.display = 'none';
    document.getElementById('resultado-signo').style.display = 'block';
    document.getElementById('erro-signo').style.display = 'none';
}

// Função para exibir erro
function exibirErro() {
    document.querySelector('.container.mt-5').style.display = 'none';
    document.getElementById('resultado-signo').style.display = 'none';
    document.getElementById('erro-signo').style.display = 'block';
}

// Função para nova consulta
function novaConsulta() {
    document.querySelector('.container.mt-5').style.display = 'block';
    document.getElementById('resultado-signo').style.display = 'none';
    document.getElementById('erro-signo').style.display = 'none';
    document.getElementById('data_nascimento').value = '';
}

// Event listener para o formulário
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('signo-form');
    
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        const dataNascimento = document.getElementById('data_nascimento').value;
        
        if (!dataNascimento) {
            alert('Por favor, selecione uma data de nascimento.');
            return;
        }
        
        const signo = determinarSigno(dataNascimento);
        
        if (signo) {
            exibirResultado(signo, dataNascimento);
        } else {
            exibirErro();
        }
    });
});
