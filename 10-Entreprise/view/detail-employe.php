<!-- <?php echo '<pre>'; print_r($data); echo '</pre>'; ?> -->


<div class="container text-center">
    <div class="card mt-4" style="width: 18rem; margin: 0 auto;">
        <img src="https://picsum.photos/id/1011/200/150" alt="photo de l'employé" class="card-img-top">
        <div class="card-body">
            <h5 class="card-title"><?= $data['prenom'] . ' ' . $data['nom'] ?></h5>
            <ul style="list-style: none;">
                <li>Id_employé : <?= $data['id_employes'] ?></li>
                <li>Sexe : <?= $data['sexe'] ?></li>
                <li>Service : <?= $data['service'] ?></li>
                <li>Date embauche : <?= $data['date_embauche'] ?></li>
                <li>Salaire : <?= $data['salaire'] . ' €' ?></li>
            </ul>
            <a href="?op=delete&id=<?= $data[$id] ?>" class="btn btn-danger mt-4" onclick="return(confirm('Vous êtes sur le point de supprimer cet employé. En êtes vous certain ?'))">Supprimer</a>
        </div>
    </div>

    <div class="container text-center mt-4">
        <a href="http://localhost/phpoo/10-Entreprise/" class="btn btn-primary mt-4">Retour au tableau des employés</a>
    </div>

</div>

<!-- 
1011
1005 -->