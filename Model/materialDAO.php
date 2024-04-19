<?php
    
    require_once "conexao.php";
    require_once "materialDTO.php";
    class MaterialDAO {

        public $pdo = null;
        public function __construct() {
            $this->pdo = Conexao::getInstance();
        }
        // INSERT
        public function salvarMaterial(materialDTO $materialDTO) {
        try {
        
         $dtCadastroMaterial = $materialDTO->getdtCadastroMaterial();
         $nomeMaterial = $materialDTO->getnomeMaterial();
         $titulo = $materialDTO->gettitulo();
         $tipoMaterial = $materialDTO->gettipoMaterial();
         $concurso_idConcurso = $materialDTO->getconcurso_idConcurso();
         
         $sql = "INSERT INTO `material`( `dtCadastroMaterial`, `nomeMaterial`, `titulo`, `tipoMaterial`, `concurso_idConcurso`) 
            VALUES ('{$dtCadastroMaterial}','{$nomeMaterial}','{$titulo}','{$tipoMaterial}','{$concurso_idConcurso}')";
            
            $stmt = $this->pdo->prepare($sql);
                     
             
            
  
            $retorno = $stmt->execute();
            return $retorno;
            

         } catch (PDOException $exc) {
            echo $exc->getMessage();
         }
          print_r($retorno);
         exit;
      }
    
  public function alterarMaterial(materialDTO $materialDTO) {
    try {
        $sql = "UPDATE `material` SET `dtCadastroMaterial`=?,
        `nomeMaterial`=?,`titulo`=?,
        `tipoMaterial`=?, `concurso_idConcurso`=?,
        
      
        WHERE `idMaterial`= ?";
        $stmt = $this->pdo->prepare($sql);
 
        $idMaterial = $materialDTO->getidMaterial();            
        $dtCadastroMaterial = $materialDTO->getdtCadastroMaterial();
        $nomeMaterial = $materialDTO->getnomeMaterial();
        $titulo = $materialDTO->gettitulo();
        $tipoMaterial = $materialDTO->gettipoMaterial();
        $concurso_idConcurso = $materialDTO->getconcurso_idConcurso();
        
      
       
 
        $stmt->bindValue(1, $dtCadastroMaterial);  
        $stmt->bindValue(2, $nomeMaterial); 
        $stmt->bindValue(3, $titulo); 
        $stmt->bindValue(4, $tipoMaterial); 
        $stmt->bindValue(5, $idMaterial);
        $stmt->bindValue(6, $concurso_idConcurso);
 
        return $stmt->execute();
 
     } catch (PDOException $exc) {
        echo $exc->getMessage();
 }
}
//fim médodo alterarMaterial

    //Método excluirMaterial
   

    public function excluirMaterial($idMaterial) {
      try {
          $sql = "DELETE FROM `material` 
          WHERE `idMaterial` = '{$idMaterial}'";
          
          $stmt = $this->pdo->prepare($sql);
          
          $retorno = $stmt->execute();     
          
          return $retorno;

       } catch (PDOException $exc) {
          echo $exc->getMessage();
       }
    }
  


  public function PesquisarMaterial() {
    try {
        $sql =" SELECT `idMaterial`, `dtCadastroMaterial`, `nomeMaterial`, `titulo`, `tipoMaterial`,`concurso_idConcurso`
        FROM `material` ";


      
        $stmt = $this->pdo->prepare($sql);
        
        $stmt->execute();
		  $retorno = $stmt->fetchAll(PDO::FETCH_ASSOC); 
        
        return $retorno;
     } catch (PDOException $exc) {
        echo $exc->getMessage();  
     }
  }
  //Fim pesquisarUsuario
  
// //  PesquisarUsuarioPorId
//  public function PesquisarMaterialporid($idPacote) {
//     try {
//         $sql = " SELECT `idPacote`";

//       //   "SELECT u.*, p.nomePerfil 
//       //   FROM `usuario` u
//       //   INNER JOIN perfil p ON u.`perfil_idPerfil` = p.idPerfil
//       //   WHERE u.idUsuario = '{$idUsuario}'";
//         $stmt = $this->pdo->prepare($sql);
        
//         $stmt->execute();
// 		  $retorno = $stmt->fetch(PDO::FETCH_ASSOC); 
//         return $retorno;
//      } catch (PDOException $exc) {
//         echo $exc->getMessage();  
//      }
//   }
//   //Fim pesquisarUsuarioPorId

}


?>