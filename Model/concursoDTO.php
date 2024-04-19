<?php
   class ConcursoDTO{
    private $idConcurso; 
    private $tituloConcurso; 
    private $dtAbertura; 
    private $dtEncerramento; 
    private $areaConcurso; 
   
    
        // method set
        public function setidConcurso($idConcurso){
          $this->idConcurso = $idConcurso  ; 
          }

        public function settituloConcurso($tituloConcurso){
            $this->tituloConcurso = $tituloConcurso  ;
           }

           public function setdtAbertura($dtAbertura){
            $this->dtAbertura = $dtAbertura ;
           } 

           public function setdtEncerramento($dtEncerramento){
            $this->dtEncerramento = $dtEncerramento;
           } 

           public function setnivel($nivel){
            $this->nivel = $nivel;
        }
        public function setareaConcurso($areaConcurso){
            $this->areaConcurso = $areaConcurso;
        }
          
        

    
        //method get

        public function getidConcurso(){
            return $this->idConcurso;
        }
        public function gettituloConcurso(){
            return $this->tituloConcurso;
        }
    
        public function getdtAbertura(){
            return $this->dtAbertura;
        } 
    
        public function getdtEncerramento(){
            return $this->dtEncerramento;
        } 
    
        public function getnivel(){
            return $this->nivel;
        }
        public function getareaConcurso(){
            return $this->areaConcurso;
        }
              
       
    

    }
    
?>