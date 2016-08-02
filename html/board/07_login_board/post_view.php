<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>

<head>
  <link rel="stylesheet" type="text/css" href="/kimyost/style.css">
  <script>
    var isEditReplyMode = false;

    function editReply(button, commentId, form) {
      var cell = document.getElementById(commentId);
      if (isEditReplyMode == false) {
        var content = cell.innerHTML;
        cell.innerHTML = '';
        var textarea = document.createElement('textarea');
        textarea.id = commentId + 'textarea';
        cell.appendChild(textarea);
        textarea.value = content;
        textarea.cols = 60;
        isEditReplyMode = true;
        button.value = '수정완료';
      } else {
        var textarea = document.getElementById(commentId + 'textarea');
        var content = textarea.value;
        if (content == '') {
          alert('댓글은 빈칸 안됨');
          textarea.focus();
          return false;
        }
        //cell.innerHTML = content;
        isEditReplyMode = false;
        button.value = '수정';
        var element = document.createElement('input');
        form.appendChild(element);
        element.name = 'content';
        element.type = 'hidden';
        element.value = content;
        form.submit();
      }
      return false;
    }
  </script>
</head>

<body>
  <div class="wrap">
    <div style="float:right;margin-bottom:20px;"><a href="../../index.php">홈으로</a></div>
    <h1>게시판</h1>

    <?php

/*if ($_SERVER['REQUEST_METHOD'] == 'GET') {
$number_confirm = $_GET['post_id'];
$board_id = $_GET['board_id'];
}*/
require_once '../../../includes/mylib.php';
require_once 'class.php';
require_once 'security/class_login.php';
require_once 'security/session.php';

start_session ();
$conn = db_connect();

if (!isset($_SESSION['post_id'])) { // 게시물 화면에 처음 왔다.
    if (!isset($_GET['post_id'])) { // 직전 화면이 메인 화면이 아니었다. 에러
        die('view_post error');
    } else {
        $post_id = $_GET['post_id'];
        $board_id = $_GET['board_id'];
    }
} else if (!isset($_GET['post_id'])) { // 직전 화면이 메인 화면이 아님
    $post_id = $_SESSION['post_id'];
    $board_id = $_SESSION['board_id'];
} else { // 메인화면에서 온 경우
    $post_id = $_GET['post_id'];
    $board_id = $_GET['board_id'];
}

$_SESSION['post_id'] = $post_id; // 마지막으로 본 게시물 기억
$_SESSION['board_id'] = $board_id;

$post = get_post_with_id($post_id);
$title = $post->getTitle();
$author = $post->getAuthor();
$content = $post->getContent();

?>

      <table>
        <tr>
          <th class="num">번호</th>
          <th>제목</th>
          <th>작성자</th>
          <th>최근작성일</th>
        </tr>
        <?php
$post = get_post_with_id ($post_id);
?>
          <tr>
            <td>
              <?php echo $post->getId(); ?>
            </td>
            <td>
              <input type="text" name="title" value="<?php echo $post->getTitle(); ?>" readonly>
            </td>
            <td>
              <input type="text" name="author" value="<?php echo $post->getAuthor(); ?>" readonly>
            </td>
            <?php $correct_time = convert_time_string($post->getLastUpdate());?>
              <td>
                <?php echo $correct_time; ?>
              </td>
          </tr>
          <tr>
            <th colspan="4">내용</th>
          </tr>
          <tr>
            <td colspan="4">
              <textarea name="content" rows="10" cols="100%" readonly>
                <?php echo $post->getContent(); ?>
              </textarea>
            </td>
          </tr>
          <?php
printf ("<input type='hidden' name='board_id' value='%s'>", $post->getBoardId());
if ($board_id == 1) {
    ?>
            <tr>
              <th colspan="4">비고</th>
              <tr>
                <td colspan="4">
                  <textarea name="note" rows="10" readonly>
                    <?php echo $post->getNote(); ?>
                  </textarea>
                </td>
              </tr>
            </tr>
            <?php
}
?>

      </table>
      <div style="float:left;margin-top:10px;">
        <a href="index.php">
          <input type="button" value="목록보기">
        </a>
      </div>

      <?php
