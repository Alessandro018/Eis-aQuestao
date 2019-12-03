<?php
Breadcrumbs::for('questoes', function ($trail) {
    $trail->push('Questões', action('QuestaoController@index'));
});
Breadcrumbs::for('breadcrumb', function ($trail) {
    $trail->parent('questoes');
    $trail->push('Editar questão');
});