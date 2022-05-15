<?php
session_start();
$msg = "";
$color = "";
if ($_SESSION['result'] < 25) {
    $msg = "We will call you later on this phone :+20" . $_SESSION['phoneNumber'];
    $color = "bg-danger";
} else {
    $msg = "Thanks ";
    $color = "bg-success";
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
        <div class="text-center h3 text-danger my-2"></div>
        <div class="col-8 offset-2 my-1">
            <table class="table table-light table-striped table-hover table-bordered">
                <form method="POST">
                    <thead class="text-start">
                        <tr>
                            <th scope="col">the question
                            </th>
                            <th class="text-center" scope="col">You choices</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-center">
                            <td class="text-start">Are you satisfied with the level of cleanliness?</td>
                            <td>
                                <?= $_SESSION['q1'] ?>
                            </td>
                        </tr>
                        <tr class="text-center">
                            <td class="text-start">Are you satisfied with the service prices?
                            </td>
                            <td>
                                <?= $_SESSION['q2'] ?>
                            </td>
                        </tr>
                        <tr class="text-center">
                            <td class="text-start">Are you satisfied with the nursing service
                            </td>
                            <td>
                                <?= $_SESSION['q3'] ?>
                            </td>
                        </tr>
                        <tr class="text-center">
                            <td class="text-start">Are you satisfied with the level of the doctor?
                            </td>
                            <td>
                                <?= $_SESSION['q4'] ?>
                            </td>
                        </tr>
                        <tr class="text-center">
                            <td class="text-start">Are you satisfied with the calmness in the hospital?
                            </td>
                            <td>
                                <?= $_SESSION['q5'] ?>
                            </td>
                        </tr>

                    </tbody>

            </table>
            <div class="col-12 m-auto text-center my-3 p-3 <?= $color ?>">
                <?= $msg; ?>
            </div>
            </form>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>
</body>

</html>
<?php


?>