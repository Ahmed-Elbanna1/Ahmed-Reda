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
        'activitiess' => [
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
                    foreach ($users as $property => $value) {
                        foreach ($value as $key => $value3) {
                            $arr[$key] = 0;
                        }
                    }
                    // print_r($arr);
                    foreach ($arr as $index => $value) {
                        echo "<th > $index </th>";
                    }
                    ?>
                </tr>
            </thead>
            <tbody>
                <tr>

                </tr>
                <?php
                for ($i = 0; $i < count($users); $i++) {
                    echo "<tr>";
                    foreach ($users[$i] as $key => $value1) {
                        // echo gettype($value1) . "<br>";
                        if ($key == "gender") {
                            // echo $key;
                            foreach ($value1 as $prob => $value2) {
                                if ($value2 == "m") {
                                    echo ("<td > Male </td>");
                                } else {
                                    echo ("<td > Female </td>");
                                }
                            }
                        } elseif (gettype($value1) == "object" || gettype($value1) == "array") {
                            echo "<td>";
                            foreach ($value1 as $hobbiesindex => $hobbiesvalue) {
                                echo ($hobbiesvalue . "<br>");
                            }
                            echo "</td>";
                        } else {
                            // echo $key;
                            echo ("<td > {$value1} </td>");
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