<?php

require_once 'vendor/autoload.php';

// referenciando o namespace do dompdf

use Dompdf\Dompdf;

// instanciando o dompdf

$dompdf = new Dompdf();

//lendo o arquivo HTML correspondente

// $html = file_get_contents('exemplo.html');

//inserindo o HTML que queremos converter

$dompdf->loadHtml('

<html>
    <head>
        <link href="style.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <div id="watermark">
            <img src="img/cover_hdpi2.jpeg" height="100%" width="100%" />
        </div>

        <main> 
            <!-- The content of your PDF here -->
            <p class="block_2">&nbsp;</p>
            <p class="block_2">&nbsp;</p>
            <div class="calibre" id="calibre_link-0">
                    <p class="block_"></p>
                    <p class="block_1">Certificado / 9800 </p>
                    <p class="block_2">&nbsp;</p>
                    <p class="block_2">&nbsp;</p>
                    <p class="block_3">Muñoz Consultoria</p>
                    <p class="block_2">&nbsp;</p>
                    <p class="block_4">Edilson Alzemand Sigmaringa junior</p>
                    <p class="block_5" lang="pt-br">CPF: 149.232.717-44 </p>
                    <p class="block_2">&nbsp;</p>
                    <p class="block_5" lang="en">In recognition of successful completion of the following course of instruction</p>
                    <p class="block_2">&nbsp;</p>
                    <p class="block_4">NR33 Treinamento de Trabalhadores Autorizados e Vigias em Espaços Confinados - 08h</p>
                    <p class="block_6"><span lang="en" class="text_">NR33</span><span lang="en" class="text_1"> </span><span lang="en" class="text_">Training Authorized Worker and Attendant Training Confined Spaces 08h</span></p>
                    <p class="block_2">&nbsp;</p>
                    <p class="block_"></p>
                    <p class="block_2">&nbsp;</p>

                    <!-- Conteudo do Certificado -->

                    <p class="block_7"><span class="text_2"><b>CONTEÚDO:</b> Normatização e Legislação; termos e definições; Gestão de Segurança 
                        e Saúde em Espaços Confinados; Metodologia de trabalho em espaços confinados; Identificação dos tipos de riscos; 
                        Avaliação de riscos; Medidas de engenharia para  controle de riscos; Noções de primeiros socorros; Noções de resgate em espaços 
                        confinados; Pratica de entrada em espaços confinados de leiaute variado, com acesso verticais e horizontais para execução 
                        simulada de atividades comumente encontradas na indústria; Equipamentos para trabalhos em espaços confinados; </p>
                            
                    <p class="block_7"><span class="text_2"><b>CONTENT:</b> Standards and legislation; vocabulary and definitions; Confined Space Safety 
                        and Health Administration; Confined Space work methodology; Risks recongnition Risks control engineering measures; Confined Space equipment; 
                        first Aid awareness; Systems Practical entry in confined Spaces of layout with  horizontal and vertical access to perform simulated activities
                        commonly found  in the industry.</span></p>                    
                    
                    <p class="block_7"><span class="text_2"><b>TIPOS DE ESPAÇOS CONFINADOS:</b>  Espaços Confinados de unidades offshore, tais como 
                        vasos de pressão, compressores, vasos queimadores, flotadores, filtros, separadores, caldeiras e tanques. 
                        Tipos de serviços executados: Entrada em espaço confinado para atividades de inspeção, limpeza, manutenção, reparo.</span></p>
                    <p class="block_7"><span class="text_2"><b>TYPES OF CONFINED SPACE:</b> Confined space offshore units, Such as pressure vessels,
                        compressors, burners vessels floatation tanks, filters,separator ,boilers, and tanks.Types of Work: Offshore units, 
                        confined space entry for inspection,cleaning,maintenance and repair activities.</span></p>


                    <p class="block_8">&nbsp;</p>
                    <p class="block_99"><span class="teoria">Teoria/Theory: 04 h</span> <span class="pratica">Prática/Practical: 04 h </span><span class="carga">Carga Horária/Course Duration:08h</span></p>
                    <p class="block_99"><span class="text_2">Referência Técnica /Technical Reference: NR-33; NBR 14787 e OSHA 29 CRF 1910.146</span></p>
                    <p class="block_9">&nbsp;</p>
                    <p class="block_12">
                    <span class="esquerda">Período / Period: 27.12.2017</span>
                    <span class="direita">Emitido / Emitted: 27.12.2017</span>
                    </p>
                    <p class="block_9">&nbsp;</p>
                    <p class="block_9">&nbsp;</p>

                    <p class="block_13">Valido até / Expire date: 27.12.2018 NR-33 (33.3.5.3)</p>
                    <p class="block_14">&nbsp;</p>
                    <p class="block_9">&nbsp;</p>
                    <p class="block_9">&nbsp;</p>
                    <p class="block_15"><img src="" class="calibre3" /></p>
                    <p class="block_16"></p>
                    <p class="block_2">&nbsp;</p>
                    
                    <p class="block_">Ana Beatriz R. Willemen Lamperein</p>
                    <p class="block_">(Diretora Administrativa / Director Administrative)</p>
                    <p class="block_2">&nbsp;</p>
                    <p class="block_9">&nbsp;</p>
                    <p class="block_"></p>
                    <p class="block_2">&nbsp;</p>
                    <p class="block_17"></p>
                    <p class="block_2">&nbsp;</p>
                    <p class="block_2">&nbsp;</p>
                    <p class="block_">Julio Antonio Muñoz Lamperein </p>
                    <p class="block_">MTE-Reg. Nº RJ 005070.9</p>
                    <p class="block_">CREA-RJ 2017110987</p>
                    <p class="block_">(Instrutor / Instructor)</p>
                    <p class="block_">(Responsável Técnico / Technical Responsible)</p>
                    <p class="block_2">&nbsp;</p>
                    <p class="block_18"><span class="text_5">Muñoz Consultoria CNPJ:11.542.521/0001-97</span></p>
                    <p class="block_19">R. Pedro Leon da Silva Carvalho, 32 &ndash; Parque Aeroporto- Macaé/RJ </p>
                    <p class="block_20"><b class="calibre2">Telefone: 55 22 3087-0384 Website</b><b class="calibre2">:</b><b class="calibre2"> www.munozconsultoria.com.br</b></p>
                
                </div>




        </main>
        <main> 
        <!-- The content of your PDF here -->
        <p class="block_2">&nbsp;</p>
        <p class="block_2">&nbsp;</p>
        <div class="calibre" id="calibre_link-0">
                <p class="block_"></p>
                <p class="block_1">Certificado / 9800 </p>
                <p class="block_2">&nbsp;</p>
                <p class="block_2">&nbsp;</p>
                <p class="block_3">Muñoz Consultoria</p>
                <p class="block_2">&nbsp;</p>
                <p class="block_4">Edilson Alzemand Sigmaringa junior</p>
                <p class="block_5" lang="pt-br">CPF: 149.232.717-44 </p>
                <p class="block_2">&nbsp;</p>
                <p class="block_5" lang="en">In recognition of successful completion of the following course of instruction</p>
                <p class="block_2">&nbsp;</p>
                <p class="block_4">NR33 Treinamento de Trabalhadores Autorizados e Vigias em Espaços Confinados - 08h</p>
                <p class="block_6"><span lang="en" class="text_">NR33</span><span lang="en" class="text_1"> </span><span lang="en" class="text_">Training Authorized Worker and Attendant Training Confined Spaces 08h</span></p>
                <p class="block_2">&nbsp;</p>
                <p class="block_"></p>
                <p class="block_2">&nbsp;</p>

                <!-- Conteudo do Certificado -->

                <p class="block_7"><span class="text_2"><b>CONTEÚDO:</b> Normatização e Legislação; termos e definições; Gestão de Segurança 
                    e Saúde em Espaços Confinados; Metodologia de trabalho em espaços confinados; Identificação dos tipos de riscos; 
                    Avaliação de riscos; Medidas de engenharia para  controle de riscos; Noções de primeiros socorros; Noções de resgate em espaços 
                    confinados; Pratica de entrada em espaços confinados de leiaute variado, com acesso verticais e horizontais para execução 
                    simulada de atividades comumente encontradas na indústria; Equipamentos para trabalhos em espaços confinados; </p>
                        
                <p class="block_7"><span class="text_2"><b>CONTENT:</b> Standards and legislation; vocabulary and definitions; Confined Space Safety 
                    and Health Administration; Confined Space work methodology; Risks recongnition Risks control engineering measures; Confined Space equipment; 
                    first Aid awareness; Systems Practical entry in confined Spaces of layout with  horizontal and vertical access to perform simulated activities
                    commonly found  in the industry.</span></p>                    
                
                <p class="block_7"><span class="text_2"><b>TIPOS DE ESPAÇOS CONFINADOS:</b>  Espaços Confinados de unidades offshore, tais como 
                    vasos de pressão, compressores, vasos queimadores, flotadores, filtros, separadores, caldeiras e tanques. 
                    Tipos de serviços executados: Entrada em espaço confinado para atividades de inspeção, limpeza, manutenção, reparo.</span></p>
                <p class="block_7"><span class="text_2"><b>TYPES OF CONFINED SPACE:</b> Confined space offshore units, Such as pressure vessels,
                    compressors, burners vessels floatation tanks, filters,separator ,boilers, and tanks.Types of Work: Offshore units, 
                    confined space entry for inspection,cleaning,maintenance and repair activities.</span></p>


                <p class="block_8">&nbsp;</p>
                <p class="block_99"><span class="teoria">Teoria/Theory: 04 h</span> <span class="pratica">Prática/Practical: 04 h </span><span class="carga">Carga Horária/Course Duration:08h</span></p>
                <p class="block_99"><span class="text_2">Referência Técnica /Technical Reference: NR-33; NBR 14787 e OSHA 29 CRF 1910.146</span></p>
                <p class="block_9">&nbsp;</p>
                <p class="block_12">
                <span class="esquerda">Período / Period: 27.12.2017</span>
                <span class="direita">Emitido / Emitted: 27.12.2017</span>
                </p>
                <p class="block_9">&nbsp;</p>
                <p class="block_9">&nbsp;</p>

                <p class="block_13">Valido até / Expire date: 27.12.2018 NR-33 (33.3.5.3)</p>
                <p class="block_14">&nbsp;</p>
                <p class="block_9">&nbsp;</p>
                <p class="block_9">&nbsp;</p>
                <p class="block_15"><img src="" class="calibre3" /></p>
                <p class="block_16"></p>
                <p class="block_2">&nbsp;</p>
                
                <p class="block_">Ana Beatriz R. Willemen Lamperein</p>
                <p class="block_">(Diretora Administrativa / Director Administrative)</p>
                <p class="block_2">&nbsp;</p>
                <p class="block_9">&nbsp;</p>
                <p class="block_"></p>
                <p class="block_2">&nbsp;</p>
                <p class="block_17"></p>
                <p class="block_2">&nbsp;</p>
                <p class="block_2">&nbsp;</p>
                <p class="block_">Julio Antonio Muñoz Lamperein </p>
                <p class="block_">MTE-Reg. Nº RJ 005070.9</p>
                <p class="block_">CREA-RJ 2017110987</p>
                <p class="block_">(Instrutor / Instructor)</p>
                <p class="block_">(Responsável Técnico / Technical Responsible)</p>
                <p class="block_2">&nbsp;</p>
                <p class="block_18"><span class="text_5">Muñoz Consultoria CNPJ:11.542.521/0001-97</span></p>
                <p class="block_19">R. Pedro Leon da Silva Carvalho, 32 &ndash; Parque Aeroporto- Macaé/RJ </p>
                <p class="block_20"><b class="calibre2">Telefone: 55 22 3087-0384 Website</b><b class="calibre2">:</b><b class="calibre2"> www.munozconsultoria.com.br</b></p>
            
            </div>




    </main>
    <main> 
    <!-- The content of your PDF here -->
    <p class="block_2">&nbsp;</p>
    <p class="block_2">&nbsp;</p>
    <div class="calibre" id="calibre_link-0">
            <p class="block_"></p>
            <p class="block_1">Certificado / 9800 </p>
            <p class="block_2">&nbsp;</p>
            <p class="block_2">&nbsp;</p>
            <p class="block_3">Muñoz Consultoria</p>
            <p class="block_2">&nbsp;</p>
            <p class="block_4">Edilson Alzemand Sigmaringa junior</p>
            <p class="block_5" lang="pt-br">CPF: 149.232.717-44 </p>
            <p class="block_2">&nbsp;</p>
            <p class="block_5" lang="en">In recognition of successful completion of the following course of instruction</p>
            <p class="block_2">&nbsp;</p>
            <p class="block_4">NR33 Treinamento de Trabalhadores Autorizados e Vigias em Espaços Confinados - 08h</p>
            <p class="block_6"><span lang="en" class="text_">NR33</span><span lang="en" class="text_1"> </span><span lang="en" class="text_">Training Authorized Worker and Attendant Training Confined Spaces 08h</span></p>
            <p class="block_2">&nbsp;</p>
            <p class="block_"></p>
            <p class="block_2">&nbsp;</p>

            <!-- Conteudo do Certificado -->

            <p class="block_7"><span class="text_2"><b>CONTEÚDO:</b> Normatização e Legislação; termos e definições; Gestão de Segurança 
                e Saúde em Espaços Confinados; Metodologia de trabalho em espaços confinados; Identificação dos tipos de riscos; 
                Avaliação de riscos; Medidas de engenharia para  controle de riscos; Noções de primeiros socorros; Noções de resgate em espaços 
                confinados; Pratica de entrada em espaços confinados de leiaute variado, com acesso verticais e horizontais para execução 
                simulada de atividades comumente encontradas na indústria; Equipamentos para trabalhos em espaços confinados; </p>
                    
            <p class="block_7"><span class="text_2"><b>CONTENT:</b> Standards and legislation; vocabulary and definitions; Confined Space Safety 
                and Health Administration; Confined Space work methodology; Risks recongnition Risks control engineering measures; Confined Space equipment; 
                first Aid awareness; Systems Practical entry in confined Spaces of layout with  horizontal and vertical access to perform simulated activities
                commonly found  in the industry.</span></p>                    
            
            <p class="block_7"><span class="text_2"><b>TIPOS DE ESPAÇOS CONFINADOS:</b>  Espaços Confinados de unidades offshore, tais como 
                vasos de pressão, compressores, vasos queimadores, flotadores, filtros, separadores, caldeiras e tanques. 
                Tipos de serviços executados: Entrada em espaço confinado para atividades de inspeção, limpeza, manutenção, reparo.</span></p>
            <p class="block_7"><span class="text_2"><b>TYPES OF CONFINED SPACE:</b> Confined space offshore units, Such as pressure vessels,
                compressors, burners vessels floatation tanks, filters,separator ,boilers, and tanks.Types of Work: Offshore units, 
                confined space entry for inspection,cleaning,maintenance and repair activities.</span></p>


            <p class="block_8">&nbsp;</p>
            <p class="block_99"><span class="teoria">Teoria/Theory: 04 h</span> <span class="pratica">Prática/Practical: 04 h </span><span class="carga">Carga Horária/Course Duration:08h</span></p>
            <p class="block_99"><span class="text_2">Referência Técnica /Technical Reference: NR-33; NBR 14787 e OSHA 29 CRF 1910.146</span></p>
            <p class="block_9">&nbsp;</p>
            <p class="block_12">
            <span class="esquerda">Período / Period: 27.12.2017</span>
            <span class="direita">Emitido / Emitted: 27.12.2017</span>
            </p>
            <p class="block_9">&nbsp;</p>
            <p class="block_9">&nbsp;</p>

            <p class="block_13">Valido até / Expire date: 27.12.2018 NR-33 (33.3.5.3)</p>
            <p class="block_14">&nbsp;</p>
            <p class="block_9">&nbsp;</p>
            <p class="block_9">&nbsp;</p>
            <p class="block_15"><img src="" class="calibre3" /></p>
            <p class="block_16"></p>
            <p class="block_2">&nbsp;</p>
            
            <p class="block_">Ana Beatriz R. Willemen Lamperein</p>
            <p class="block_">(Diretora Administrativa / Director Administrative)</p>
            <p class="block_2">&nbsp;</p>
            <p class="block_9">&nbsp;</p>
            <p class="block_"></p>
            <p class="block_2">&nbsp;</p>
            <p class="block_17"></p>
            <p class="block_2">&nbsp;</p>
            <p class="block_2">&nbsp;</p>
            <p class="block_">Julio Antonio Muñoz Lamperein </p>
            <p class="block_">MTE-Reg. Nº RJ 005070.9</p>
            <p class="block_">CREA-RJ 2017110987</p>
            <p class="block_">(Instrutor / Instructor)</p>
            <p class="block_">(Responsável Técnico / Technical Responsible)</p>
            <p class="block_2">&nbsp;</p>
            <p class="block_18"><span class="text_5">Muñoz Consultoria CNPJ:11.542.521/0001-97</span></p>
            <p class="block_19">R. Pedro Leon da Silva Carvalho, 32 &ndash; Parque Aeroporto- Macaé/RJ </p>
            <p class="block_20"><b class="calibre2">Telefone: 55 22 3087-0384 Website</b><b class="calibre2">:</b><b class="calibre2"> www.munozconsultoria.com.br</b></p>
        
        </div>
</main>

    </body>
</html>

');

// Definindo o papel e a orientação

$dompdf->setPaper('A4', 'portrait');


// Renderizando o HTML como PDF

$dompdf->render();

// Enviando o PDF para o browser

/* Exibe */
$dompdf->stream(
    "certificado.pdf", /* Nome do arquivo de saída */
    array(
        "Attachment" => false /* Para download, altere para true */
    )
);
?>

?>