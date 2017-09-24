<table style="width: 800px" align="center" class="table table-hover">

<tr>
    <td width="10%">번호</td><td width="20%">이름</td><td width="30%">제목</td>
    <td width="10%">댓글</td><td width="30%">날짜</td>
</tr>

<?php

for($i = 0; $i < count($result); $i++){
    echo "<tr>";
    for($j = 0; $j < 5; $j++){
        switch ($j){
            case 0:
                echo "<td>" . $result[$i]['no'] . "</td>";
                break;
            case 1:
                $id = (string)$result[$i]['no'];
                echo "<td>" . $result[$i]['name'] . "</td>";
                break;
            case 2:
                $id = (string)$result[$i]['no'];
                echo "<td onclick='print(event)' id=$id>" . $result[$i]['subject'] . "</td>";
                break;
            case 3:
                echo "<td>" . $result[$i]['comment'] . "</td>";
                break;
            case 4:
                echo "<td>" . $result[$i]['date'] . "</td>";
                break;
        }
    }
    echo "</tr>";
}

?>
</table>
<script>
    function print(event) {
        var id = parseInt(event.target.id);
        location.replace("http://localhost/index.php/board/show/"+id);
    }
</script>