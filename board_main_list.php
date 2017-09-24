
<table style="width: 800px" align="center" class="table table-hover">
<tr>
    <td width="10%">번호</td><td width="20%">이름</td><td width="30%">제목</td>
    <td width="10%">조회수</td><td width="30%">날짜</td>
</tr>
<?php
if(!isset($count)){
    for($i = 0; $i < 5; $i++){
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
}else{
    $start_num =  ($count-1) * 5 ; // 페이지가 만약 2이면 6부터 목록에 띄우도록 변수 설정
    $last_num =  $start_num + 4;   // 한 페이지에 5개씩 목록을 보이게 하기 위한 변수

    for(; $start_num <= $last_num; $start_num++){
        if(isset($result[$start_num]['no'])){ // 마지막 페이지는 목록이 5개가 아닐 수 있으므로
        echo "<tr>";
        for($j = 0; $j < 5; $j++){
            switch ($j){
                case 0:
                    echo "<td>" . $result[$start_num]['no'] . "</td>";
                    break;
                case 1:
                    $id = (string)$result[$start_num]['no'];
                    echo "<td>" . $result[$start_num]['name'] . "</td>";
                    break;
                case 2:
                    $id = (string)$result[$start_num]['no'];
                    echo "<td onclick='print(event)' id=$id>" . $result[$start_num]['subject'] . "</td>";
                    break;
                case 3:
                    echo "<td>" . $result[$start_num]['comment'] . "</td>";
                    break;
                case 4:
                    echo "<td>" . $result[$start_num]['date'] . "</td>";
                    break;
            }
        }
        echo "</tr>";
        }
    }


}
?>
</table>

<script>
    function print(event) {
        var id = parseInt(event.target.id);
        location.replace("http://localhost/index.php/board/show/"+id);
    }
</script>