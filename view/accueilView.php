<?php $title = 'Le Local'; ?>

<?php ob_start(); ?>
<header class="headerMain">
    <a href="Accueil"><h1 class="logo">Le local</h1></a>
    <nav id="nav">
        <div class="lienNav">
            <a href="#realisation">Réalisation</a>
            <a href="#àPropos">À Propos</a>
            <a href="#collaboration">Collab/Events</a>
            <a href="#rendezVous">Rendez-Vous</a>
            <a href="Shop" id="boutonShop">Shop</a>
        </div>
    </nav>
    <button id="bouttonMenu">≡</button>
</header>

<main>
    <section id="acceuil">
        <img src="public/images/logo.jpg" alt="logo du site" class="LogoHeader">
        <div class="reseau"><!-- réseau -->
            <a href="https://www.facebook.com"><i class="fab fa-facebook-f"></i></a>
            <a href="https://www.twitter.com"><i class="fab fa-twitter"></i></a>
            <a href="https://www.instagram.com"><i class="fab fa-instagram"></i></a>
        </div>
    </section>

    <section id='realisation'> <!-- page 2 défilement photo et vente -->
        <h2>Réalisation</h2>   
        <div id="slider">
            <img src="public/images/slider/slider-1.jpeg" id="backSlide" alt="image slide">
            <img src="public/images/slider/slider-2.jpeg" id="slide" alt="image slide">
            <img src="public/images/slider/slider-3.jpeg" id="nextSlide" alt="image slide">
            <button id="sliderSuivant"><i class="fas fa-chevron-right"></i></button>
            <button id="sliderPrecedent"><i class="fas fa-chevron-left"></i></button>
        </div>
    </section>

    <section id="àPropos">
        <div>
            <h3>À Propos</h3>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis at asperiores temporibus fugiat ad ab eveniet odit adipisci,
                    provident doloribus exercitationem consectetur ducimus atque voluptatibus aliquam maiores, deserunt pariatur enim excepturi illum
                    necessitatibus quas quidem quo. Delectus pariatur ad distinctio veniam asperiores itaque, illum aliquid dignissimos neque ducimus quis ut!
            </p>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis at asperiores temporibus fugiat ad ab eveniet odit adipisci,
                    provident doloribus exercitationem consectetur ducimus atque voluptatibus aliquam maiores, deserunt pariatur enim excepturi illum
                    necessitatibus quas quidem quo. Delectus pariatur ad distinctio veniam asperiores itaque, illum aliquid dignissimos neque ducimus quis ut!
            </p>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis at asperiores temporibus fugiat ad ab eveniet odit adipisci,
                    provident doloribus exercitationem consectetur ducimus atque voluptatibus aliquam maiores, deserunt pariatur enim excepturi illum
                    necessitatibus quas quidem quo. Delectus pariatur ad distinctio veniam asperiores itaque, illum aliquid dignissimos neque ducimus quis ut!
            </p>
        </div>
    </section>

    <!-- <section id="collaboration">
        <section>
            <div class="colabDate">
                <h2>10/08/2020</h2>
                <img src="public/images/contact-bg.jpg" alt="Image Evénement">
            </div>
            <div class="colabDescription">
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Velit at cumque delectus. Nihil illo delectus aperiam doloribus aliquid nemo officia.</p>
            </div>
        </section>
    </section> -->

    <section id="collaboration">
        <h2>Collaboration et évènement</h2>
        <article id="collabSlider">
            <ul>
                <li><div id="li1" class="liAll" onclick="ChangeSlide(1)"><i class="fas fa-align-left"></i> Événement 1 </div></li>
                <li><div id="li2" class="liAll" onclick="ChangeSlide(2)"><i class="fas fa-align-left"></i> Événement 2 </div></li>
                <li><div id="li3" class="liAll" onclick="ChangeSlide(3)"><i class="fas fa-align-left"></i> Événement 3 </div></li>
                <li><div id="li4" class="liAll" onclick="ChangeSlide(4)"><i class="fas fa-align-left"></i> Événement 4 </div></li>
            </ul>
            <div>  
                <img src="public/images/training-image-01.jpg" alt="image du slider" id='collabSlide'>
            
                <h3>Lorem ipsum dolor sit amet consectetur adipisicing elit.</h3>
                <p>
                    Fusce laoreet malesuada rhoncus. Donec ultricies diam tortor, id auctor neque posuere sit amet. Aliquam pharetra, augue vel cursus porta, nisi tortor 
                    vulputate sapien, id scelerisque felis magna id felis. Proin neque metus, pellentesque pharetra semper vel, accumsan a neque.
                </p>
                <button>Voir plus</button>
            </div>
        </article>
    </section>
                
    <section id='rendezVous'> <!-- page 5 formulaire + adresse + plan -->
        <div class="contact">
            <div class="map">
                <iframe src="https://maps.google.com/maps?q=Av.+L%C3%BAcio+Costa,+Rio+de+Janeiro+-+RJ,+Brazil&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed" ></iframe>
            </div>
        </div>
        <div class="formulaire contact">
            <form method="post">
                <input class="inputMail" type="text" placeholder="Nom*">
                <input class="inputMail" name="email" type="email" placeholder="Email*">
                <input class="subjectMail" type="text" placeholder="Sujet">
                <textarea name="message" rows="10"></textarea>
                <input type="submit">
            </form>
            <?php
            if (isset($_POST['message'])) {
                $position_arobase = strpos($_POST['email'], '@');
                if ($position_arobase === false)
                    echo '<p>Votre email doit comporter un arobase.</p>';
                else {
                    $retour = mail('guillaumejujupicard@gmail.com', 'Envoi depuis la page Contact', $_POST['message'], 'From: ' . $_POST['email']);
                    if($retour)
                        echo '<p>Votre message a été envoyé.</p>';
                    else
                        echo '<p>Erreur.</p>';
                }
            }
            ?>
        </div>
    </section>
</main>

<footer>
    <p>No Cookies 🍪 © tout droit réservé: Le Local</p>
</footer>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>