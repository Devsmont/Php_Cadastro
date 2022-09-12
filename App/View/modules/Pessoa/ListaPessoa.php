<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Pessoas</title>
</head>
<body>

    <table>
        <tr>
            <th></th>
            <th></th>
            <th>Id</th>
            <th>Nome</th>
            <th>CPF</th>
            <th>Data Nascimento</th>
            <th>email</th>
            <th>telefone</th>
            <th>endereco</th>
        </tr>

        <?php foreach($model->rows as $item): ?>
        <tr>
            <td>
                <a href="/pessoa/delete?id=<?= $item->id ?>">X</a>
            </td>

            <td><?= $item->id ?></td>

            <td>
                <a href="/pessoa/form?id=<?= $item->id ?>"><?= $item->nome ?></a>
            </td>

            <td><?= $item->cpf ?></td>
            <td><?= $item->data_nascimento ?>
            <a href="/pessoa/form?id=<?= $item->id ?>"><?= $item->data_nascimento ?></a>
        </td>
            <td><?= $item->email ?>
            <a href="/pessoa/form?id=<?= $item->id ?>"><?= $item->email ?></a>
        </td>
            <td><?= $item->telefone ?></td>
            <td><?= $item->endereco ?>
            <a href="/pessoa/form?id=<?= $item->id ?>"><?= $item->endereco ?></a>
        </td>
        </tr>
        <?php endforeach ?>

        
        <?php if(count($model->rows) == 0): ?>
            <tr>
                <td colspan="5">Nenhum registro encontrado.</td>
            </tr>
        <?php endif ?>

    </table>
    
</body>
</html>