<?php
    //conexão com BD
    require_once "conexao.php";
    require_once "usuarioDTO.php";
    class UsuarioDAO {

        public $pdo = null;
        public function __construct() {
            $this->pdo = Conexao::getInstance();
        }
        // INSERT
        public function salvarUsuario(UsuarioDTO $usuarioDTO) {
        try {
            $sql = "INSERT INTO `usuario`(`nomeUsuario`, `fotoUsuario`, `dtNascimento`, `cpf`, `logradouro`, `numero`, 
            `complemento`, `bairro`, `cidade`, `uf`, `cep`, `emailUsuario`, `senhaUsuario`, `situacaoUsuario`, `perfil_idPerfil`) 
            VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $stmt = $this->pdo->prepare($sql);
                        
            $nomeUsuario = $usuarioDTO->getNomeUsuario();
            $fotoUsuario = "";  //$_POST["fotoUsuario"];
            $dtNascimento = $usuarioDTO->getDtNascimento();
            $cpf = $usuarioDTO->getCpf();
            $logradouro = $usuarioDTO->getLogradouro();
            $numero = $usuarioDTO->getNumero();
            $complemento = $usuarioDTO->getComplemento();
            $bairro = $usuarioDTO->getBairro();
            $cidade = $usuarioDTO->getCidade();
            $uf = $usuarioDTO->getUf();
            $cep = $usuarioDTO->getCep();
            $emailUsuario = $usuarioDTO->getEmailUsuario();
            $senhaUsuario = $usuarioDTO->getSenhaUsuario();
            $situacaoUsuario = $usuarioDTO->getSituacaoUsuario();
            $perfil_idPerfil = $usuarioDTO->getPerfil_idPerfil();

            $stmt->bindValue(1, $nomeUsuario);  
            $stmt->bindValue(2, $fotoUsuario); 
            $stmt->bindValue(3, $dtNascimento); 
            $stmt->bindValue(4, $cpf); 
            $stmt->bindValue(5, $logradouro);
            $stmt->bindValue(6, $numero);
            $stmt->bindValue(7, $complemento);
            $stmt->bindValue(8, $bairro);
            $stmt->bindValue(9, $cidade);
            $stmt->bindValue(10, $uf);
            $stmt->bindValue(11, $cep);
            $stmt->bindValue(12, $emailUsuario);
            $stmt->bindValue(13, $senhaUsuario);
            $stmt->bindValue(14, $situacaoUsuario);
            $stmt->bindValue(15, $perfil_idPerfil);
  
            $retorno = $stmt->execute();
            return $retorno;

         } catch (PDOException $exc) {
            echo $exc->getMessage();
         }
      }
    //médodo alterarUsuario
    // UPDATE
  // 
  public function alterarUsuario(UsuarioDTO $usuarioDTO) {
   try {
       $sql = "UPDATE `usuario` SET `nomeUsuario`=?,
       `fotoUsuario`=?,`dtNascimento`=?,
       `cpf`=?,`logradouro`=?,`numero`=?,`complemento`=?,
       `bairro`=?,`cidade`=?,`uf`=?,
       `cep`=?,`emailUsuario`=?,
       `senhaUsuario`=?,`situacaoUsuario`=?,`perfil_idPerfil`=?
       WHERE `idUsuario`= ?";
       $stmt = $this->pdo->prepare($sql);
       $idUsuario = $usuarioDTO->getIdUsuario();            
       $nomeUsuario = $usuarioDTO->getNomeUsuario();
       $fotoUsuario = "";  //$_POST["fotoUsuario"];
       $dtNascimento = $usuarioDTO->getDtNascimento();
       $cpf = $usuarioDTO->getCpf();
       $logradouro = $usuarioDTO->getLogradouro();
       $numero = $usuarioDTO->getNumero();
       $complemento = $usuarioDTO->getComplemento();
       $bairro = $usuarioDTO->getBairro();
       $cidade = $usuarioDTO->getCidade();
       $uf = $usuarioDTO->getUf();
       $cep = $usuarioDTO->getCep();
       $emailUsuario = $usuarioDTO->getEmailUsuario();
       $senhaUsuario = $usuarioDTO->getSenhaUsuario();
       $situacaoUsuario = $usuarioDTO->getSituacaoUsuario();
       $perfil_idPerfil = $usuarioDTO->getPerfil_idPerfil();

       $stmt->bindValue(1, $nomeUsuario);  
       $stmt->bindValue(2, $fotoUsuario); 
       $stmt->bindValue(3, $dtNascimento); 
       $stmt->bindValue(4, $cpf); 
       $stmt->bindValue(5, $logradouro);
       $stmt->bindValue(6, $numero);
       $stmt->bindValue(7, $complemento);
       $stmt->bindValue(8, $bairro);
       $stmt->bindValue(9, $cidade);
       $stmt->bindValue(10, $uf);
       $stmt->bindValue(11, $cep);
       $stmt->bindValue(12, $emailUsuario);
       $stmt->bindValue(13, $senhaUsuario);
       $stmt->bindValue(14, $situacaoUsuario);
       $stmt->bindValue(15, $perfil_idPerfil);
       $stmt->bindValue(16, $idUsuario);

       return $stmt->execute();

    } catch (PDOException $exc) {
       echo $exc->getMessage();
       
    }
 }
