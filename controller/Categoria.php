<?php
require "../model/CategoriaModel.php";

$categoria = new CategoriaModel();
$categoria->inserir("Produtos de Limpeza");
$categoria->excluir(1);
$categoria->atualizar(2, "SmartPhone");
var_dump($categoria->buscaPorId(3));
var_dump($categoria->buscarTudo());

?>