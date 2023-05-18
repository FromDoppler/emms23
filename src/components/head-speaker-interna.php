<?php
require_once('././config.php');
require_once('./utils/DB.php');

$db = new DB(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$speaker = $db->getSpeakerBySlug($_GET['slug'])[0];

?>

<title><?= $speaker['meta_title'] ?></title>

<meta name="title" content="<?= $speaker['meta_title'] ?>">
<meta name="description" content="<?= $speaker['meta_description'] ?>">

<meta property="og:url" content="https://goemms.com/speaker-interna?slug=<?= $speaker['slug'] ?>">
<meta property="og:title" content="<?= $speaker['meta_title'] ?>">
<meta property="og:description" content="<?= $speaker['meta_description'] ?>">
<meta property="og:image" content="https://<?= $_SERVER['HTTP_HOST'] ?>/admin/speakers/uploads/<?= $speaker['meta_image'] ?>">

<meta name="twitter:image" content="https://<?= $_SERVER['HTTP_HOST'] ?>/admin/speakers/uploads/<?= $speaker['meta_image'] ?>">
<meta property="og:site_name" content="<?= $speaker['meta_title'] ?>">
<meta name="twitter:image:alt" content="<?= $speaker['meta_title'] ?>">

<link rel="canonical" href="https://goemms.com/speaker-interna?slug=<?= $speaker['slug'] ?>" />
<link hreflang="x-default" href="https://goemms.com/speaker-interna?slug=<?= $speaker['slug'] ?>" rel="alternate" />
<link hreflang="es-ar" href="https://goemms.com/speaker-interna?slug=<?= $speaker['slug'] ?>" rel="alternate" />
