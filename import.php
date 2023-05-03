<link rel = 'stylesheet' href = 'import.css'>
<form action='import.php' method = 'get' class = 'form-container'>
  <center>
    <input type="text" name="title" id="title" placeholder = ' title' class = ' title'><br><br>
    <input type="text" name="description" id="description" placeholder = ' description' class = 'description'><br><br>
    <input type="text" name="url" id="url" placeholder = ' url' class = 'url'><br><br>
    <input type="text" name="keywords" id="keywords" placeholder = ' keyword' class = 'keyword'><br><br>
    <input type="submit" value="POST" name = 'submit' id = 'submit' class = 'submit'>
</center>
</form>

<?php





if(isset($_GET['submit']) && $_GET['title'] != null){
  $title = $_GET['title'];
  $description = $_GET['description'];
  $keywords = $_GET['keywords'];
  $url = $_GET['url'];
  $submit_button = $_GET['submit'];
  require_once('config\config.php');
  $stmt = $con->prepare('INSERT INTO search_engine(title, description, keywords, url) VALUES(?, ?, ?, ?)');
  $stmt->bind_param('ssss', $title, $description, $keywords, $url);
  $stmt->execute();
  echo('uploaded successfully!!');
}