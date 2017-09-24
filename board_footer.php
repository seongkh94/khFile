<div class="text-center">
    <ul class="pagination">
        <?php
        $count = ceil(count($result) / 5);
        echo "<li><a href='http://localhost/index.php/board'>&#60;</a></li>&nbsp;";
        for($i = 1; $i <= $count; $i++){
            echo "<li><a href='http://localhost/index.php/board/next_page/$i'>$i</a></li>";
            echo "&nbsp;";
        }
        echo "<li><a href='http://localhost/index.php/board'>&#62;</a></li>";
        ?></br></br></br>
    </ul>
    <form action="http://localhost/index.php/board/search" method="post">
        <select style="height: 25px" name="select">
            <option value="전체">전체</option>
            <option value="작성자">작성자</option>
            <option value="제목">제목</option>
            <option value="내용">내용</option>
        </select>
        <input type="text" name="search">
        <input type="submit" value="검색">
    </form>
</div>


<div class="col-sm-12" style="text-align:right;">
    <form action="http://localhost/index.php/board/write" method="post">
        <?php
            if(isset($_SESSION['id']))
                echo "<button type='button' class='btn btn-warning pull-right' data-toggle='modal' data-target='#modal_logout'>로그아웃</button>";
            else
                echo "<button type='button' class='btn btn-warning pull-right' data-toggle='modal' data-target='#modal_login'>로그인</button>";

            if(isset($_SESSION['id'])){
                echo "<input type='submit' value='글쓰기' class='btn btn-warning pull-right' >";
            }
        ?>
    </form>
</div>

<!--로그인 모달창 입니다.-->
<form action="http://localhost/index.php/board/login" method="post">
    <div class="modal fade" id="modal_login">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                </div>
                <div class="modal-body">
                    <table class="table">
                        <tr><td>아이디</td><td>비밀번호</td</tr>
                        <tr><td><input type="text" name="modal_id"> </td><td><input type="password" name="modal_pw"></td</tr>
                    </table>
                </div>
                <div class="modal-footer">
                        <input type="submit" class="btn btn-default"  value="로그인">
                </div>
            </div>
        </div>
    </div>
</form>

<!--로그아웃 모달창 입니다.-->
<form action="http://localhost/index.php/board/logout" method="post">
    <div class="modal fade" id="modal_logout">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                </div>
                <div class="modal-body">
                    <table class="table">
                        <tr><td>로그아웃 하시겠습니까</td</tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-default"  value="확인">
                </div>
            </div>
        </div>
    </div>
</form>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>