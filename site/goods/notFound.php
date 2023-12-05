<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>
<style>
    body {
        background-image: url('../../content/images/img-site/notFound.png');
        background-size: 100% 160%;
    }

    .box-fuond {
        text-align: center;
        margin-top: 20%;
    }

    .title-Found {
        font-size: 70px;
        color: #97fcfe;
        font-weight: 700;
        text-shadow: 5px 5px 0px #01000a;
    }

    .span-Found {
        font-size: 26px;
        font-weight: 700;
        color: #e41212;
        text-shadow: 2px 2px 0px white;
    }

    .box-found {
        text-shadow: 2px 2px 2px black;
        width: 110px;
        height: 50px;
        font-size: 20px;
        color: #1fdef9;
        font-weight: 600;
        border-radius: 10px;
        border: #97fcfe;
        cursor: pointer;
        background-color: #fffd7a;
    }
</style>

<body>

    <div class="box-fuond">
        <h1 class="title-Found">404 Not Found</h1>
        <p class="span-Found">The requested product does not exist!</p>
        <form action="listed.php?continue_shopping" method="POST">
            <button type="submit" class="box-found"> <i class="fa-solid fa-backward"></i> Store</button>
        </form>
    </div>

</body>

</html>