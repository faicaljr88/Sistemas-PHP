<?php

require_once 'Crud.php';

class Usuarios extends Crud{

	protected $table = 'usuarios';
	private $nome;
	private $email;
	private $idade;

	public function setNome($nome){
		$this->nome = $nome;
	}

	public function setEmail($email){
		$this->email = $email;
	}

	public function setIdade($idade){
		$this->idade = $idade;
	}

	public function insert(){
		$sql = "INSERT INTO $this->table (nome, email, idade) VALUES (:nome, :email, :idade)";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(":nome", $this->nome);
		$stmt->bindParam(":email", $this->email);
		$stmt->bindParam(":idade", $this->idade);
		return $stmt->execute();
	}

	public function update($id){
		$sql = "UPDATE $this->table SET nome = :nome, email = :email, idade = :idade WHERE id = :id";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(":id", $id);
		$stmt->bindParam(":nome", $this->nome);
		$stmt->bindParam(":email", $this->email);
		$stmt->bindParam(":idade", $this->idade);
		return $stmt->execute();
	}
}