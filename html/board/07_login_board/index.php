<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>

<head>
  <link rel="stylesheet" type="text/css" href="/kimyost/style.css">
  <script language="javascript" src="js/sha512.js"></script>
  <script language="javascript" src="js/check_form.js"></script>
  <script>
    function tryLogin(form, password) {
      var hash = document.createElement('input');
      form.appendChild(hash);
      hash.name = 'hash';
      hash.type = 'hidden';
      hash.value = hex_sha512(password.value);
      password.value = '';
      form.submit();
      return true;
    }
  </script>
</head>

<body>
  <div class="wrap_tb">
    <div style="float:right;margin-bottom:20px;"><a href="../../index.php">홈으로</a></div>
    <?php
require_once 'security/class_login.php';
$conn = db_connect();
require_once 'security/session.php';
start_session ();
if (check_login()) {
    ?>
      <table>
        <tbody>
          <colgroup>
            <col width="90%">
              <col width="10%">
          </colgroup>
          <tr>
            <td>현재 로그인 된 상태입니다.</td>
            <td>
              <form action="security/logout.php" method="get">
                <input type="submit" value="로그아웃">
              </form>
            </td>
          </tr>
        </tbody>
      </table>

      <?php
} else {
    ?>
        <table>
          <tbody>
            <colgroup>
              <col width="10%">
                <col width="30%">
                  <col width="10%">
                    <col width="30%">
                      <col width="10%">
                        <col width="10%">
            </colgroup>
            <tr>
              <form action="security/login.php" method="post">
                <td>ID</td>
                <td>
                  <input type="text" name="id">
                </td>
                <td>Password</td>
                <td>
                  <input type="password" name="password">
                </td>
                <td>
                  <input type="button" value="로그인" onClick="tryLogin(this.form, this.form.password);">
                </td>
              </form>
              <td>
                <form action="security/register_page.php" method="get">
                  <input type="submit" value="회원가입">
                </form>
              </td>
            </tr>
          </tbody>
        </table>

        <?php
    
}
?>
  </div>
  <div class="wrap_tb">
    <div class="board_tb">
      <h1>게시판 A</h1>

      <?php
require_once '../../../includes/mylib.php';
$conn = db_connect();
?>
        <table>
          <tbody>
            <colgroup>
              <col width="7%">
                <col width="45%">
                  <col width="20%">
                    <col width="28%">
            </colgroup>
            <tr>
              <th>번호</th>
              <th>제목</th>
              <th style="display:none;">비고</th>
              <th>작성자</th>
              <th>최근작성일</th>
            </tr>
            <?php

$select_query = 'SELECT post_id, title, note, author, last_update FROM post WHERE board_id = 0 Order By post_id DESC';
$result = mysqli_query($conn, $select_query);

while($row = mysqli_fetch_assoc($result)) {
    echo '<tr>';
    echo '<td>'.$row['post_id'].'</td>';
    echo '<td><a href="post_view.php?post_id='.$row['post_id'].'&board_id=0">'.$row['title'].'</a></td>';
    echo '<td style="display:none;">'.$row['note'].'</td>';
    echo '<td>'.$row['author'].'</td>';
    $correct_time = convert_time_string($row['last_update']);
    echo '<td>'.$correct_time.'</td>';
    echo '</tr>';
}
echo '</tbody>';
echo '</table>';
mysqli_free_result($result);
mysqli_close($conn);
?>

              <?php
if (check_login()) {
    ?>
                <div class="board_btn">
                  <a href="post_write.php?board_id=0">
                    <input type="button" value="글쓰기">
                  </a>
                </div>
                <?php
}
?>
    </div>

    <div class="board_tb">
      <h1>게시판 B</h1>

      <?php
$conn = db_connect();
?>
        <table>
          <tbody>
            <colgroup>
              <col width="7%">
                <col width="25%">
                  <col width="25%">
                    <col width="15%">
                      <col width="28%">
            </colgroup>
            <tr>
              <th>번호</th>
              <th>제목</th>
              <th>비고</th>
              <th>작성자</th>
              <th>최근작성일</th>
            </tr>
            <?php
$select_query = 'SELECT post_id, title, note, author, last_update FROM post WHERE board_id = 1 Order By post_id DESC';
$result = mysqli_query($conn, $select_query);

while($row = mysqli_fetch_assoc($result)) {
    echo '<tr>';
    echo '<td>'.$row['post_id'].'</td>';
    echo '<td><a href="post_view.php?post_id='.$row['post_id'].'&board_id=1">'.$row['title'].'</a></td>';
    echo '<td>'.$row['note'].'</td>';
    echo '<td>'.$row['author'].'</td>';
    $correct_time = convert_time_string($row['last_update']);
    echo '<td>'.$correct_time.'</td>';
    echo '</tr>';
}
echo '</tbody>';
echo '</table>';
mysqli_free_result($result);
mysqli_close($conn);
?>
              <?php
if (check_login()) {
    ?>
                <div class="board_btn">
                  <a href="post_write.php?board_id=1">
                    <input type="button" value="글쓰기">
                  </a>
                </div>
                <?php
}
?>
    </div>
  </div>


</body>

</html>