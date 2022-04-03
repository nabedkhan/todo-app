<?php
require_once './functions.php';
?>


<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
  <!-- google font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <!-- custom css -->
  <link rel="stylesheet" href="./css/style.css">
  <title>Todo Application</title>
</head>


<body>
  <header class="bg-light">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
                <h1 class="text-center py-3 text-uppercase fw-bold">Todo Application</h1>
        </div>
      </div>
    </div>
  </header>

  <!-- form -->
  <div class="container mt-4">
    <div class="row">
      <div class="col-md-6 offset-md-3">

        <form action="?task=create" method="POST">
          <div class="mb-3">
            <label for="title" class="form-label">Todo</label>
            <input type="text" class="form-control" id="title" name="todo" value="<?php echo $todo['name'] ?? '' ?>">
          </div>

          <input type="text" name="id" hidden value="<?php echo $todo['id'] ?? ''; ?>">
          <button type="submit" class="btn btn-primary">Create</button>
        </form>

      </div>
    </div>
  </div>

  <!-- form -->
  <div class="container mt-4">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <?php foreach ($todo_list as $todo): ?>
          <div class="card card-body mb-2">
            <div class="d-flex justify-content-between">
              <p class="mb-0"><?php echo $todo['name']; ?></p>

              <div class="d-flex gap-3">
                <a href="/crud-app?task=edit&id=<?php echo $todo['id']; ?>" class="text-warning">
                  <i class="bi bi-pencil"></i>
                </a>

                <button onclick="handleDelete(<?php echo $todo['id']; ?>)" class="btn p-0 shadow-none text-danger">
                  <i class="bi bi-x-lg"></i>
                </button>
              </div>
            </div>
          </div>
        <?php endforeach;?>
      </div>
    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <script>
    function handleDelete(id) {
      if (window.confirm('Are you want to remove this todo?')) {
        location.href = `/crud-app?task=delete&id=${id}`;
      }
    }
  </script>
</body>

</html>