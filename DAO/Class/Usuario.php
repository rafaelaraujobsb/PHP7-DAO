<?php

	class Usuario {
		private $id_usuario;
		private $des_login;
		private $des_senha;
		private $dt_cadastro;

		public function getId(){
			return $this->id_usuario;
		}

		public function setId($value){
			$this->id_usuario = $value;
		}

		public function getLogin(){
			return $this->des_login;
		}

		public function setLogin($value){
			$this->des_login = $value;
		}

		public function getSenha(){
			return $this->des_senha;
		}

		public function setSenha($value){
			$this->des_senha = $value;
		}

		public function getDtCad(){
			return $this->dt_cadastro;
		}

		public function setDtCad($value){
			$this->dt_cadastro = $value;
		}

		public function loadById($id){
			$sql = new Sql();

			$result = $sql->select("SELECT * FROM tb_usuarios WHERE id_usuario = :ID", array(":ID"=>$id));

			// verifica se houve retorno
			// poderia ser usado isset($result[0])
			if(count($result) > 0){
				$row = $result[0];

				$this->setId($row['id_usuario']);
				$this->setLogin($row['des_login']);
				$this->setSenha($row['des_senha']);
				$this->setDtCad(new DateTime($row['dt_cadastro'])); // configura a dara para o php
			}
		}

		// echo do objeto
		public function __toString(){
			return json_encode(array(
				"id_usuario"=>$this->getId(),
				"des_login"=>$this->getLogin(),
				"des_senha"=>$this->getSenha(),
				"dt_cadastro"=>$this->getDtCad()->format("d/m/Y H:i:s")
			));
		}
	}

?>