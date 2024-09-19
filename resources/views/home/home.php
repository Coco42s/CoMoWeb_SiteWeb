<?php ob_start(); ?>
<head>
    <meta name="msvalidate.01" content="090209CF9028CC9FE9EFE3A324BFA3CB" />
    <meta name="description" content="Ici sont mes project que j'ai créé au fil des années !!">
    <script type="application/ld+json">
    {
      "@context" : "https://schema.org",
      "@type" : "WebSite",
      "name" : "CoMoWeb",
      "url" : "https://comoweb.fr/"
    }
  </script>
</head>
<?php echo 'Vous savez, votre adresse IP est ' . $_SERVER['REMOTE_ADDR'] . ' ?';?> 





<?php 
$content = ob_get_clean();
//require_once "php/template.php";
?>
