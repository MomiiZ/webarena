<html>
<head>
    <meta charset="utf-8"/>    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Web Arena </title>
</head>


 <body class="home">
    <div class="container">
        <div class="jumbotron">
          <h1>Bienvenue sur Web Arena</h1>
          <p>Web Arena est un jeu de rôle créé dans le cadre de notre formation sur CakePHP à l'ECE Paris par Julien Falconnet</p>
          <p>
              <!-- Lien Inscription -->
<?php
if (!is_null($this->request->session()->read('Auth.User.email'))) {
   // user is logged 
   echo $this->Html->link(
        'Logout',
        array('controller' => 'Arenas', 'action' => 'logout'),
        ['class' => 'button']
            ); 
} else {
   // the user is not logged in
    echo $this->Html->link(
        'Login',
        array('controller' => 'Arenas', 'action' => 'login'),
        ['class' => 'button']
            );
    
    
    echo $this->Html->link(
        'Sign Up',
        array('controller' => 'Arenas', 'action' => 'add'),
        ['class' => 'button']
            );
    
}
    
?>
         </p>
      </div>
        <div class="page-header">
        <h1>Règles du jeu</h1>
        </div>
    <ul>
        <li>
            Un combattant se trouve dans une arène en damier à une position X,Y. Cette position ne peut pas se trouver hors des dimension de l'arène. Un seul combattant par case. Une arène par site.
        </li>
        <li>
            Un combattant commence avec les caractéristiques suivantes : vue= 2, force=1, point de vie=5 (ces valeurs doivent être paramétrées). Il apparaît à une position libre aléatoire.
        </li>
        <li>
            Constantes paramétrées et valeurs de livraison : largeur (x) de l'arène (15), longueur (y) de l'arène (10) (ces valeurs doivent être paramétrées dans un modèle).
        </li>
        <li>
            La caractéristique de vue détermine à quelle distance (de Manhattan = x+y) un combattant peut voir. Ainsi seuls les combattants et les éléments du décor à portée sont affichés sur la page concernée. 0 correspond à la case courante.
        </li>
        <li>
            La caractéristique de force détermine combien de point de vie perd son adversaire quand le combattant réussit son action d'attaque...
        </li>
        <li>
            Lorsque le combattant voit ses points de vie atteindre 0, il est retiré du jeu. Un joueur dont le combattant a été retiré du jeu est invité à en recréer un nouveau.
        </li>
        <li>
            Une action d'attaque réussit si une valeur aléatoire entre 1 et 20 (d20) est supérieur à un seuil calculé comme suit : 10 + niveau de l'attaqué - niveau de l'attaquant.
        </li>
        <li>
            Progression : à chaque attaque réussie le combattant gagne 1 point d'expérience. Si l'attaque tue l'adversaire, le combattant gagne en plus autant de points d'expériences que le niveau de l'adversaire vaincu. Tous les 4 points d'expériences, le combattant change de niveau et peut choisir d'augmenter une de ses caractéristiques : vue +1 ou force+1 ou point de vie+3. En cas de progression, les points de vie maximaux augmentent ET les points de vie courants remontent au maximum.
        </li>
        <li>
            En pratique, on incrémentera le niveau que lorsqu'une augmentation sera prise, et on utilisera (xp/4) - niveau pour savoir s'il reste des augmentations à prendre. Le niveau commence et les points d'expérience commencent à 0.
        </li>
        <li>
            Chaque action provoque la création d'un événement avec une description claire. Par exemple : « jonh attaque bill et le touche ».
        </li>
    </ul>
    <div class="page-header">
        <h1>Options choisies</h1>
    </div>
    <ul>
        <li>
            <h3>Option A : Gestion avancée des combattants et de leur équipement<small> - amélioration</small></h3>
            <p>Un joueur doit pouvoir avoir plusieurs combattants. Une page particulière lui permet de choisir lequel il joue.</p>
            <p>Le système doit pouvoir gérer une nouvelle catégorie d'objets : les pièces d'équipements. Ces pièces doivent pouvoir se trouver dans l'arène, une action ramasser permet de les équiper. Chaque pièce augmente une caractéristique (l'équivalent de une à trois progression) quand elle est portée.</p>
        </li>

        <li>
            <h3>Option G : Utilisation d'une connexion externe Google/Facebook<small> - bibliothèque externe</small></h3>
            <p>Permettre aux utilisateurs de se connecter avec leur compte facebook</p>
        </li>
    </ul>
    
</div>
</body>

</html>
