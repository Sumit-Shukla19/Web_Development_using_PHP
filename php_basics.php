

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <?php
    echo "Variables-";
    echo"<br>";
    $name="sumit";
    $digit=100;
     echo "$name"." "."$digit";

echo "<br>";
echo 45+55;
echo "<br>";
echo 55+45;
echo "<br>";
echo "arrays-";
echo "<br>";
$number_list=array(123,345,678,124,"567","<h1>hello</h1>");
echo $number_list[2];
echo "<br>";
print_r($number_list);
echo "<br>";
echo "annonymous arrays-";
echo "<br>";
$names = array("first_name" => "Sumit","last_name"=>"Shukla");
echo "<br>";
echo $names["first_name" ]." ". $names["last_name"];
echo "<br>";
echo "if statements-";
echo"<br>";
if( 3>10){
    echo "you are wrong";
}
else if(3>4)
{
    echo " you are wrong again";
}
else{
    echo "you are right";
}
echo "<br>";
if(4 >= 4){
    echo "you are again right";
}
echo "<br>";
echo "switch statements-";
echo "<br>";
$qw=10;
switch($qw){
    case 1:
        echo "i";
    break;
    case 2:
        echo "am";
    break;
    case 3:
        echo "are";
    break;
    default :
    echo "value could not be found";
break;
}
echo "<br>";
echo "while loop-";
echo "<br>";
$counter=0;
while($counter <5){
    echo "hello student";
    echo "<br>";
    $counter=$counter+1;
}
echo "<br>";
echo "for loop-";
echo "<br>";
for($i=0;$i<5;$i++){
    echo "Hey there!"."<br>";
}
echo "<br>";
echo "for each loop-";
echo "<br>";
$numbersa=array(12,34,56,78,90);
foreach($numbersa as $numbera){
    echo $numbera . "<br>";
}
echo "<br>";
echo "funtions-";
echo "<br>";
function infit(){
    saysome();
    echo "<br>";
    cal();
}
function saysome(){
    echo "hello student, how's this class?";
}
function cal(){
    echo 123*5;
}
infit();
echo "<br>";
echo "function parameters-";
echo "<br>";
function calci($num1, $num2){
    $sum=$num1+$num2;
    echo $sum;
}
calci(1234,5678);
echo "<br>";
echo "return values from function-";
echo "<br>";
function multi($n1,$n2){
    $r=$n1*$n2;
    return $r;
}
$result=multi(12,5);
echo $result;
echo "<br>";
$result=100*$result;
echo $result;
echo "<br>";
echo "scope-";
echo "<br>";
$s="outside";
function scope(){
    global $s;
    $s="inside";
}
echo $s;
echo "<br>";
scope();
echo $s;
echo "<br>";
echo "constants";
echo "<br>";
$value=1000;
echo $value;
echo "<br>";
$value=5000;
echo $value;
echo "<br>";
define("name","sumit");
echo name;
echo "<br>";
echo "math functions-";
echo "<br>";
echo pow(2,7);
echo "<br>";
echo rand(1,1000);
echo "<br>";
echo sqrt(100);
echo "<br>";
echo ceil(4.6);
echo "<br>";
echo floor(4.4);
echo "<br>";
echo "form-";
echo "<br>";
?>
<form action="34_form_process.php" method="post">
<input type="text" name="username" placeholder="username">
<input type ="password" name="password" placeholder="password"><br>
<input type="submit" name="submit">
</form>





</body>
</html>