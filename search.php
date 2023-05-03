<link rel='stylesheet' href='style.css'>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<?php


//including config file

require_once('config\config.php');

//search query
$search_query = $_GET['s'];


if(isset($search_query)){
    
    $search_history = $con->prepare("INSERT INTO searcj_history(data) VALUES(?)");
    $search_history->bind_param('s', $search_query);
    $search_history->execute();
}
else{
    echo('please enter a value');
}


$search_result = "SELECT * FROM search_engine WHERE keywords LIKE '%$search_query%'";
$result = $con->query($search_result);



 if ($result->num_rows >= '1' && $search_query != null){
    ?>
    
    <form action='search.php' class = 'search-form'>
        <br>
        <input class="form-control form-control-lg" type="text" name="s" id="s" value = <?php echo($search_query);?>>
        <br>
        <hr color = 'grey'

        <?php
    echo('about '.$result->num_rows.' results found!<br> <br>');
    while($row = $result->fetch_assoc()){
        ?>
        <div class = 'search-results'>
        <a href="<?php echo($row['url']);?>"><?php 
        
        echo("<h4>".$row['title']."</h3>");?></a><?php 
        echo($row['description']);
        echo('<br><br>');
        ?>
        </div>
        <?php
    }

}else{
    echo('0 results found');
}


