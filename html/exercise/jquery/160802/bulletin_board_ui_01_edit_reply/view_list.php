<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="/css/mystyle.css">
<style>
#loginbox-container {
	margin-top: 30px;
}

</style>
<script type="text/JavaScript" src="js/sha512.js"></script> 
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
<div class="content">
<h1>나의 게시판</h1>
<?php
	require_once 'Post.php';
	require_once 'security/session.php';
	
	start_session();

	if (!isset($_SESSION['view_list']['search'])) { // 게시판에 처음 들어왔다
		$_SESSION['view_list']['search'] = array();
	} else if (isset($_GET['clear_search'])) { // 초기화버튼 클릭됨
		$_SESSION['view_list']['search'] = array();
	} else if (isset($_GET['search_clicked'])) { // 검색 버튼이 클릭됨
		$category = $_GET['search_category'];
		$keyword = $_GET['search_keyword'];
		if ($keyword === '') { // 검색칸이 비엇으면 그냥 무시
			$_SESSION['view_list']['search'] = array();
		} else {
			$_SESSION['view_list']['search']['category'] = $category;
			$_SESSION['view_list']['search']['keyword'] = $keyword;			
		}
	} 
		
	if (!isset($_SESSION['view_list']['page_block'])) { // 게시판에 처음 옴
		$_SESSION['view_list']['page_block'] = 0;
	} else if (isset($_GET['block'])) { // 직전 화면도 메인이엇음
		$_SESSION['view_list']['page_block'] = $_GET['block']; // 직전 화면도 메인 화면이었다	
	}	
	$block = $_SESSION['view_list']['page_block']; // 이름 줄이기
	
	$num_posts_in_block = 10;
	$num_blocks_in_view = 5;
	$first_post = $block * $num_posts_in_block;
	$last_post = $first_post + $num_posts_in_block;
	$first_block = $block - $block % $num_blocks_in_view;
	$last_block = $first_block + $num_blocks_in_view;
	
	// 게시물의 마지막이 잘리는 경우
	$num_total_posts = get_num_total_posts();
	if ($last_post > $num_total_posts) {
		$last_post = $num_total_posts;
	}
	// 블록의 마지막이 잘리는 경우
	$num_total_blocks = ceil($num_total_posts / $num_posts_in_block);
	if ($last_block > $num_total_blocks) {
		$last_block = $num_total_blocks;
	}
?>
<div id="table-container">
	<table class="post-table">
	<tr>
		<th>번호</th>
		<th>제목</th>
		<th>글쓴이</th>
	</tr>
<?php
	$posts = get_posts($_SESSION['view_list']['search'], $first_post, $last_post - $first_post);
	foreach ($posts as $post) {
		$post_id = $post->getId();
		$title = $post->getTitle();
		$author = $post->getAuthor();
		echo '<tr>';
		echo '<td width="15%">'.$post_id.'</td>';
		echo '<td width="65%"><a href=view_post.php?post_id='.$post_id.'>'.htmlspecialchars($title).'</a></td>';
		echo '<td width="20%">'.htmlspecialchars($author).'</td>';
		echo '</tr>';
	}
?>
	</table>
</div>
<div id="navigator-box">
<div id="navigator" style="float: left;">
<?php
	// 이전 블록으로 가기
	if ($first_block > 0) {
		printf ('<a float="left" href=view_list.php?block=%d>{이전 %d개 페이지로}</a>', max($first_block - 5, 0), $num_blocks_in_view);
	}
	// 현재 블록들
	for ($index = $first_block; $index < $last_block; $index += 1) {
		if ($index === intval($block)) {
			printf('<strong>%d</strong>', $index);
		} else {
			printf ('<a href=view_list.php?block=%d>%d</a>', $index, $index);
		}
		echo '  ';
	}
	// 다음 블록으로 가기
	if ($last_block < $num_total_blocks) {
		printf ('<a href=view_list.php?block=%d>{다음 %d개 페이지로}</a>', $last_block, $num_blocks_in_view);
	}
?>	
</div>

<div id="search-box" style="float: right;">
<form action="view_list.php" method="get">
	<select name="search_category" style="width: 100px;">
		<option value="title">제목</option>
		<option value="content">내용</option>
		<option value="title+content">제목+내용</option>
	</select>
	<input type="text" name="search_keyword"></input>
	<input type="hidden" name="search_clicked"></input>
	<input type="submit" value="검색" style="width:80px;"></input>
</form>
<form action="view_list.php" method="get">
	<input type="hidden" name="clear_search"></input>
	<input type="submit" value="검색 초기화" style="width:80px;"></input>
</form>
</div>
</div>

<div id="loginbox-container" style="margin-bottom:50px;">
<?php
	if (check_login()) {
?>
	<a href="view_write_post.php">글쓰기</a>
	<br><br>

	<form action="security/logout.php" method="get">
		<input type="submit" value="로그아웃">
	</form>	
<?php
	} else {
?>
		글을 작성하려면 로그인 하십시오
		<form action="security/login.php" method="post">
		<table>
			<tr><td>아이디:</td><td><input type="text" name="id"></td></tr>
			<tr><td>비번:</td><td><input type="text" name="password"></td></tr>
			<tr><td></td><td><input type="button" value="로그인" onClick="tryLogin(this.form, this.form.password);"></td>
		</table>
		</form>
		<form action="security/view_register.php" method="get">
			<input type="submit" value="회원가입">
		</form>
<?php
	}
	
?>
</div>
	<form action="create_post.php?fill_data=yes" method="post">
		<input type="hidden" name="fill_data"></input>
		<input type="submit" value="테스트용 데이터 넣기"></input>
	</form>
</div>
</body>
</html>