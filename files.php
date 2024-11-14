<?php
$html = '<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistemas</title>
</head>
<style>
    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

    main{
        width: 100vw;
        height: 100vh;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        gap:3px;
        padding: 50px;
        background-color: aquamarine;
    }

    .card {
        padding: 25px;
        background-color: aqua;
        border-radius: 15px;
    }
    
    .card:hover {

    }

    .card a {
        text-decoration: none;
        text-transform: uppercase;
    }
</style>
<body>
    <main>';

$aListaArquivos = array();
$path = "./";
$diretorio = dir($path);
while ($arquivo = $diretorio->read()) {
	//echo '<br> arquivo: ' . $arquivo;

    if(!is_dir($arquivo)){
        continue;
    }

	if($arquivo == '.' || $arquivo == '..' || $arquivo == '.git' || $arquivo == '.gitignore' || $arquivo == '.gitignore'
        || $arquivo == '.babelrc'
        || $arquivo == '.idea'
        || $arquivo == '.eslintrc'
        || $arquivo == '.prettierignore'
        || $arquivo == 'gulpfile.js'
        || $arquivo == 'node_modules'
        || $arquivo == 'public'
    ){
		continue;
	}

	$local = 'http://127.0.0.1:5500';

	// $link_atual = '<a href="' . $local . '/' . $arquivo .'/' . trim($arquivo) . '/index.html">' . $arquivo . '</a>';

    $link_atual = '<a href="' . $local . '/' . $arquivo .'/index.html">' . $arquivo . '</a>';

	$html .= ' <div class="card">
					' . $link_atual . '
				</div>';
}

$html .= '</main>
</body>
</html>';

echo $html;

file_put_contents("index.html", $html);


