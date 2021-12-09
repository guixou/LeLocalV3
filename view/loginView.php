<?php $title = 'Le Local Admin'; ?>

<?php ob_start();?>

<main>
    <div class="login">  
        <form class="formulaire" action="controller/loginTraitement.php" method="post">
            <h1>Page de connexion</h1> 
                <div>
                    <input type="email" id="email" name="email" placeholder="name@example.com">
                    <label for="email">Email</label>
                </div>
                <div>
                    <input type="password" id="password" name="password" placeholder="Password">
                    <label for="password">Mot de passe</label>
                </div>
                <button type="submit">Valider</button>
        </form>
    </div>
</main>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>