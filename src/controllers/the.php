<?php 

////////////////////////////////////////
// Inclusion des dépendances si besoin /
////////////////////////////////////////

use App\Models\TeaModel;
// Inclusion du fichier d'autoload de Composer
//require MODELS_DIR . '/the_model.php';
if (!empty($_POST)) {


      $to      = 'simatovic.lucie@gmail.com';
      $expeditor= 'ffff';
      $subject = 'le sujet';
      $message = 'Bonjour !';
  
      mail($to, $subject, $message);
      $email = $_POST['email'];
      $password = $_POST['password'];
  
  }
// Récupération des articles
$teaModel = new TeaModel();
$posts = $teaModel->getAllPosts();

/////////////////////////////////////////////////////////////
// Affichage : inclusion du fichier de template 
render('the',[
      'posts' => $posts
       
]);

