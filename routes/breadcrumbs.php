<?php
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Questões', action('QuestaoController@index'));
});
Breadcrumbs::for('questoes', function ($trail) {
    $trail->parent('home');
    $trail->push('Editar questão', action('HomeController@index'));
});