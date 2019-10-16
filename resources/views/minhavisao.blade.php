<!doctype html>
<html>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <style>
        .cabecalho {
        background-color: #a2a2a270;
        padding: 2rem;
    }

    .cabecalhoGrid {
        border-style: solid;
        border-width: 1px 0px 1px 0px !important;
    }

    .centroGrid{
        border-style: solid;
        border-width: 0px 1px 0px 1px !important;
    }

    .button {
        border-radius: 0px !important;
        border-right: 1px solid !important;
        border-left: 1px solid !important;
        width: 2.6rem;
    }

    .conteudoGrid {
        border-top: 1px solid;
        border-left: 1px solid;
        overflow-x: hidden;
        overflow-y: scroll;
        height: 16.3rem;
        width: 100%;
    }

    .celulaGrid {
        border-right: solid 1px;
        border-bottom: solid 1px;
    }

    .setPresenca {
        width: 2.4rem;
        height: 2.3rem;
        border-right: solid 1px;
    }

    .firstCelula {
        width: 13.8rem;
    }
    </style>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Presenças Disciplinas</title>
  </head>
  <body>
        <div class="container">
            <div class="col-lg-12 cabecalho mt-3">
                <div class="row">
                    <div class="col-lg-6">
                        <h3>Sistema de Chamadas</h3>
                    </div>
                    <div class="col-lg-6 from-group">
                        <select name="select" id="selectDisciplina" class="form-control">
                            <option value="Programação Web" selected>Programação Web</option> 
                            <option value="Comunicação">Comunicação</option>
                            <option value="Estrutura de Dados">Estrutura de Dados</option>
                        </select>
                    </div> 
                </div>
            </div>
            <div class="col-lg-12">
                <div class="row mt-3">
                    <div class="col-lg-12">
                        <h3 class="text-center" id="selectedDisciplina"></h3>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="firstCelula">
                    </div>
                    <div class="col cabecalhoGrid">
                        <div class="row">
                            <button type="button" class="btn button btn-warning" id="voltarPeriodo"> < </button>
                            <div class="col">
                                <h4 class="text-center mt-2" id="periodoGrid1"></h4>
                            </div>
                        </div>
                    </div>
                    <div class="col cabecalhoGrid">
                        <div class="row centroGrid">
                            <div class="col">
                                <h4 class="text-center mt-2" id="periodoGrid2"></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col cabecalhoGrid">
                        <div class="row">
                            <div class="col">
                                <h4 class="text-center mt-2" id="periodoGrid3"></h4>
                            </div>
                            <button type="button" class="btn button btn-warning" id="avancarPeriodo"> > </button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="conteudoGrid" id="gridConteudo">
                                
                    </div>
                </div>                
            </div>            
        </div>

    <script>

    var disciplinaSelecionada = $("#selectDisciplina").val();

    $("#selectedDisciplina").text(disciplinaSelecionada);

    $("#selectDisciplina").on('change', function(){
        $("#selectedDisciplina").text($("#selectDisciplina").val());
    });

    var disciplinas = [];

    var periodos = [];

    var dataAtual = new Date();

    for(var i = 0; i < 6; i++){
        periodos[i] = dataAtual.getDate() + "/" + (dataAtual.getMonth() + 1);
        dataAtual.setDate(dataAtual.getDate() + 7);
    }

    var alunos = [];
            
    alunos["Alan"] = [];
    alunos["Alana"] = [];
    alunos["Cristina"] = [];
    alunos["Daniel"] = [];
    alunos["Erik"] = [];
    alunos["Fabricio"] = [];
    alunos["Leonardo"] = [];
    alunos["Rafaela"] = [];
    alunos["Rodrigo"] = [];

    $("#selectDisciplina option").each(function(){
        disciplinas[$(this).val()] = [];
        for(var i = 0; i < 6; i++){
            var alunosInterno = [];
            
            alunosInterno["Alan"] = [0, 0, 0, 0, 0, 0];
            alunosInterno["Alana"] = [0, 0, 0, 0, 0, 0];
            alunosInterno["Cristina"] = [0, 0, 0, 0, 0, 0];
            alunosInterno["Daniel"] = [0, 0, 0, 0, 0, 0];
            alunosInterno["Erik"] = [0, 0, 0, 0, 0, 0];
            alunosInterno["Fabricio"] = [0, 0, 0, 0, 0, 0];
            alunosInterno["Leonardo"] = [0, 0, 0, 0, 0, 0];
            alunosInterno["Rafaela"] = [0, 0, 0, 0, 0, 0];
            alunosInterno["Rodrigo"] = [0, 0, 0, 0, 0, 0];

            var periodoDisciplina = alunosInterno;
            disciplinas[$(this).val()].push(periodoDisciplina);
        }      
    });

    $("#selectDisciplina").click(function(){
        renderizarLista(0);
    });

    var currentPeriodo = 0;

    renderizarLista(currentPeriodo);

    $("#periodoGrid1").text(periodos[0]);
    $("#periodoGrid2").text(periodos[1]);
    $("#periodoGrid3").text(periodos[2]);

    $("#voltarPeriodo").click(function(){
        currentPeriodo = 0;
        $("#periodoGrid1").text(periodos[0]);
        $("#periodoGrid2").text(periodos[1]);
        $("#periodoGrid3").text(periodos[2]);
        renderizarLista(currentPeriodo);
    });

    $("#avancarPeriodo").click(function(){
        currentPeriodo = 1;
        $("#periodoGrid1").text(periodos[3]);
        $("#periodoGrid2").text(periodos[4]);
        $("#periodoGrid3").text(periodos[5]);
        renderizarLista(currentPeriodo);
    });

    function renderizarLista(periodo){

        var divConteudo = $("#gridConteudo");
        
        divConteudo.empty();

            for( aluno in alunos ) {
                var primeiraColuna = 
                '<div class="col-lg-3 celulaGrid"><h4 class="text-center">'+
                aluno+'</h4></div>';

                if( periodo == 0 ){

                var segundaColuna =
                '<div class="col-lg-3 celulaGrid"><div class="row">'+
                '<div class="col setPresenca" id="'+aluno+'-col-0-ind-0">'+valoresPresenca(aluno, 0, 0)+'</div>'+
                '<div class="col setPresenca" id="'+aluno+'-col-0-ind-1">'+valoresPresenca(aluno, 0, 1)+'</div>'+
                '<div class="col setPresenca" id="'+aluno+'-col-0-ind-2">'+valoresPresenca(aluno, 0, 2)+'</div>'+
                '<div class="col setPresenca" id="'+aluno+'-col-0-ind-3">'+valoresPresenca(aluno, 0, 3)+'</div>'+
                '<div class="col setPresenca" id="'+aluno+'-col-0-ind-4">'+valoresPresenca(aluno, 0, 4)+'</div>'+
                '<div class="col setPresenca" id="'+aluno+'-col-0-ind-5">'+valoresPresenca(aluno, 0, 5)+'</div>'
                +'</div></div>';

                var terceiraColuna =
                '<div class="col-lg-3 celulaGrid"><div class="row">'+
                '<div class="col setPresenca" id="'+aluno+'-col-1-ind-0">'+valoresPresenca(aluno, 1, 0)+'</div>'+
                '<div class="col setPresenca" id="'+aluno+'-col-1-ind-1">'+valoresPresenca(aluno, 1, 1)+'</div>'+
                '<div class="col setPresenca" id="'+aluno+'-col-1-ind-2">'+valoresPresenca(aluno, 1, 2)+'</div>'+
                '<div class="col setPresenca" id="'+aluno+'-col-1-ind-3">'+valoresPresenca(aluno, 1, 3)+'</div>'+
                '<div class="col setPresenca" id="'+aluno+'-col-1-ind-4">'+valoresPresenca(aluno, 1, 4)+'</div>'+
                '<div class="col setPresenca" id="'+aluno+'-col-1-ind-5">'+valoresPresenca(aluno, 1, 5)+'</div>'
                +'</div></div>';

                var quartaColuna =
                '<div class="col-lg-3 celulaGrid"><div class="row">'+
                '<div class="col setPresenca" id="'+aluno+'-col-2-ind-0">'+valoresPresenca(aluno, 2, 0)+'</div>'+
                '<div class="col setPresenca" id="'+aluno+'-col-2-ind-1">'+valoresPresenca(aluno, 2, 1)+'</div>'+
                '<div class="col setPresenca" id="'+aluno+'-col-2-ind-2">'+valoresPresenca(aluno, 2, 2)+'</div>'+
                '<div class="col setPresenca" id="'+aluno+'-col-2-ind-3">'+valoresPresenca(aluno, 2, 3)+'</div>'+
                '<div class="col setPresenca" id="'+aluno+'-col-2-ind-4">'+valoresPresenca(aluno, 2, 4)+'</div>'+
                '<div class="col setPresenca" id="'+aluno+'-col-2-ind-5">'+valoresPresenca(aluno, 2, 5)+'</div>'
                +'</div></div>';

                }
                else {
                    var segundaColuna =
                    '<div class="col-lg-3 celulaGrid"><div class="row">'+
                    '<div class="col setPresenca" id="'+aluno+'-col-3-ind-0">'+valoresPresenca(aluno, 3, 0)+'</div>'+
                    '<div class="col setPresenca" id="'+aluno+'-col-3-ind-1">'+valoresPresenca(aluno, 3, 1)+'</div>'+
                    '<div class="col setPresenca" id="'+aluno+'-col-3-ind-2">'+valoresPresenca(aluno, 3, 2)+'</div>'+
                    '<div class="col setPresenca" id="'+aluno+'-col-3-ind-3">'+valoresPresenca(aluno, 3, 3)+'</div>'+
                    '<div class="col setPresenca" id="'+aluno+'-col-3-ind-4">'+valoresPresenca(aluno, 3, 4)+'</div>'+
                    '<div class="col setPresenca" id="'+aluno+'-col-3-ind-5">'+valoresPresenca(aluno, 3, 5)+'</div>'
                    +'</div></div>';

                    var terceiraColuna =
                    '<div class="col-lg-3 celulaGrid"><div class="row">'+
                    '<div class="col setPresenca" id="'+aluno+'-col-4-ind-0">'+valoresPresenca(aluno, 4, 0)+'</div>'+
                    '<div class="col setPresenca" id="'+aluno+'-col-4-ind-1">'+valoresPresenca(aluno, 4, 1)+'</div>'+
                    '<div class="col setPresenca" id="'+aluno+'-col-4-ind-2">'+valoresPresenca(aluno, 4, 2)+'</div>'+
                    '<div class="col setPresenca" id="'+aluno+'-col-4-ind-3">'+valoresPresenca(aluno, 4, 3)+'</div>'+
                    '<div class="col setPresenca" id="'+aluno+'-col-4-ind-4">'+valoresPresenca(aluno, 4, 4)+'</div>'+
                    '<div class="col setPresenca" id="'+aluno+'-col-4-ind-5">'+valoresPresenca(aluno, 4, 5)+'</div>'
                    +'</div></div>';

                    var quartaColuna =
                    '<div class="col-lg-3 celulaGrid"><div class="row">'+
                    '<div class="col setPresenca" id="'+aluno+'-col-5-ind-0">'+valoresPresenca(aluno, 5, 0)+'</div>'+
                    '<div class="col setPresenca" id="'+aluno+'-col-5-ind-1">'+valoresPresenca(aluno, 5, 1)+'</div>'+
                    '<div class="col setPresenca" id="'+aluno+'-col-5-ind-2">'+valoresPresenca(aluno, 5, 2)+'</div>'+
                    '<div class="col setPresenca" id="'+aluno+'-col-5-ind-3">'+valoresPresenca(aluno, 5, 3)+'</div>'+
                    '<div class="col setPresenca" id="'+aluno+'-col-5-ind-4">'+valoresPresenca(aluno, 5, 4)+'</div>'+
                    '<div class="col setPresenca" id="'+aluno+'-col-5-ind-5">'+valoresPresenca(aluno, 5, 5)+'</div>'
                    +'</div></div>';
                }

                divConteudo.append('<div class="row">'+primeiraColuna+
                segundaColuna+
                terceiraColuna+
                quartaColuna+'</div>');
            };        
        ClickPrenca();       
    }

    function valoresPresenca(aluno, coluna, indice){

        var disciplinaAtual = $("#selectedDisciplina").text();

        var presenca = disciplinas[disciplinaAtual][coluna][aluno][indice];

        if ( presenca == 0 ) {
            presenca = "";
        }
        else if ( presenca == 1 ) {
            presenca = "P";
        }
        else {
            presenca = "F";
        }    
        return presenca;
    }

    function ClickPrenca(){
    $(".setPresenca").on('click', function(event){
        var disciplinaAtual = $("#selectedDisciplina").text();
        
        var dados = event.target.id.split("-");

        var texto = "";

        if ( disciplinas[disciplinaAtual][dados[2]][dados[0]][dados[4]] == 0 ) {
            disciplinas[disciplinaAtual][dados[2]][dados[0]][dados[4]] = 1;
            texto = "P";
        }
        else if ( disciplinas[disciplinaAtual][dados[2]][dados[0]][dados[4]] == 1 ) {
            disciplinas[disciplinaAtual][dados[2]][dados[0]][dados[4]] = 2;
            texto = "F";
        }
        else {
            disciplinas[disciplinaAtual][dados[2]][dados[0]][dados[4]] = 0;
            texto = "";
        }
        console.log(disciplinas);
        $("#"+event.target.id).text(texto);    
    });
    }
    
    </script>
  
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>