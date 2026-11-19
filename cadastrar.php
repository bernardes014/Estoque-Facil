<?php

include "config/conexao.php";

$nome = $_POST["nome"];
$categoria = $_POST["categoria"];
$preco = $_POST["preco"];
$quantidade = $_POST["quantidade"];

$nomeImagem = null;

// Se enviou imagem sem erro
if (isset($_FILES["imagem"]) && $_FILES["imagem"]["error"] === UPLOAD_ERR_OK) {

    $extensoesPermitidas = ["jpg", "jpeg", "png", "webp", "gif"];
    $extensao = strtolower(pathinfo($_FILES["imagem"]["name"], PATHINFO_EXTENSION));

    if (!in_array($extensao, $extensoesPermitidas)) {
        die("Formato não permitido. Use JPG, PNG, WEBP ou GIF.");
    }

    if ($_FILES["imagem"]["size"] > 2 * 1024 * 1024) {
        die("Imagem muito grande (máximo 2 MB).");
    }

    // Nome único para não sobrescrever arquivos iguais
    $nomeImagem = uniqid("produto_") . "." . $extensao;

    move_uploaded_file($_FILES["imagem"]["tmp_name"], "uploads/" . $nomeImagem);
}

$sql = "INSERT INTO tb_produtos(nome, qtd, categoria, preco, imagem)
                VALUES ('$nome', '$quantidade', '$categoria', '$preco', '$nomeImagem')";

if ($conexao->query($sql)) {
    echo "Produto cadastrado com sucesso!";
} else {
    echo "Erro ao cadastrar produto.";
}

echo "<br><a href='cadastrar.html'>Voltar</a>";

?>
