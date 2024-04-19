<?php
//Função para montar um Select das Unidades da Federação-UF 
//Recebe os parâmetros: nomeCampo (para o name no select)
//                      ufSelecao (caso enviado, seleciona a UF enviada)

function MontarSelectUF($nomeCampo, $ufSelecao){
    
    $ufs = Array(" "=>"Selecione", "AC"=>"Acre", 
    "AL"=>"Alagoas", "AP"=>"Amapá", 
    "AM"=>"Amazonas","BA"=>"Bahia", 
    "CE"=>"Ceará", "DF"=>"Distrito Federal", 
    "ES"=>"Espirito Santo","GO"=>"Goiás", 
    "MA"=>"Maranhão", "MS"=>"Mato Grosso do Sul", 
    "MT"=>"Mato Grosso","MG"=>"Minas Gerais", 
    "PA"=>"Pará", "PB"=>"Paraíba", 
    "PR"=>"Paraná","PE"=>"Pernambuco", 
    "PI"=>"Piauí", "RJ"=>"Rio de Janeiro", 
    "RN"=>"Rio Grande do Norte","RS"=>"Rio Grande do Sul", 
    "RO"=>"Rondônia", "RR"=>"Roraima", 
    "SC"=>"Santa Catarina","SP"=>"São Paulo", 
    "SE"=>"Sergipe", "TO"=>"Tocantins"); 
    
    echo '<select id="'.$nomeCampo.'" name="'.$nomeCampo.'">';
    foreach ($ufs as $uf => $nome) {
        $complemento = " ";
        if($uf == $ufSelecao){
            $complemento = " selected=selected ";
        }
        echo '<option value="'.$uf.'" '.$complemento.'>'.$nome.'</option>';               
    }        
    echo '</select>';
}

?>