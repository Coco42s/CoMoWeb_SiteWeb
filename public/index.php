<?php 
require '../vendor/autoload.php';
$router = new AltoRouter;

$router->map('GET', '/', 'views/home/home', 'home', 'home');
$router->map('GET|POST', '/projects', 'views/projects/projects', 'projects', 'projects');
$router->map('GET', '/download', 'views/download/download', 'download', 'download');
$router->map('GET', '/contact', 'views/contact/contact', 'contact', 'contact');
$match = $router->match();


if ($match === false){
    require "../resources/views/error/404.php";
    require "../resources/template/template.php";

} elseif ($match['target'] === 'views/projects/projects') {
    $params = $match['params'];
    $active_name = $match['name'];
    require "../src/project_require.php";
    require "../resources/{$match['target']}.php";
    require "../resources/template/template.php";

} elseif ($match['target'] === 'views/download/download') {
    $params = $match['params'];
    $active_name = $match['name'];
    require "../src/download_require.php";
    require "../resources/{$match['target']}.php";
    require "../resources/template/template.php";

} elseif ($match !== null) {
    if (is_callable($match['target'])) {
        call_user_fonc_array($match['target'], $match['params']);
    } else {
        $params = $match['params'];
        $active_name = $match['name'];
        require "../resources/{$match['target']}.php";
        require "../resources/template/template.php";
    }

} else {
    require "../resources/views/error/404.php";
}

//var_dump($match);

?>