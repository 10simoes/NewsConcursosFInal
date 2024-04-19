<?php
   class MaterialDTO{
    private $idMaterial; 
    private $dtCadastroMaterial; 
    private $nomeMaterial;
    private $titulo; 
    private $tipoMaterial;
    private $concurso_idConcurso;

    
    
        public function setidMaterial($idMaterial){
          $this->idMaterial = $idMaterial  ; 
          }

        public function setdtCadastroMaterial($dtCadastroMaterial){
            $this->dtCadastroMaterial = $dtCadastroMaterial;
           }

           public function setnomeMaterial($nomeMaterial){
            $this->nomeMaterial = $nomeMaterial;
           } 
           public function settitulo($titulo){
            $this->titulo = $titulo;
           } 

           public function settipoMaterial($tipoMaterial){
            $this->tipoMaterial = $tipoMaterial;
           } 

           public function setconcurso_idConcurso($concurso_idConcurso){
            $this->concurso_idConcurso = $concurso_idConcurso;
           } 
       


        

        public function getidMaterial(){
            return $this->idMaterial; 
        }
        public function getdtCadastroMaterial(){
            return $this->dtCadastroMaterial;
        }
    
        public function getnomeMaterial(){
            return $this->nomeMaterial;
        } 
    
        public function gettitulo(){
            return $this->titulo;
        } 
    
        public function gettipoMaterial(){
            return $this->tipoMaterial;
        }

        public function getconcurso_idConcurso(){
            return $this->concurso_idConcurso;
        }
        
    
        
    }
    
?>