<?php 
require "../config/Conexao.php";

class CategoriaModel{

    function __construct(){
      $this->conexao = Conexao::getConnection();
    }
    
    function inserir($nome) {
        $sql = "INSERT INTO categoria (nome) VALUES (?)";
        $comando = $this->conexao->prepare($sql);
        $comando->bind_param("s", $nome);
        $comando->execute();
    }
    function excluir($id) {
        $sql = "DELETE FROM categoria WHERE idcategoria = ?";
        $comando = $this->conexao->prepare($sql);
        $comando->bind_param("i", $id);
        $comando->execute();
}
function atualizar($id, $nome) {
    $sql = "UPDATE categoria SET nome = ? WHERE idcategoria = ?";
    $comando = $this->conexao->prepare($sql);
    $comando->bind_param("si",$nome, $id);
    $comando->execute();
}
function buscaPorId($id) {
    $sql = "SELECT * FROM categoria WHERE idcategoria = ?";
    $comando = $this->conexao->prepare($sql);
    $comando->bind_param("i", $id);
    IF ($comando->execute()) {
        $resultados = $comando->get_result();
        return $resultados->fetch_assoc();
    }
    return null;
} 
function buscarTudo() {
    $sql = "SELECT * FROM categoria";
    $comando = $this->conexao->prepare($sql);

    IF ($comando->execute()) {
        $resultados = $comando->get_result();
        return $resultados->fetch_all(MYSQLI_ASSOC);
    }
}
}