<?php
include('bootstrap.php');






see($mydatabase->execute("INSERT INTO info(name,address,contact,city) VALUES('sonia','mayur colony','987328783','ramnagar')"));


see($mydatabase->execute("update info set date_of_birth=1984  where name='atit'"));

see($mydatabase->execute("delete from info where stu_id=4"));


see($mydatabase->execute("select * from info",'info'));


$mysession = new Session();

$mysession->push('user','ektasharma');
$mysession->push('first','myfirst');
$mysession->push('second','mysecond');
$mysession->push('third','mythird');


see($mysession->pull('user'));
see($mysession->pull('first'));
see($mysession->pull('second'));
see($mysession->pull('third'));



$mysession->delete('second' );


see($mysession->pull('second'));






//$controller = $_GET['controller'];
//
//switch ($controller) {
//    case 'customer':
//        break;
//    default:
//        include ('views/index.php');
//        break;
//}