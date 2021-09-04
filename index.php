<?php
    $host = 'localhost';
    $user = 'root';
    $password ='';
    $dbname = 'pdoposts';

    //SET DSN (DATA SOURCE NAME)
    $dsn = 'mysql:host='. $host .';dbname='. $dbname;

    //Create a pdo instance
    $pdo = new PDO($dsn, $user, $password);
    //setting default PDO fetch attribute
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,FALSE);

    #PDO QUERY

    //$stmt = $pdo->query('SELECT * FROM posts');

    // while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    //     echo $row['title'] . '<br>';   
    // }

    // while($row = $stmt->fetch()){
    //     echo  $row->title . '<br>';
    // }
        #PREPARED STATEMENTS (prepare & execute)
    
        //UNSAFE
    //prepared stmts seperates the instruction / query from actual data
    //$sql = "SELECT * FROM posts WHERE author ='$author'";
     
    //FETCH MULTIPLE POSTS

    //User Input
    $author ='brad';
    $is_published = true;
    $limit = 1;
    //Positional Params uses ? //LIMIT 1 at the end of the query or declare a variable as done above
    //disable emulation mode which is the default if LIMIT  doesnt work, after setting ATTR_EMULATE_PREPARES, now you can use prepare statement for limits 
    //thereby changing the default placeholder to what u have in ur prepared statement
    $sql = 'SELECT * FROM posts WHERE author = ? && is_published = ? LIMIT ?';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$author, $is_published, $limit]);
    $posts = $stmt->fetchAll();

    //var_dump($posts);
    // foreach($posts as $post){
    //     echo $post->title . '<br>';
    // }


    #2 NAME params
    // $sql = 'SELECT * FROM posts WHERE author = :author && is_published =:is_published';
    // $stmt = $pdo->prepare($sql);
    // $stmt->execute(['author' => $author, 'is_published' => $is_published]);
    // $posts = $stmt->fetchAll();

    foreach($posts as $post){
        echo $post->title . '<br>';
    }

    //$id = 1;
    
    # FETCH SINGLE POSTS, use fetch()for one record not fetchAll
    // $sql = 'SELECT * FROM posts WHERE id = :id';
    // $stmt = $pdo->prepare($sql);
    // $stmt->execute(['id' => $id]);
    // $post = $stmt->fetch();

    // echo $post->body;

    #GET ROW COUNT

    // $stmt= $pdo->prepare('SELECT * FROM POSTS WHERE author = ?');
    // $stmt->execute([$author]);
    // $postCount = $stmt->rowCount();

    // echo $postCount;
    // INSERT DATA 
    // $title = 'Post Five';
    // $body = 'This is Post Five';
    // $author = 'Ayo';

    // $sql = 'INSERT into posts(title, body, author) VALUES(:title, :body, :author)';
    // $stmt = $pdo->prepare($sql);  
    // $stmt->execute(['title' => $title, 'body' => $body, 'author' => $author]);
    // echo 'Post Added';

    #UPDATE DATA
    //$title = 'Post Five';
    // $id = 1;
    // $body = 'This is the updated Post';
    // //$author = 'Ayo';

    // $sql = 'UPDATE  posts set body = :body WHERE id = :id';
    // $stmt = $pdo->prepare($sql);  
    // $stmt->execute(['body' => $body, 'id' => $id]);
    // echo 'Post Updated';


    #DELETE DATA
    // $id = 3;
    // $body = 'This is the updated Post';
    // //$author = 'Ayo';

    // $sql = 'DELETE FROM posts WHERE id = :id';
    // $stmt = $pdo->prepare($sql);  
    // $stmt->execute(['id' => $id]);
    // echo 'Post Deleted';

    #SEARCH DATA result returns fou r and five
    // $search = "%f%";
    // $sql = 'SELECT * FROM posts where title LIKE ?';
    // $stmt = $pdo->prepare($sql);
    // $stmt->execute([$search]);
    // $posts = $stmt->fetchAll();

    // foreach($posts as $post){
    //     echo $post->title . '<br>';
    // }


?>

    <!-- <h1><?php echo $post->body; ?></h1> -->
    