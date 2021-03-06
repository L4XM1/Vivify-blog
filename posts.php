<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Vivify Blog</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">


    <!-- Custom styles for this template -->
    <link href="styles/blog.css" rel="stylesheet">
    <link href="styles/styles.css" rel="stylesheet">
</head>

<body>
    <?php include_once('header.php'); ?>

    <main role="main" class="container">


        <div class="row">
            <div class="col-sm-10 blog-main">


                <?php


                include('sqlconnection.php');

                $sql = "SELECT id, title, body, author, created_at FROM posts ORDER BY created_at DESC";
                $statement = $connection->prepare($sql);
                $statement->execute(); //execute-uje upit
                $statement->setFetchMode(PDO::FETCH_ASSOC); //pretvara rez u asoc 
                $posts = $statement->fetchAll(); //cuva rez u var posts

                foreach ($posts as $post) {

                ?>
                    <div class="posts-wp">

                        <a href="single_post.php?id=<?php echo $post['id']; ?>">
                            <h3> <?php echo $post['title']; ?> </h3>
                        </a>
                        <p><?php echo ($post["body"]) ?> </p>
                        <div> <strong>Created at: </strong> <?php echo ($post['created_at']) ?> <strong>Author: </strong> <?php echo ($post['author']) ?>
                        </div>
                    </div>
                <?php
                };
                ?>
            </div><!-- /.blog-main -->


        </div><!-- /.row -->

    </main><!-- /.container -->

</body>


</html>