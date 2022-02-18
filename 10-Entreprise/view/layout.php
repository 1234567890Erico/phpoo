<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Entreprise</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark" style="background: #7952B3;">
        <div class="container-fluid">
            <a class="navbar-brand" href="http://localhost/phpoo/10-Entreprise/">Entreprise</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="http://localhost/phpoo/10-Entreprise/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?op=add">Create</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <h2 class="text-center mt-4"><?= $title; ?></h2>
    <div class="alert alert-info text-center" role="alert"><?= $message; ?></div>

    <?php
        if(!empty($alert))
        {
            // Affichage de la variable $alert si elle contient une alert
            echo '<div class="alert alert-success text-center">';
            echo $alert;
            echo '</div>';
        }
    ?>

    <div class="container mt-4 mb-4" style="min-height: 630px;">
        <!-- affichage des templates stockés dans la variable $content définit dans la méthode render() du Controller -->
        <?= $content; ?>
    </div>


    <footer class="jumbotron" style="min-height: 60px; background: #7952B3;">

    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>
</html>