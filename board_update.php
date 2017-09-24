<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<?php
   $no = $result[0]['no'];
   $subject = $result[0]['subject'];
   $contents = $result[0]['contents'];
   echo "<div class='container'>";
        echo "<form action='http://localhost/index.php/board/update_save/$no'  method='post'>";
        echo "제목";
            echo "<input type='text' class='form-control col-sm-6-6' style='width: 400px; height: 50px' name='subject' value=$subject></br>";
        echo "내용";
            echo "<textarea class='form-control col-sm-6' style='width: 400px; height: 500px' name='contents'>$contents</textarea></br>";
            echo "<input type='submit' class='btn btn-default' value='확인'>";
        echo "</form>";
    echo "</div>";

?>