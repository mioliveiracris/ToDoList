<!DOCTYPE html>
<html>

<head>
  <title>Lista de Tarefas - To do List</title>
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
  <div class="container mt-3">

    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Cadastra nova tarefa</div>
          <div class="card-body">
            <form method="post" id="add_todo" name="add_todo" 
              action="<?= site_url('/add-todo') ?>">
              <div class="mb-3">
                <input type="text" name="title" class="form-control" placeholder="Tarefa">
              </div>
              <div class="mb-3">
              <?php if($categories): ?>
                <label for="Category">Categoria</label>
                <select class="form-control" name="category_id">
                  <?php foreach($categories as $category): ?>
                    <option value="<?php echo $category['id']; ?>" ><?php echo $category['category']; ?></option>
                  <?php endforeach; ?>
              <?php endif; ?>
              </select>
              </div>

              <div class="d-grid">
                <button type="submit" class="btn btn-dark">Adicionar Tarefa</button>
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
    if ($("#add_todo").length > 0) {
      $("#add_todo").validate({
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