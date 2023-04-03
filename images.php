<?php
include 'connection.php';

// $stmt = $pdo->QUERY('SELECT * FROM products');
// $products = $stmt->fetchAll();

?>

<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />

</head>

<body>
  <header>
    <!-- place navbar here -->
  </header>
  <main>

    <div class="container mt-4">
      <div class="p-5 mb-4 bg-light rounded-3">
        <div class="container-fluid py-5 w-50">
          <h1 class="display-5 fw-bold text-center">Custom jumbotron</h1>
          <input type="file" name="image" id="image" />

        </div>
      </div>
    </div>

  </main>
  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>

  <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
  <script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>

  <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>

  <script>
    FilePond.registerPlugin(FilePondPluginFileValidateType);
    FilePond.registerPlugin(FilePondPluginFileValidateSize);

    let params = (new URL(document.location)).searchParams;
    let productId = params.get("product_id");

    FilePond.setOptions({
      server: '/upload.php?product_id=' + productId,
    });

    // FilePond.setOptions({
    //   server: {
    //     url: '/upload.php?=product_id=' + productId,
    //     process: {
    //       url: '/upload.php?=product_id=' + productId,
    //       method: 'POST',
    //       withCredentials: false,
    //       headers: {},
    //       timeout: 7000,
    //       onload: null,
    //       onerror: null,
    //       ondata: null,
    //     },
    //   },
    // });


    // Get a reference to the file input element
    const inputElement = document.querySelector('input[name="image"]');

    // Create a FilePond instance
    const pond = FilePond.create(inputElement);
    pond.allowMultiple = true;
    pond.maxFileSize = '2MB';
    pond.acceptedFileTypes = ['image/png', 'image/jpeg', 'image/jpg', 'image/webp'];
  </script>
</body>

</html>