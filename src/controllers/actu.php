<?php 

////////////////////////////////////////
// Inclusion des dépendances si besoin /
////////////////////////////////////////

render('actu',[
    'news' => (new \App\Models\NewsModel())->getAllNews(),
    'categories' => (new \App\Models\CategoryNews())->getAllNewsCategories()
]);