<div class="col-sm-12" style="text-align:center;">
    <form action="http://localhost/index.php/board" method="post">
        제목
        <input type="text" name="subject"></br>
        내용
        <textarea name="contents"></textarea></br>
        <input type="submit" value="확인" class="btn btn-warning">
        <input type="button" value="취소" class="btn btn-warning" onclick="back()">
    </form>
</div>
<script>
    function back() {
        location.replace("http://localhost/index.php/board");
    }
</script>
