<!DOCTYPE html>
<html>

<head>
    <title>Lista de Tarefas - To Do List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        .error {
            display: block;
            color: red;
            font-size: 13px;
        }
        .container{
            margin-top: 100px;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" /> 
 
</head>

<body>
    <div class="container">

        <div class="d-flex justify-content-end">
            <a href="<?php echo site_url('/todo-form') ?>" class="btn btn-danger mb-3"><i class="bi bi-plus"></i> Nova Tarefa</a>
        </div>

        <?php if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
        } ?>
        <table id="todolist" class="display" style="width:100%"class="table table-striped table-inverse">
            <thead class="thead-inverse">
                <tr>
                    <th></th>
                    <th>Tarefa</th>
                    
                    <th>Categoria</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
        
            <?php if($todos): ?>
            <?php foreach($todos as $todo): ?>
                <tr>
                    
                    <?php if ($todo['status'] == 'A'): ?>
                        <td> 
                            <a href="<?php echo base_url('status-todo/'.$todo['id']);?>" class="text-decoration-none">
                                <i data-bs-toggle="tooltip" title="Mudar Status" class="bi bi-circle"></i>
                            </a>
                        </td>
                        <td>
                            <?php echo $todo['title']; ?>
                            <a href="<?php echo base_url('edit-todo/'.$todo['id']);?>" class="text-decoration-none">
                                <i data-bs-toggle="tooltip" class="bi bi-pen-fill" title="Editar"></i>
                            </a>
                        </td>
                   
                   
                    <?php elseif ($todo['status'] == 'C'): ?>
                       <td> 
                            <a href="<?php echo base_url('status-todo/'.$todo['id']);?>" class="text-decoration-none">
                                <i data-bs-toggle="tooltip" title="Mudar Status" class="bi bi-check-circle-fill"></i>
                            </a>
                        </td>
                        <td>
                            <del>
                                <?php echo $todo['title']; ?>
                            </del>
                            <a href="<?php echo base_url('edit-todo/'.$todo['id']);?>" class="text-decoration-none">
                                <i data-bs-toggle="tooltip" class="bi bi-pen-fill" title="Editar"></i>
                            </a>
                        </td>
                    <?php endif; ?>
                    <td><?php echo $todo['category']; ?></td>
                    <td>    
                        <a href="<?php echo base_url('delete-todo/'.$todo['id']);?>" class="text-decoration-none"><i data-bs-toggle="tooltip" class="bi bi-trash-fill" title="Excluir"></i></a>   
                    </td>
                </tr>
            <?php endforeach; ?>
            <?php endif; ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
            crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.js"></script>
    
    <script>
    $(document).ready(function() {
        $('#todolist').DataTable({
        "order": [[ 0, "desc" ]],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/pt-BR.json"
        }
    } );
    } );
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })

    </script>
</body>
</html>