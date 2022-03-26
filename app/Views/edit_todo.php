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
    .card{
      margin-top: 100px;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Atualiza Descrição da tarefa</div>
          <div class="card-body">
            <form method="post" name="update_todo" id="update_todo" action="<?= site_url('/update-todo') ?>">
              <input type="hidden" name="id" id="id" value="<?php echo $todo_obj['id']; ?>">
                <div class="mb-3">
                  <input type="text" name="title" class="form-control" value="<?php echo $todo_obj['title']; ?>">
                </div>
                <div class="d-grid">
                  <button type="submit" class="btn btn-dark">Atualizar</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>


  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js"></script>
  <script>
    if ($("#update_todo").length > 0) {
      $("#update_todo").validate({
        rules: {
          title: {
            required: true,
          },
          description: {
            required: true,
            maxlength: 120,
          },
        }
      })
    }
  </script>
</body>

</html>