//fim médodo alterarUsuario

    //Método excluirUsuario
    public function excluirUsuario($idUsuario) {
      try {
          $sql = "DELETE FROM `usuario` 
          WHERE `idUsuario` = '{$idUsuario}';";
          
          $stmt = $this->pdo->prepare($sql);
          
          $retorno = $stmt->execute();     
          
          return $retorno;

       } catch (PDOException $exc) {
          echo $exc->getMessage();
       }
    }
  

//Fim excluirUsuario

   // método validarLogin
    public function validarLogin($emailUsuario, $senhaUsuario) {
    try {
        $sql = "SELECT `idUsuario`, `nomeUsuario`, `fotoUsuario`, 
        `emailUsuario`, `senhaUsuario`, `situacaoUsuario`, `perfil_idPerfil` 
        FROM `usuario` 
        WHERE `emailUsuario` = '{$emailUsuario}' AND 
        `senhaUsuario` = '{$senhaUsuario}';";
        
        $stmt = $this->pdo->prepare($sql);
        
        $stmt->execute();
		$retorno = $stmt->fetch(PDO::FETCH_ASSOC); 
        return $retorno;
     } catch (PDOException $exc) {
        echo $exc->getMessage();     
     }
  }
  //LISTAR PERFIL
  public function listarPerfil() {
   try {
       $sql = "SELECT * FROM perfil";
       $stmt = $this->pdo->prepare($sql);
       
       $stmt->execute();
      
       $retorno = $stmt->fetchAll(PDO::FETCH_ASSOC); 
     
       return $retorno;
    } catch (PDOException $exc) {
       echo $exc->getMessage();  
    }
 }
  //FIM LISTARPERIL

  //PesquisarUsuario
  public function PesquisarUsuario() {
    try {
        $sql = "SELECT u.`idUsuario`, u.`nomeUsuario`, 
        u.`fotoUsuario`, u.`emailUsuario`,u.`situacaoUsuario`,
        u.`perfil_idPerfil`, p.nomePerfil 
        FROM `usuario` u
        INNER JOIN perfil p ON u.`perfil_idPerfil` = p.idPerfil";
        $stmt = $this->pdo->prepare($sql);
        
        $stmt->execute();
		  $retorno = $stmt->fetchAll(PDO::FETCH_ASSOC); 
        
        return $retorno;
     } catch (PDOException $exc) {
        echo $exc->getMessage();  
     }
  }
  //Fim pesquisarUsuario
  
 //PesquisarUsuarioPorId
 public function PesquisarUsuarioPorId($idUsuario) {
    try {
        $sql = "SELECT u.*, p.nomePerfil 
        FROM `usuario` u
        INNER JOIN perfil p ON u.`perfil_idPerfil` = p.idPerfil
        WHERE u.idUsuario = '{$idUsuario}'";
        $stmt = $this->pdo->prepare($sql);
        
        $stmt->execute();
		  $retorno = $stmt->fetch(PDO::FETCH_ASSOC); 
        return $retorno;
     } catch (PDOException $exc) {
        echo $exc->getMessage();  
     }
  }
  //Fim pesquisarUsuarioPorId

}


?>