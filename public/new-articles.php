<?php
// activation du système d'autoloading de Composer
require __DIR__.'/../vendor/autoload.php';

// instanciation du chargeur de templates
$loader = new \Twig\Loader\FilesystemLoader(__DIR__.'/../templates');

// instanciation du moteur de template
$twig = new \Twig\Environment($loader, [
    // activation du mode debug
    'debug' => true,
    // activation du mode de variables strictes
    'strict_variables' => true,
]);

// chargement de l'extension Twig_Extension_Debug
$twig->addExtension(new \Twig\Extension\DebugExtension());

$articles = require __DIR__.'/articles-data.php';

// champ nom
if (!isset($_POST['name']) || empty($_POST['name'])) {
    $errors['form'] = true;
    $messages['form'] = 'Veuillez remplir correctement le champ';
}
elseif (strlen($_POST['name']) < 2){
    $errors['form'] = true;
    $messages['form'] = 'Veuillez remplir correctement le champ';
}
elseif (strlen($_POST['name']) > 100){
    $errors['form'] = true;
    $messages['form'] = 'Veuillez remplir correctement le champ';
} 

//champ description
if (!isset($_POST['description']) || empty($_POST['descriptione'])) {
    $errors['form'] = true;
    $messages['form'] = 'Veuillez remplir correctement le champ';
}

//champ prix
if (!isset($_POST['price']) || empty($_POST['price'])) {
    $errors['form'] = true;
    $messages['form'] = 'Veuillez remplir correctement le champ';
}
elseif(!is_numeric($_POST['price'])){
    $errors['form'] = true;
    $messages['form'] = 'Veuillez remplir correctement le champ';
}

//champ quantité
if (!isset($_POST['quantity']) || empty($_POST['quantity'])) {
    $errors['form'] = true;
    $messages['form'] = 'Veuillez remplir correctement le champ';
}
elseif(!is_numeric($_POST['quantity'])){
    $errors['form'] = true;
    $messages['form'] = 'Veuillez remplir correctement le champ';
}
elseif(!is_int($_POST['quantity'])){
    $errors['form'] = true;
    $messages['form'] = 'Veuillez remplir correctement le champ';
}

$url = 'articles.php';
    header("Location: {$url}", true, 302);
    exit();

