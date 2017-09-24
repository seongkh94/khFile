<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
</br>
<table align="center" style="width: 700px" class="table table-bordered">
<?php

echo "<tr>";
    echo "<td width='10%'>". $result[0]['no'] ."</td>";
    echo "<td width='20%'>". $result[0]['id'] ."</td>";
    echo "<td width='30%'>". $result[0]['subject'] . "</td>";
    echo "<td width='10%'>". $result[0]['comment'] . "</td>";
    echo "<td width='30%'>". $result[0]['date'] . "</td>";
echo "</tr>";
echo "<tr>";
    echo "<td colspan='5' style='height: 500px'>" . $result[0]['contents'] . "</td>";
echo "</tr>";
echo "</table></br>";

$_SESSION['no'] = $result[0]['no'];
/*댓글*/
echo "<div align='center'>";
echo "<form  action='http://localhost/index.php/board/comment' method='post'>";
echo "댓글";
echo "<table align='center' style='width: 700px' class='table' >";
    echo "<tr>";
        echo "<td width='10%'>작성자</td>";
        echo "<td>내용</td>";
        echo "<td width='30%'>날짜</td>";
    echo "</tr>";
        for($i = 0 ; $i < count($comment_result); $i++){
            echo "<tr>";
                echo "<td>" . $comment_result[$i]['name'] . "</td>";
                echo "<td>" . $comment_result[$i]['contents'] . "</td>";
                echo "<td>" . $comment_result[$i]['date'] . "</td>";
            echo "</tr>";
        }

echo "</table>";
echo "<input class='text-center' name='comment' type='text' style='width: 600px'> ";
echo "<input class='btn btn-default' type='submit' value='등록'>";
echo "</form>";
echo "</div>";
/*댓글*/

$no = $result[0]['no'];
echo "<div align='center'>";
    echo "<form>";
        echo "<input type='button' value='수정' class='btn btn-default' onclick=updated($no)>";
        echo "<input type='button' value='삭제' class='btn btn-default' onclick=deleted($no)>";
        echo "<input type='button' value='목록' class='btn btn-default' onclick=main_list()>";
    echo "</form>";
echo "</div>";
?>

<script>

    function updated(update_num) {
        location.replace("http://localhost/index.php/board/update/"+update_num);
    }

    function deleted(delete_num) {
        location.replace("http://localhost/index.php/board/delete/"+delete_num);
    }

    function main_list() {
        location.replace("http://localhost/index.php/board");
    }



</script>