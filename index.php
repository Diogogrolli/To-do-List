<?php
    require_once('database/conn.php');

    $tasks = [];

    $sql = $pdo->query("SELECT * FROM task ORDER BY id ASC");

    if ($sql->rowCount() >0 ) {
        $tasks = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="src/styles/syle.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <title>Listas de Tarefas</title>
</head>
<body>
    <div id="to_do">
        <h1>Listas de Tarefas</h1>

        <form action="actions/create.php" method="POST" class="to-do-form">
            <input type="text" name = "description" placeholder="Digite a sua Tarefa" required>
            <button type="submit" class="form-button">
                <i class="fa-solid fa-plus"></i>
            </button>
        </form>
<?php foreach($tasks as $task): ?>
        <div id="task">
            <div class="task">
                
                        <input
                         type="checkbox" 
                         name="progress" 
                         class="progress <?= $task['completed'] ? 'done' : '' ?>"
                         data-task-id="<?= $task['id']?>"
                         <?= $task['completed'] ? 'checked' : '' ?>
                         >

                        <p class="task-description">
                            <?= $task['description'] ?>
                        </p>

                        <div class="task-actions">
                            <a class="action-button edit-button">
                            <i class="fa-regular fa-pen-to-square"></i>  

                            <a href="actions/delete.php?id=<?= $task['id'] ?>" class="action-button delete-button">
                            <i class="fa-regular fa-trash-can"></i>
                            </a>
                        </div>

                        <form action="actions/update.php" method="POST" class="to-do-form edit-task hidden">
                            <input type="text" class="hidden" name="id" value="<?= $task['id']?>">
                            <input 
                                type="text"
                                name="description" 
                                placeholder="Edit your task here"
                                value="<?= $task['description']?>"
                                >

                        <button type="submit" class="form-button confirm button">
                        <i class="fa-solid fa-check"></i>
            </button>
                </form>
            </div>
            
        </div>
        <?php endforeach  ?>
    </div>

    <script src="src/javascript/script.js"></script>
</body>
</html>