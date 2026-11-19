<?php


include "config/conexao.php";


$id = $_GET["id"];


$sql = "DELETE FROM tb_produtos WHERE id =$id";


if ($conexao->query($sql)) {
    echo "✅ Produto excluído com sucesso!";
} else {
    echo "❌ Erro ao excluir o produto!";
}
echo "<br><a href='listar.php'>Voltar para a lista</a>";
echo "<button onclick=\"return confirm('Tem certeza que deseja excluir este produto?')\">Excluir</button>"
?>