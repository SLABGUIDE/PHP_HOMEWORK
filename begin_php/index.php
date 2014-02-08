<?php
$entry = array(
    'title' => 'Sample Title',
    'date' => 'January 21th, 2014',
    'author' => 'Jason',
    'body' => 'Today, I wrote a blog entry');

echo $entry['title'], " ";
echo $entry['date'], " ";
echo $entry['author'], " ";
echo $entry['body'], " ";
echo '<br>', "This entry's author is " . $entry['author'];

$person = array('John', '23');
echo '<br>', "The age of " . $person[0] . " is " . $person[1];

$people = array(
    array('name' => 'Jason', 'age' => 23),
    array('name' => 'Mary', 'age' => 33)
);
echo '<br>', $people[0]['name'] . " has a sister who is " . $people[1]['age'] . " years old";

$colors = array(
    'fruit' => array('apple' => 'red', 'banana' => 'yellow'),
    'flowers' => array('rose' => 'red', 'violet' => 'purple')
);
echo '<br>', "An apple is " . $colors['fruit']['apple'] . " and a violet is " . $colors['flowers']['violet'];

foreach ($colors['fruit'] as $key => $value) {
    echo '<br>', "The key $key and the value $value";
}

foreach ($colors as $category => $item) {
    foreach ($item as $key => $value) {
        echo '<br>', "$category - $key - $value";
    }
}

echo '<br>', "hello, ", "world";

$price_1 = 0.25;
$price_2 = 3.55;
$total = $price_1 + $price_2;
echo '<br>', "the price is $total €";
echo '<br>';
printf("the price is %.2f €", $total);

echo '<br>';
print_r($person);
$age = & $person[1];
++$age;
echo '<br>';
print_r($person);

$ctr = false;
if ($ctr == false) {
    echo '<br>' . 'values are equal';
}
if ($ctr !== 0) {
    echo '<br>' . 'values are not identical';
}

// error suppression
@include_once 'fake_file.php';

$var = 0;

include 'include_01.php';
echo '<br>', "include is $var";
include 'include_01.php';
echo '<br>', "include is $var";

include_once 'include_01.php';
echo '<br>', "include_once is $var";
include_once 'include_01.php';
echo '<br>', "include_once is $var";

?>

<?php

function greet($time)
{
    if ($time < 12)
        return "good morning!";
    elseif ($time < 18)
        return "good afternoon!";
    else
        return "good night!";
}

echo '<br>', greet(14);

$foo = "some value";

// $bar variable is not declared
error_reporting(E_ALL);
//error_reporting(null);
echo '<br>', "index.php : wtf is $wtf";
include 'include_02.php';
echo '<br>', "index.php : wtf is $wtf";
$bar = "another value";
include 'include_02.php';
echo '<br>', "index.php : foo is $foo, and bar is $bar";
?>

<?php
error_reporting(E_ALL);

$lol = "I'm outside the function";

function test()
{
//    global $lol;
//    return $lol;
    return $GLOBALS['lol'];
}

echo '<br>', test();

function tost()
{
    $foo = "Value One";
    $bar = "Value Two";

    return array($foo, $bar);
}

list($one, $two) = tost();
echo '<br>', $one . " and " . $two;

//foreach ($_SERVER as $key => $value) {
//    echo '<br>', "$key = $value";
//}
//
//echo '<br>', '<br>';
//
//if (isset($_SERVER['HTTP_REFERER'])) {
//    echo $_SERVER['HTTP_REFERER'];
//} else {
//    echo "no referer set!";
//}

$foo = "This is a complex value & it needs to be URL-encoded.";
$bar = urlencode($foo);
echo '<br>', $foo;
echo '<br>', $bar;
echo '<br>', urldecode($bar);

echo '<br>', "url value var1 = ", $_GET['var1'];
echo '<br>', "url value var2 = ", $_GET['var2'];

$foo = <<<EOD
<ul id="menu">
<li> <a href="{$_SERVER['PHP_SELF']}">HOME</a> </li>
<li> <a href="{$_SERVER['PHP_SELF']}?page=about">ABOUT</a> </li>
<li> <a href="{$_SERVER['PHP_SELF']}?page=contact">CONTACT</a> </li>
</ul>
EOD;

echo '<br>', $foo;

if (isset($_GET['page'])) {
    $page = htmlentities($_GET['page']);
} else {
    $page = NULL;
}
switch ($page) {
    case 'about':
        echo "<h1>ABOUT</h1>
              <p>WE ROCK!!!</p>";
        break;
    case 'contact':
        echo "<h1>CONTACT</h1>
              <p>SEND E-MAIL</p>";
        break;
    default:
        echo "<h1>SELECT PAGE</h1>
              <p>HELLO!!!</p>";
        break;
}
