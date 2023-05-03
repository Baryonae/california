<?php
//database connection


$con = mysqli_connect('localhost', 'root', '', 'test');


if(!$con){
    echo('connection error!');
}