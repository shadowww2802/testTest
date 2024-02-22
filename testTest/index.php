<?php session_start() ?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
</head>

<body>

  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Dropdown
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" aria-disabled="true">Disabled</a>
          </li>
        </ul>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>


  <section class="vh-100 pt-5 text-center">
    <h1>INSERT</h1>
    <form class="mx-1 mx-md-4 pt-5" action="process.php" method="POST" autocomplete="off">

      <div class="d-flex flex-row align-items-center mb-4">
        <i class="fas fa-key fa-lg me-3 fa-fw"></i>
        <div class="form-outline flex-fill mb-0">
          <label class="form-label" for="form3Example4cd">Student ID</label>
          <input type="text" id="form3Example4cd" class="form-control" name="studentID" />
        </div>
      </div>

      <div class="d-flex flex-row align-items-center mb-4">
        <i class="fas fa-key fa-lg me-3 fa-fw"></i>
        <div class="form-outline flex-fill mb-0">
          <label class="form-label" for="form3Example4cd">First Name</label>
          <input type="text" id="form3Example4cd" class="form-control" name="firstName" />
        </div>
      </div>

      <div class="d-flex flex-row align-items-center mb-4">
        <i class="fas fa-key fa-lg me-3 fa-fw"></i>
        <div class="form-outline flex-fill mb-0">
          <label class="form-label" for="form3Example4cd">Middle Name <small>(Optional)</small></label>
          <input type="text" id="form3Example4cd" class="form-control" name="middleName" />
        </div>
      </div>

      <div class="d-flex flex-row align-items-center mb-4">
        <i class="fas fa-key fa-lg me-3 fa-fw"></i>
        <div class="form-outline flex-fill mb-0">
          <label class="form-label" for="form3Example4cd">Last Name</label>
          <input type="text" id="form3Example4cd" class="form-control" name="lastName" />
        </div>
      </div>

      <div class="d-flex flex-row align-items-center mb-4">
        <i class="fas fa-key fa-lg me-3 fa-fw"></i>
        <div class="form-outline flex-fill mb-0">
          <label class="form-label" for="form3Example4cd">Year</label>
          <input type="text" id="form3Example4cd" class="form-control" name="year" />
        </div>
      </div>

      <div class="d-flex flex-row align-items-center mb-4">
        <i class="fas fa-key fa-lg me-3 fa-fw"></i>
        <div class="form-outline flex-fill mb-0">
          <label class="form-label" for="form3Example4cd">Section</label>
          <input type="text" id="form3Example4cd" class="form-control" name="section" />
        </div>
      </div>

      <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
        <button type="submit" class="btn btn-primary btn-lg" name="insertButton">Insert</button>
      </div>

  </section>



  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>


  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <?php
  if (isset($_SESSION['status']) && $_SESSION['status_code'] != '') {
  ?>
    <script>
      swal({
        title: "<?php echo $_SESSION['status']; ?>",
        icon: "<?php echo $_SESSION['status_code']; ?>",
      });
    </script>
  <?php
    unset($_SESSION['status']);
    unset($_SESSION['status_code']);
  }
  ?>
</body>

</html>