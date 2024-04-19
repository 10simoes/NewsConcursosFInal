<?php
    //conexão com BD
    require_once "conexao.php";
    require_once "concursoDTO.php";
    class ConcursoDAO {

        public $pdo = null;
        public function __construct() {
            $this->pdo = Conexao::getInstance();
        }
        // INSERT
        public function salvarConcurso(ConcursoDTO $concursoDTO) {
        try {
            $tituloConcurso = $concursoDTO->gettituloConcurso();
            $dtAbertura = $concursoDTO->getdtAbertura();
            $dtEncerramento = $concursoDTO->getdtEncerramento();
            $nivel = $concursoDTO->getnivel();
            $areaConcurso = $concursoDTO->getareaConcurso();
           
            $sql = "INSERT INTO `concurso`(`tituloConcurso`, `dtAbertura`, `dtEncerramento`, `nivel`, `areaConcurso`) 
            VALUES ('{$tituloConcurso}','{$dtAbertura}','{$dtEncerramento}','{$nivel}','{$areaConcurso}')";
            
            $stmt = $this->pdo->prepare($sql);
      
  
            $retorno = $stmt->execute();
            return $retorno;

         } catch (PDOException $exc) {
            echo $exc->getMessage();
         }
         print_r($retorno);
         exit;
      }
    
  public function alterarConcurso(ConcursoDTO $concursoDTO) {
   try {
       $sql = "UPDATE `concurso` SET `tituloConcurso`=?,
       `dtAbertura`=?,`dtEncerramento`=?,
       `nivel`=?
       `areaConcurso`=?,
        WHERE `idConcurso`= ?";
       $stmt = $this->pdo->prepare($sql);
       $idConcurso = $concursoDTO->getidConcurso();            
       $tituloConcurso = $concursoDTO->gettituloConcurso();
       $dtAbertura = $concursoDTO->getdtAbertura();
       $dtEncerramento = $concursoDTO->getdtEncerramento();
       $areaConcurso = $concursoDTO->getareaConcurso();

       $stmt->bindValue(1, $tituloConcurso);  
       $stmt->bindValue(2, $dtAbertura); 
       $stmt->bindValue(3, $dtEncerramento); 
       $stmt->bindValue(4, $nivel); 
       $stmt->bindValue(5, $areaConcurso);

       return $stmt->execute();

    } catch (PDOException $exc) {
       echo $exc->getMessage();
       
    }
 }
//fim médodo alterarUsuario

    //Método excluirUsuario
    public function excluirConcurso($idConcurso) {
      try {
          $sql = "DELETE FROM `concurso` 
          WHERE `idConcurso` = '{$idConcurso}';";
          
          $stmt = $this->pdo->prepare($sql);
          
          $retorno = $stmt->execute();     
          
          return $retorno;

       } catch (PDOException $exc) {
          echo $exc->getMessage();
       }
    }
  

//Fim excluirConcurso

   
  //FIM LISTARPERIL

  //Pesquisar concurso
  public function PesquisarConcurso() {
    try {
      $sql =" SELECT * FROM `concurso` ";
        $stmt = $this->pdo->prepare($sql);
        
        $stmt->execute();
		  $retorno = $stmt->fetchAll(PDO::FETCH_ASSOC); 
        
        return $retorno;
     } catch (PDOException $exc) {
        echo $exc->getMessage();  
     }
  }
  
}


?>