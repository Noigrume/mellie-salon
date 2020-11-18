<?php

// Import des classes
//use App\Core\ImageFileUploader;
// Si l'utilisateur n'est pas connecté
if (!isAuthenticated()) {
    header('Location: ' . buildUrl('/admin/login'));
    exit;
}

// Initialisation de la variable $error qui contiendra le cas échéant un message d'erreur
$error = null;


// Si le formulaire est soumis 
if (!empty($_POST)) {

    try {

        //   $userId = getUserSessionId();
        $title = $_POST['name'];
        //  $extensionId = $_POST['extension'];
        $playerId = $_POST['player'];
        $max_playerId = $_POST['player_max'];

        $min_time = $_POST['time'];
        $max_time = $_POST['time_max'];
        // Insertion du temps en BDD
        $timeModel = new \App\Models\TimeModel();
        $time = $timeModel->insertTime($min_time, $max_time);

        $test = new \App\Models\TimeModel();
        $timeId = $test->lastTimeId();
        var_dump($title);

        $difficultyId = $_POST['difficulty'];
        $max_difficultyId = $_POST['difficulty_max'];
        $age = $_POST['age'];



        // Insertion de l'article en BDD
        $postModel = new \App\Models\GameModel();
        $postId = $postModel->insertGame($title, $extensionId, $playerId, $max_playerId, $timeId, $difficultyId, $max_difficultyId, $age);



        // Message flash de confirmation
        //  addFlashMessage('Article ajouté.');

        header('Location: ' . buildUrl('/admin'));
        exit;
    } catch (Exception $exception) {
        $error = $exception->getMessage();
    }
}

$difficultyModel = new \App\Models\DifficultyModel();
$difficulties = $difficultyModel->getAllDifficulty();

$difficultyMaxModel = new \App\Models\DifficultyMaxModel();
$difficultiesMax = $difficultyMaxModel->getAllMaxDifficulty();

$playerMaxModel = new \App\Models\PlayerMaxModel();
$playersMax = $playerMaxModel->getAllPlayerMaxModel();

$playerModel = new \App\Models\PlayerModel();
$players = $playerModel->getAllPlayer();

render('admin/add_game', [
    'difficulties' => $difficulties,
    'difficultiesMax' => $difficultiesMax,
    'players' => $players,
    'playersMax' => $playersMax,
    'error' => $error
]);
