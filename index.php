<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style>
body{
    background: linear-gradient(to left, #990099 0%, #330e42 100%);
}
#container{
    height: auto;
    width: 900px;
    position: static;
    margin: auto;
    text-align: center;
    
}
.add{
    width: 400px;
    height: 50px;
    background-color: white;
    margin: auto;

}
input{
    border: none;
}
#add_value{
    float:left;
    margin-left: 10px;
    margin-top: 7px;
    font-size: 30px;
    width: 290px;
}
.add_button{
    color:cornflowerblue;
    font-weight:bold;
    font-size:30px;
    margin-right: 10px;
    margin-top: 7px;
    float:right;
    background-color: white;
}
#placeholder{
    width: auto;
    height: 30px;
}
#list{
    background-color: white;
    width: 400px;
    height: auto;
    margin:auto;
}
#tab{
   
    margin-left: 5px;
    margin-right: 5px;
    padding-top: 5px;
    padding-bottom: 5px;
    font-size: 30px;
    width: auto;
    height: auto;
}
td{
    border-bottom: 3px solid green ;
    width: 380px;
    height: auto;
    text-align: center;
}
.box{
    
    visibility: hidden;
}
input:checked + label {
    text-decoration: line-through;
}
::selection {
  color: black;
  background: none;
}
label{
    width: 100%;
}
#buttonDiv{

}
#button_s{
float:right;
position: absolute;
bottom: 0;

}
</style>
</head>
<body>
<div id="container">
<h1 style="color:white;">To do List</h1>
<div class="add">
    <form action="index.php">
    <input type="text" placeholder="Nowe zadanie" name="add_value" id="add_value">
    <input type="submit" value="ADD" class="add_button">

    </form>
</div>
<div id="placeholder"></div>
<div id="list">
<form action="index.php">
    <table id="tab"><?php 
    error_reporting(0);
    if(strlen(trim($_GET['add_value'], " \t."))>0){
    $plik = fopen('todo.txt','a');
    
    $value = trim($_GET['add_value'], " \t.")."\n";
   
  
    fwrite($plik, $value);
    fclose($plik);
    }
    
    
$counter=$_GET['counter'];

    $dane=file('todo.txt'); 
    for($iteration=0;$counter>$iteration;$iteration++){
    $value_del = $_GET[$iteration];
        if( $value_del=="on")
        {
          
            unset($dane[$iteration]);
            
        }
    
    }

    $plik = fopen("todo.txt","w+");
    foreach($dane as $as)
    fwrite($plik,$as);
    fclose($plik);

$plik = fopen('todo.txt','r');
$counter=0;
while(!feof($plik))
{
  $linia = fgets($plik);
  echo "<tr><td><input type='checkbox' id='$counter' name='$counter' class='box'  ><label for='$counter'>$linia</label></td></tr>";
  $counter++;
  
}
fclose($plik);

 echo"<input type='hidden' type='text' name='counter' value=$counter >";







?>

</table>

</div>
<div class="add">
    <input type="submit" value="CLEAR" class="add_button">
</form>
</div>
</div>
</body>
</html>