$replies = get_post_with_id($post_id);
if (check_login() && $_SESSION['id'] === $author) {
    ?>
        <div style="float:right;">
          <form action="post_delete.php" method="POST" style="margin-top:10px;">
            <a href="post_edit.php?post_id=<?php echo $post->getId(); ?>&board_id=<?php echo $post->getBoardId(); ?>">
              <input type="button" value="수정하기">
            </a>
            <input type="hidden" name="post_id" value="<?php echo $post->getId(); ?>">
            <input type="submit" value="삭제하기">
          </form>
        </div>
        <?php
}
?>


          <!-- 댓글 시작 -->

          <div class="comment">
            <h2>Comment</h2>


            <?php
$comments = get_comments_in_post ($post_id);

if (count($comments) == 0) {
    ?>
              <div style="margin:50px 0;padding:40px;border:1px solid #ddd;background:#f2f2f2;">댓글이 존재하지 않습니다.
                <br>댓글을 적어주세요.</div>
              <?php
} else {
    ?>
                <div style="margin:20px 0;">
                  <table>
                    <tbody>
                      <colgroup>
                        <col width="7%">
                          <col width="51%">
                            <col width="12%">
                              <col width="10%">
                                <col width="10%">
                      </colgroup>
                      <tr>
                        <th>번호</th>
                        <th>내용</th>
                        <th>작성자</th>
                        <th>수정</th>
                        <th>삭제</th>
                      </tr>
                      <?php
    foreach ($comments as $key => $comment) {
        $comment_id = $comment->getCommentId();
        $comment_content = $comment->getComment();
        $visitor = $comment->getVisitor();
        ?>
                        <tr>
                          <td>
                            <?php echo $comment_id; ?>
                          </td>
                          <td id="<?php echo $comment_id; ?>">
                            <?php echo htmlspecialchars($comment_content); ?>
                          </td>
                          <td>
                            <?php echo $visitor; ?>
                          </td>
                          <?php
        if (check_login() && $_SESSION['id'] === $visitor) {
            ?>
                            <td>
                              <form action="comment_edit.php" method="post">
                                <input type="button" value="수정" onClick="editReply(this, <?php echo $comment_id; ?>, this.form);"> </input>
                                <input type="hidden" name="comment_id" value="<?php echo $comment_id; ?>"></input>
                              </form>
                            </td>
                            <td>
                              <form action="comment_delete.php" method="post">
                                <input type="submit" value="삭제"> </input>
                                <input type="hidden" name="comment_id" value="<?php echo $comment_id; ?>"></input>
                              </form>
                            </td>
                        </tr>

                        <?php
        } else {
            echo '<td></td>';
            echo '<td></td>';
        }
    }
    ?>
                    </tbody>
                  </table>
                </div>
                <?php
}
?>
                  <?php
if (check_login()) { // 로그인된 유저만 댓글작성 가능
    ?>
                    <div style="margin-bottom:150px;">
                      <form name="comment_form" method="POST" action="comment_insert.php">
                        <table>
                          <tbody>
                            <tr>
                              <td colspan="2">
                                <input type="hidden" name="post_id" value="<?php echo $post->getId(); ?>">
                                <textarea rows="3" type="text" name="comment"></textarea>
                              </td>
                            </tr>
                            <tr>
                              <colgroup>
                                <col width="80%">
                                  <col width="20%">
                              </colgroup>
                              <td>
                                <input type="text" name="visitor">
                              </td>
                              <td>
                                <input type="submit" value="댓글쓰기">
                              </td>
                            </tr>

                          </tbody>
                        </table>
                      </form>
                    </div>
          </div>
          <?php
}
?>


  </div>
</body>

</html>