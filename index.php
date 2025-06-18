<?php
$page = $_GET['page'];
if (!str_ends_with($page, '.md')) $page = $page . '.md';
$file = __DIR__ . '/' . $page;
if (!file_exists($file)) {
  http_response_code(404);
  exit;
}
$url = "$_SERVER[REQUEST_SCHEME]://$_SERVER[HTTP_HOST]";
?>
<!doctype html>
<html prefix='og: http://ogp.me/ns#' lang=en>
  <head>
    <meta charset=utf-8>
    <link rel=preconnect href='https://cdn.jsdelivr.net'>
    <link rel=modulepreload href='https://cdn.jsdelivr.net/npm/zero-md@3.1.7/dist/index.min.js?register' integrity='sha256-XxOZn90D/n1CuVD7d1vBiMWA/OEIGhhivMVXcP+tBMc=' crossorigin=anonymous>
    <link rel=preload as=style href='https://cdn.jsdelivr.net/npm/github-markdown-css@5/github-markdown.min.css' integrity='sha256-9ceV1Yf6v0056XqAI7b9LHdwGdklIebH5OfOEteEj9I=' crossorigin=anonymous>
    <meta http-equiv=X-UA-Compatible content='IE=edge'>
    <meta name=viewport content='width=device-width, initial-scale=1'>
    <meta name=description content='Markdown-to-html viewer - <?= $page ?>'>
    <meta property='og:type' content=website>
    <meta property='og:title' content='<?= $page ?>'>
    <meta property='og:url' content='<?= "$url$_SERVER[REQUEST_URI]" ?>'>
    <meta property='og:image' content='<?= "$url/markdown-logo.png" ?>'>
    <meta property='og:description' content='Markdown-to-html viewer'>
    <meta name='twitter:card' content=summary>
    <meta name='twitter:domain' content='<?= $_SERVER['HTTP_HOST'] ?>'>
    <title><?= $page ?></title>
    <script type=module src='https://cdn.jsdelivr.net/npm/zero-md@3.1.7/dist/index.min.js?register' integrity='sha256-XxOZn90D/n1CuVD7d1vBiMWA/OEIGhhivMVXcP+tBMc=' crossorigin=anonymous referrerpolicy=no-referrer></script>
    <link rel=stylesheet href=styles.css>
  </head>
  <body>
    <zero-md>
      <template>
        <!-- Default zero-md styles -->
        <!-- for CSP: sha256-TLHNbSJfSOsALTXShrghp8hQyuFRiT1QBYlDMfX1CVM= -->
        <style>
          :host { display: block; position: relative; contain: content; }
          :host([hidden]) { display: none; }
        </style>
        <link rel=stylesheet href='https://cdn.jsdelivr.net/npm/github-markdown-css@5/github-markdown.min.css' integrity='sha256-9ceV1Yf6v0056XqAI7b9LHdwGdklIebH5OfOEteEj9I=' crossorigin=anonymous referrerpolicy=no-referrer>
        <link rel=stylesheet href='https://cdn.jsdelivr.net/npm/@highlightjs/cdn-assets@11/styles/github.min.css' integrity='sha256-Oppd74ucMR5a5Dq96FxjEzGF7tTw2fZ/6ksAqDCM8GY=' crossorigin=anonymous referrerpolicy=no-referrer>
        <link rel=stylesheet media='(prefers-color-scheme:dark)' href='https://cdn.jsdelivr.net/npm/@highlightjs/cdn-assets@11/styles/github-dark.min.css' integrity='sha256-nyCNAiECsdDHrr/s2OQsp5l9XeY2ZJ0rMepjCT2AkBk=' crossorigin=anonymous referrerpolicy=no-referrer>
        <link rel=stylesheet href='https://cdn.jsdelivr.net/npm/katex@0/dist/katex.min.css' integrity='sha256-GQlRJzV+1tKf4KY6awAMkTqJ9/GWO3Zd03Fel8mFLnU=' crossorigin=anonymous referrerpolicy=no-referrer>
        <!-- Overrides -->
        <link rel=stylesheet href=styles.css>
      </template>
      <script type='text/markdown'>
<?= file_get_contents($file) ?>
      </script>
    </zero-md>
  </body>
</html>
