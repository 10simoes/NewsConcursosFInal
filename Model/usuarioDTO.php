<?php
   class UsuarioDTO{
    private $idUsuario; 
    private $nomeUsuario; 
    private $fotoUsuario; 
    private $dtNascimento; 
    private $cpf; 
    private $logradouro; 
    private $numero; 
    private $complemento; 
    private $bairro; 
    private $cidade; 
    private $uf; 
    private $cep; 
    private $emailUsuario; 
    private $senhaUsuario; 
    private $situacaoUsuario; 
    private $perfil_idPerfil;
    
        // method set
        public function setIdUsuario($idUsuario){
          $this->idUsuario = $idUsuario  ; 
          }

        public function setNomeUsuario($nomeUsuario){
            $this->nomeUsuario = $nomeUsuario  ;
           }

           public function setFotoUsuario($fotoUsuario){
            $this->fotoUsuario = $fotoUsuario ;
           } 

           public function setDtNascimento($dtNascimento){
            $this->dtNascimento = $dtNascimento;
           } 

           public function setCpf($cpf){
            $this->cpf = $cpf;
        }
          
        public function setLogradouro($logradouro){
            $this->logradouro = $logradouro;
        }
        public function setNumero($numero){
            $this->numero = $numero;
        }
        public function setComplemento($complemento){
            $this->complemento = $complemento;
        }

        public function setBairro($bairro){
            $this->bairro = $bairro;
        }

        public function setCidade($cidade){
            $this->cidade = $cidade;
        }

        public function setUf($uf){
            $this->uf = $uf;
        }

        public function setCep($cep){
            $this->cep= $cep;
        }


        public function setEmailUsuario($emailUsuario){
            $this->emailUsuario= $emailUsuario;
        }

        public function setSenhaUsuario($senhaUsuario){
            $this->senhaUsuario= $senhaUsuario;
        }
        public function setSituacaoUsuario($situacaoUsuario){
            $this->situacaoUsuario= $situacaoUsuario;
        }

        public function setPerfil_idPerfil($perfil_idPerfil){
            $this->perfil_idPerfil= $perfil_idPerfil;
        }

        //method get

        public function getIdUsuario(){
            return $this->idUsuario; 
        }
        public function getNomeUsuario(){
            return $this->nomeUsuario;
        }
    
        public function getFotoUsuario(){
            return $this->fotoUsuario;
        } 
    
        public function getDtNascimento(){
            return $this->dtNascimento;
        } 
    
        public function getCpf(){
            return $this->cpf;
        }
              
        public function getLogradouro(){
            return $this->logradouro;
        }
        public function getNumero(){
            return $this->numero;
        }
        public function getComplemento(){
            return $this->complemento;
        }
    
        public function getBairro(){
            return $this->bairro;
        }
    
        public function getCidade(){
            return $this->cidade;
        }
    
        public function getUf(){
            return $this->uf;
        }
    
        public function getCep(){
            return $this->cep;
        }
    
        public function getEmailUsuario(){
            return $this->emailUsuario;
        }
    
        public function getSenhaUsuario(){
            return $this->senhaUsuario;
        }
        public function getSituacaoUsuario(){
            return $this->situacaoUsuario;
        }
    
        public function getPerfil_idPerfil(){
            return $this->perfil_idPerfil;
        }
    }
    
?>