<?php
require 'vendor/autoload.php';
/**
 * @param int $id id of an article
 * @param array $articles array containing articles
 * @return bool|array the function returns false if the article is not found or the article itself if it is found
 */
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

function articleExists(int $id, array $articles): bool {
    foreach ($articles as $article) {
        if ($article['id'] === $id) {
            return $article;
        }
    }

    return false;
}