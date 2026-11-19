<?php
include "config/conexao.php";
$sql = "SELECT * FROM tb_produtos";
$resultado = $conexao->query($sql);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Produtos | Estoque Fácil</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Estoque Fácil</h1>
        <p class="subtitulo">Produtos cadastrados na loja</p>
        <div class="formulario">
            <h2>Lista de Produtos</h2>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Imagem</th>
                    <th>Produto</th>
                    <th>Categoria</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                    <th>Ação</th>
                </tr>
                <?php while ($produto = $resultado->fetch(PDO::FETCH_ASSOC)) { ?>
                    <tr>
                        <td><?php echo $produto["id"]; ?></td>
                        <td>
                            <?php if ($produto["imagem"]):  ?>
                                <img width="90px" src="uploads/<?php echo $produto["imagem"]; ?>" >
                            <?php else: ?>
                                <span>Sem imagem</span>
                            <?php endif; ?>
                        </td>
                        <td><?php echo htmlspecialchars($produto["nome"]); ?></td>
                        <td><?php echo htmlspecialchars($produto["categoria"]); ?></td>
                        <td>R$ <?php echo number_format($produto["preco"], 2, ",", "."); ?></td>
                        <td><?php echo $produto["qtd"]; ?></td>
                        <td>
                            <a href="editar.php?id=<?php echo $produto["id"]; ?>"; class="botao editar">Editar</a>
                            <a href="excluir.php?id=<?php echo $produto["id"]; ?>" class="botao excluir" onclick="return confirm('Tem certeza que deseja excluir este produto?');">Excluir</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
            <a href="cadastrar.html" class="botao">Voltar</a>
        </div>
    </div>
</body>
</html>