<?php
session_start();


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $errors = [];
    if (empty($_POST['phone'])) {
        $errors['phone-required'] = '<div class="text-danger font-weight-bold" > Email Address Is Required </div>';
    }
    if (strlen($_POST['phone']) != 10) {
        $errors['phone-length'] = '<div class="text-danger font-weight-bold" > Phone number must contain 12 num </div>';
    }
    if (empty($errors)) {
        $_SESSION['phoneNumber'] = $_POST['phone'];
        header('location:Review.php');
        die;
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="row container-fluid">
        <div class="text-center h3 text-danger my-5">Hospital Review</div>
        <div class="col-6 offset-3 my-1">
            <form method="post">
                <div class="form-group my-2">
                    <label for="num" class="form-label">Phone Number</label>
                    <input type="tel" class="form-control" name='phone' id="Fnum" placeholder="Enter Your phone number">
                    <?= $errors['phone-required'] ?? "" ?>
                    <?= $errors['phone-length'] ?? "" ?>
                </div>
                <div class="form-group text-center mt-1 ">
                    <input type="submit" name="submit" value="submit">
                </div>
            </form>
        </div>
        <div class="col-12 m-auto text-center  mt-5 ">
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>