<?php

// dynamic table
// dynamic rows
// dynamic columns
// check if gender of user == m ==> male
// check if gender of user == f ==> female

$users = [
    (object)[
        'id' => 1,
        'name' => 'ahmed',
        "gender" => (object)[
            'gender' => 'm'
        ],
        'hobbies' => [
            'football', 'swimming', 'running'
        ],
        'activities' => [
            "school" => 'drawing',
            'home' => 'painting'
        ],

    ],
    (object)[
        'id' => 2,
        'name' => 'mohamed',
        "gender" => (object)[
            'gender' => 'm'
        ],
        'hobbies' => [
            'swimming', 'running',
        ],
        'activities' => [
            "school" => 'painting',
            'home' => 'drawing'
        ],
    ],
    (object)[
        'id' => null,
        'name' => 'menna',
        "gender" => (object)[
            'gender' => 'f'
        ],
        'hobbies' => [
            'running',
        ],
        'activities' => [
            "school" => 'painting',
            'home' => 'drawing'
        ],
    ],

];

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
        <table class="table ">
            <thead>
                <tr>
                    <?php
                    $arr = [];
                    foreach ($users[0] as $property => $value) {
                        echo "<th > $property </th>";
                    }

                    ?>
                </tr>
            </thead>
            <tbody>
                <tr>

                </tr>
                <?php
                foreach ($users as $index => $user) {
                    echo "<tr>";
                    foreach ($user as $proberty => $value) {
                        // echo gettype($value1) . "<br>";
                        if (gettype($value) == "object" || gettype($value) == "array") {
                            echo "<td>";
                            foreach ($value as $key => $dataValue) {
                                if ($proberty == 'gender' || $key == 'gender') {
                                    if ($dataValue == "m") {
                                        echo "male";
                                    } else {
                                        echo ("female");
                                    }
                                } else {
                                    echo ($dataValue . "<br>");
                                }
                            }
                            echo "</td>";
                        } else {
                            // echo $key;
                            echo ("<td > {$value} </td>");
                        }
                    }
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>