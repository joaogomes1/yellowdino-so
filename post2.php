<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Clean Blog - Start Bootstrap Theme</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet"
        type="text/css" />
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800"
        rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <!-- valida function -->
    <script>
        const valida = () => {
            let comentario = document.getElementById("comentario").value;

            comentario = comentario.trim();
            if (comentario == "") {
                alert("Para enviar um comentário é necessário escrever um comentário.");
                return false;
            }
            return true;
        }
    </script>
</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="index.html">Yellow Dino Corp.</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="index.html">Home</a></li>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="post1.html">Inteligência
                            Artificial</a></li>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="post2.html">SQL Injection</a>
                    </li>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="about.html">Sobre</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Page Header-->
    <header class="masthead" style="background-image: url('assets/img/Sql.jpg')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="post-heading">
                        <h1>Saiba o que é SQL Injection</h1>
                        <h2 class="subheading">Um dos ataques mais comuns em sistemas web, realizado pelos hackers.</h2>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Post Content-->


    <article class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/jN8QGOxdhvM"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                    <p>Injeção SQL é um dos ataques mais comuns em sistemas web, realizado pelos hackers. O engraçado é
                        que se proteger desse tipo de vulnerabilidade não é complicado. Por isso esse vídeo é importante
                        para todo tipo de desenvolvedor, do júnior ao sênior. Fizemos questão de mostrar algumas das
                        formas mais comuns de se fazer esse tipo de ataque para todos verem como o SQLi é perigoso de
                        verdade.</p>
                    <h5>Links citados no vídeo:</h5>
                    <p>1. <a href="https://youtu.be/snOXxJa31GI" style="text-decoration:none">ORM</a><br>
                        2. <a href="https://youtu.be/kMznyI7r2Tc" style="text-decoration:none">SQL</a></p>

                    <form action="enviarComentario.php" method="post" onsubmit="return valida();">
                        <input type="hidden" name="post_id" value="2">
                        <h5>Gostou do conteúdo?</h5>
                        <label for="comentario">Deixe seu comentário:</label><br>
                        <textarea name="comentario" id="comentario" placeholder="Escreva seu comentário..." rows="6"
                            cols="20" maxlength="1000" style="width: 100%;" required></textarea>
                        <br>
                        <input type="submit" name="ctl00$Content$EnviarComentario" value="Enviar">
                    </form>

                </div>
            </div>
        </div>
    </article>

    <!-- Comments section -->
    <div id="divComentarios">
        <?php

        require("db.php");
        $query = "SELECT comment FROM COMMENT WHERE FK_id_art = 2 ORDER BY id DESC;";
        $dataset = mysqli_query($conn, $sql);
        if (!$dataset) {
            echo("<h1>Ocorreu um erro ao carregar os comentários. Tente recarregar a página.</h1>");
        } elseif (mysqli_num_rows($dataset) == 0) {
            echo("<h1>Parece que ainda não há comentários! Seja o primeiro a comentar.</h1>");
        } else {
            while ($linha = mysqli_fetch_assoc($dataset)) {
                echo("<h2>Anônimo</h2> <br>")
                echo("<h3>" . $linha["comment"] . "</h3>")
            }
        }

        ?>
    </div>

    <!-- Footer-->
    <footer class="border-top">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="small text-center text-muted fst-italic">Yellow Dino Corp. 2022</div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>