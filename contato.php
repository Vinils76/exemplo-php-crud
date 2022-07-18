<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contato</title>
</head>
<body>
    <h1>Contato usando phpmailer</h1>
    <hr>
    <form action="" method="POST">
        <p>
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" required>
        </p>

        <p>
            <label for="email">email:</label>
            <input type="text" name="email" id="email" required>
        </p>

        p>
            <label for="assunto">Assuntos:</label>
            <select name="assunto" id="assunto" required>
                <option value=""></option>
                <option value="duvidas">Dúvidas</option>
                <option value="reclamações">Reclamações</option>
                <option value="comentarios">Comentários</option>
            </select>
        </p>

        <p>
            <label for="mensagem">Mensagem:</label><br>
            <textarea name="mensagem" id="mensagem" cols="30" rows="5"></textarea>
        </p>

        <button type="submit" name="enviar">Enviar</button>

    </form>
</body>
</html>