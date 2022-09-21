<?php
$host='localhost';
$user = 'root';
$password = 'root';
$dbname = 'pdoposts';
//set DSN(data source name)

$dsn = 'mysql:host='.$host.';dbname='.$dbname;

//create pdo instance

$pdo=new PDO($dsn,$user,$password);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
// $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);


#PDO query

// $stmt=$pdo->query('SELECT * FROM posts');

// while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
//     echo $row ['title'] . "<br>";
// }

// here the fetch style is default which what we definded previously at line 13


// while($row=$stmt->fetch()){
//     echo $row->title . "<br>";
// }
#Prepared statments (prepare & execute)

//UNSAFE

// $sql = "SELECT * FROM posts WHERE author = '$author'";

//FETCH MULTIPLE POSTS

// user input

$author = 'jafar';
$is_published = true;
$id = 1;


//Positinal Params

// $sql = "SELECT * FROM posts WHERE author = ?";
// $stmt = $pdo-> prepare($sql);
// $stmt->execute([$author]);
// $posts = $stmt->fetchAll();

// var_dump($posts);



// $sql = "SELECT * FROM posts WHERE author = :author && is_published = :is_published";
// $stmt = $pdo-> prepare($sql);
// $stmt->execute(['author'=>$author ,  'is_published'=>$is_published]);
// $posts = $stmt->fetchAll();


// foreach($posts as $post){
//     echo $post->title . '<br>';
// }


//FETCH SINGLE POST


// $sql = "SELECT * FROM posts WHERE id = :id";
// $stmt = $pdo-> prepare($sql);
// $stmt->execute(['id'=>$id]);
// $posts = $stmt->fetch();

// echo $posts->body;

//GET ROW COUNT
// $stmt = $pdo-> prepare('SELECT * FROM POSTS WHERE author = ?');
// $stmt->execute([$author]);
// $postCount = $stmt->rowCount();

// echo $postCount;    

// INSERT DATA
// $title='Post Five';
// $body = 'This is Post Five';
// $author = 'Ahmad';

// $sql= 'INSERT INTO posts(title, body, author) VALUES (:title, :body, :author)';
// $stmt = $pdo-> prepare($sql);
// $stmt->execute(['title'=>$title, 'body'=>$body, 'author'=>$author]);

// echo 'Post Added';


//UPDATE DATA

$id=1;
$body = 'This is the updated Post';

$sql= 'UPDATE  posts SET body = :body WHERE id = :id';
$stmt = $pdo-> prepare($sql);
$stmt->execute(['id'=>$id, 'body'=>$body]);

echo 'Post Updated';



//DELETE



// $id=3;

// $sql= 'DELETE FROM posts WHERE id = :id';
// $stmt = $pdo-> prepare($sql);
// $stmt->execute(['id'=>$id]);

// echo 'Post DELETED';

//SEARCH DATA
// $search = "%f%";  //thats mean search for every post where their title contains the character f


// $sql = 'SELECT * FROM posts WHERE title LIKE ?';
// $stmt = $pdo-> prepare($sql);
// $stmt->execute([$search]);
// $posts = $stmt->fetchAll();

// foreach($posts as $post) {
//     echo $post->title . '<br>';
// }