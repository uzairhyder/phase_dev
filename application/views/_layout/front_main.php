<? global $config;
// Define plugins for page
$my_tools = array(
    "datetime-picker" => array(
        "css" => array("css/jquery.datetimepicker.css"),
        "js" => array("js/jquery.datetimepicker.js"),
    ),
    "datatables" => array(
        "css" => array("datatables.min.css"),
        "js" => array("datatables.min.js"),
    ),
    "select2" => array(
        "css" => array("select2.css"),
        "js" => array("select2.js","select2_custom.js"),
    ),
    "fb" => array(
        "css" => array("style.css"),
        "js" => array("jquery.fancybox.min.js"),
    ),
    "fancybox" => array(
        "css" => array("jquery.fancybox.min.css"),
        "js" => array("jquery.fancybox.min.js"),
    ),
    "owl-carousel" => array(
        "css" => array("owl.carousel.css","owl.theme.css"),
        "js" => array("owl.carousel.js"),
    ),
    "slick" => array(
        "css" => array("slick.css","slick-theme.css"),
        "js" => array("slick.js"),
    ),
    "jquery-file-upload"=> array(
        "js" => array(
            "js/vendor/jquery.ui.widget.js",
            "js/vendor/tmpl.min.js",
            "js/vendor/load-image.min.js",
            "js/vendor/canvas-to-blob.min.js",
            //"blueimp-gallery/jquery.blueimp-gallery.min.js",
            "js/jquery.iframe-transport.js",
            "js/jquery.fileupload.js",
            "js/jquery.fileupload-process.js",
            "js/jquery.fileupload-image.js",
            "js/jquery.fileupload-audio.js",
            "js/jquery.fileupload-video.js",
            "js/jquery.fileupload-validate.js",
            "js/jquery.fileupload-ui.js",
        ),
        "css" => array(
            "blueimp-gallery/blueimp-gallery.min.css",
            "css/jquery.fileupload.css",
            //"css/jquery.fileupload-ui.css",
        ),
    ),
    "bootstrap-switch" => array(
        "css" => array("css/bootstrap-switch.min.css"),
        "js" => array("js/bootstrap-switch.min.js"),
    ),
    "bootbox"=> array(
        "js" => array("bootbox.min.js"),
    ),
    "ckeditor"=> array(
        "js" => array("ckeditor.js","config.js"),
    ),
    "bootstrap-fileupload" => array(
        "js" => array("bootstrap-fileupload.js"),
        "css" => array("bootstrap-fileupload.css")
    ),
);

?>

<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <!-- <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content=""> -->
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-KQBJH7M');</script>
<!-- End Google Tag Manager -->
    <?php
/*        $class = $this->router->fetch_class();
    */?><!--
    <?php
/*        if ($class == 'home') {
    */?>
        <title><?/*= $title */?></title>
    <?php
/*        }
        else{
    */?>
        <title><?/*= ucfirst(humanize($class))." | ".$title */?></title>
    --><?php
/*        }
    */?>

    <title><?= $title ?></title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="<?=Links::img($layout_data['logo']['logo_image_path'],$layout_data['logo']['logo_favicon'])?>">

    <? foreach ($meta_data AS $meta_name => $meta_val) { ?>
        <meta name="<?= $meta_name ?>" content="<?= $meta_val ?>">
    <? } ?>
    
 <? $segment = $this->router->fetch_class();
        //debug($segment,1);
   if($segment == 'home'){?>
        <link rel="canonical" href="https://phase3kicking.com" />
  <?} if($segment == 'about_us'){?>
    <link rel="canonical" href="https://phase3kicking.com/campconcept" />
  <?} if($segment == 'camp'){?>
    <link rel="canonical" href="https://phase3kicking.com/upcomingcamps" />
  <?} if($segment == 'camp_result'){?>
    <link rel="canonical" href="https://phase3kicking.com/campresult" />
  <?} if($segment == 'kicker'){?>
    <link rel="canonical" href="https://phase3kicking.com/kickoffs" />
  <?} if($segment == 'field_goal'){?>
    <link rel="canonical" href="https://phase3kicking.com/fieldgoals" />
  <?} if($segment == 'punter'){?>
    <link rel="canonical" href="https://phase3kicking.com/punters" />
  <?} if($segment == 'snapper'){?>
    <link rel="canonical" href="https://phase3kicking.com/longsnappers" />
  <?} if($segment == 'team'){?>
    <link rel="canonical" href="https://phase3kicking.com/evaluationteam" />
  <?} if($segment == 'blog'){?>
    <link rel="canonical" href="https://phase3kicking.com/media" />
  <?} if($segment == 'contact_us'){?>
    <link rel="canonical" href="https://phase3kicking.com/contact-us" />
  <?}?>

    <!-- Google Fonts -->
    <!--<link href="<?php /*echo l('assets/front_assets/fonts/font.css')*/?>" rel="stylesheet">-->

<!-- owl -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css" integrity="sha512-UTNP5BXLIptsaj5WdKFrkFov94lDx+eBvbKyoe1YAfjeRPC+gT5kyZ10kOHCfNZqEui1sxmqvodNUx3KbuYI/A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Loading css file -->
    <? foreach ($css_files AS $css) { ?>
        <link href="<?= g('css_root') . $css ?>" rel="stylesheet" type="text/css"/>
    <?
    }
    // Load js file
    if (is_array($js_files_init)) {
        foreach ($js_files_init as $js) { ?>
            <script src="<?= g('js_root') . $js ?>"></script>
        <?
        }
    }
    // Load additional files css
    if (is_array($additional_tools) && count($additional_tools)) {
        foreach ($additional_tools AS $tool) {
            if (is_array($my_tools[$tool]['css']))
                foreach ($my_tools[$tool]['css'] AS $script) {
                    if ($script) {
                        ?>
                        <link rel="stylesheet" href="<?= g('plugins_root') . $tool . "/" . $script; ?>"/><?
                    }

                }
        }
    }
    // Load additional files js
    if (array_filled($additional_tools)) {
        foreach ($additional_tools AS $tool) {
            if (is_array($my_tools[$tool]['js']))
                foreach ($my_tools[$tool]['js'] AS $script) {
                    $tool_activators .= "toolset.tool_" . str_replace("-", "_", $tool) . " = true;";
                    ?>
                    <script src="<?= g('plugins_root') . $tool . "/" . $script; ?>"></script>
                <?
                }
        }
    }
    ?>
    <script type="text/javascript"> var base_url = "<?php  echo base_url(); ?>";</script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <!--[if lt IE 9]>

    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>

    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

    <![endif]-->

    <!-- Fonts Links -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-200191903-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-200191903-1');
</script>
<?php 
    $segment = $this->router->fetch_class();
    //debug($segment,1);
?>
<?if($segment == 'home'){?>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "SportsClub",
  "name": "Phase 3 Kicking",
  "image": "https://phase3kicking.com/assets/uploads/logo/logo123162465297771162465362240.png",
  "@id": "",
  "url": "https://phase3kicking.com/",
  "telephone": "(651) 353-2660",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "15696 Tarleton Crest N, Maple Grove, MN 55311",
    "addressLocality": "Maple Grove",
    "addressRegion": "MN",
    "postalCode": "55311",
    "addressCountry": "US"
  },
  "geo": {
    "@type": "GeoCoordinates",
    "latitude": 45.1082251,
    "longitude": -93.4796083
  },
  "openingHoursSpecification": {
    "@type": "OpeningHoursSpecification",
    "dayOfWeek": [
      "Monday",
      "Tuesday",
      "Wednesday",
      "Thursday",
      "Friday",
      "Saturday",
      "Sunday"
    ],
    "opens": "08:00",
    "closes": "23:00"
  },
  "sameAs": [
    "https://www.facebook.com/Phase3Kicking",
    "https://twitter.com/Phase3Kicking",
    "https://www.instagram.com/Phase3Kicking",
    "https://www.youtube.com/channel/UCAUAVCBnwaJe1SYX7fMZNeA",
    "https://phase3kicking.com/"
  ] 
}
</script>
<?}elseif($segment == 'about_us'){?>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "SportsClub",
  "name": "Phase 3 Kicking",
  "image": "https://phase3kicking.com/assets/uploads/logo/logo123162465297771162465362240.png",
  "@id": "",
  "url": "https://phase3kicking.com/campconcept",
  "telephone": "(651) 353-2660",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "15696 Tarleton Crest N, Maple Grove, MN 55311",
    "addressLocality": "Maple Grove",
    "addressRegion": "MN",
    "postalCode": "55311",
    "addressCountry": "US"
  },
  "geo": {
    "@type": "GeoCoordinates",
    "latitude": 45.1082251,
    "longitude": -93.4796083
  },
  "openingHoursSpecification": {
    "@type": "OpeningHoursSpecification",
    "dayOfWeek": [
      "Monday",
      "Tuesday",
      "Wednesday",
      "Thursday",
      "Friday",
      "Saturday",
      "Sunday"
    ],
    "opens": "08:00",
    "closes": "23:00"
  },
  "sameAs": [
    "https://www.facebook.com/Phase3Kicking",
    "https://twitter.com/Phase3Kicking",
    "https://www.instagram.com/Phase3Kicking",
    "https://www.youtube.com/channel/UCAUAVCBnwaJe1SYX7fMZNeA",
    "https://phase3kicking.com/"
  ] 
}
</script>
<?}elseif($segment == 'camp'){?>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "SportsClub",
  "name": "Phase 3 Kicking",
  "image": "https://phase3kicking.com/assets/uploads/logo/logo123162465297771162465362240.png",
  "@id": "",
  "url": "https://phase3kicking.com/upcomingcamps",
  "telephone": "(651) 353-2660",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "15696 Tarleton Crest N, Maple Grove, MN 55311",
    "addressLocality": "Maple Grove",
    "addressRegion": "MN",
    "postalCode": "55311",
    "addressCountry": "US"
  },
  "geo": {
    "@type": "GeoCoordinates",
    "latitude": 45.1082251,
    "longitude": -93.4796083
  },
  "openingHoursSpecification": {
    "@type": "OpeningHoursSpecification",
    "dayOfWeek": [
      "Monday",
      "Tuesday",
      "Wednesday",
      "Thursday",
      "Friday",
      "Saturday",
      "Sunday"
    ],
    "opens": "08:00",
    "closes": "23:00"
  },
  "sameAs": [
    "https://www.facebook.com/Phase3Kicking",
    "https://twitter.com/Phase3Kicking",
    "https://www.instagram.com/Phase3Kicking",
    "https://www.youtube.com/channel/UCAUAVCBnwaJe1SYX7fMZNeA",
    "https://phase3kicking.com/"
  ] 
}
</script>
<?}elseif($segment == 'camp_result'){?>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "SportsClub",
  "name": "Phase 3 Kicking",
  "image": "https://phase3kicking.com/assets/uploads/logo/logo123162465297771162465362240.png",
  "@id": "",
  "url": "https://phase3kicking.com/campresult",
  "telephone": "(651) 353-2660",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "15696 Tarleton Crest N, Maple Grove, MN 55311",
    "addressLocality": "Maple Grove",
    "addressRegion": "MN",
    "postalCode": "55311",
    "addressCountry": "US"
  },
  "geo": {
    "@type": "GeoCoordinates",
    "latitude": 45.1082251,
    "longitude": -93.4796083
  },
  "openingHoursSpecification": {
    "@type": "OpeningHoursSpecification",
    "dayOfWeek": [
      "Monday",
      "Tuesday",
      "Wednesday",
      "Thursday",
      "Friday",
      "Saturday",
      "Sunday"
    ],
    "opens": "08:00",
    "closes": "23:00"
  },
  "sameAs": [
    "https://www.facebook.com/Phase3Kicking",
    "https://twitter.com/Phase3Kicking",
    "https://www.instagram.com/Phase3Kicking",
    "https://www.youtube.com/channel/UCAUAVCBnwaJe1SYX7fMZNeA",
    "https://phase3kicking.com/"
  ] 
}
</script>
<?}elseif($segment == 'kicker'){?>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "SportsClub",
  "name": "Phase 3 Kicking",
  "image": "https://phase3kicking.com/assets/uploads/logo/logo123162465297771162465362240.png",
  "@id": "",
  "url": "https://phase3kicking.com/kickoffs",
  "telephone": "(651) 353-2660",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "15696 Tarleton Crest N, Maple Grove, MN 55311",
    "addressLocality": "Maple Grove",
    "addressRegion": "MN",
    "postalCode": "55311",
    "addressCountry": "US"
  },
  "geo": {
    "@type": "GeoCoordinates",
    "latitude": 45.1082251,
    "longitude": -93.4796083
  },
  "openingHoursSpecification": {
    "@type": "OpeningHoursSpecification",
    "dayOfWeek": [
      "Monday",
      "Tuesday",
      "Wednesday",
      "Thursday",
      "Friday",
      "Saturday",
      "Sunday"
    ],
    "opens": "08:00",
    "closes": "23:00"
  },
  "sameAs": [
    "https://www.facebook.com/Phase3Kicking",
    "https://twitter.com/Phase3Kicking",
    "https://www.instagram.com/Phase3Kicking",
    "https://www.youtube.com/channel/UCAUAVCBnwaJe1SYX7fMZNeA",
    "https://phase3kicking.com/"
  ] 
}
</script>
<?}elseif($segment == 'field_goal'){?>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "SportsClub",
  "name": "Phase 3 Kicking",
  "image": "https://phase3kicking.com/assets/uploads/logo/logo123162465297771162465362240.png",
  "@id": "",
  "url": "https://phase3kicking.com/fieldgoals",
  "telephone": "(651) 353-2660",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "15696 Tarleton Crest N, Maple Grove, MN 55311",
    "addressLocality": "Maple Grove",
    "addressRegion": "MN",
    "postalCode": "55311",
    "addressCountry": "US"
  },
  "geo": {
    "@type": "GeoCoordinates",
    "latitude": 45.1082251,
    "longitude": -93.4796083
  },
  "openingHoursSpecification": {
    "@type": "OpeningHoursSpecification",
    "dayOfWeek": [
      "Monday",
      "Tuesday",
      "Wednesday",
      "Thursday",
      "Friday",
      "Saturday",
      "Sunday"
    ],
    "opens": "08:00",
    "closes": "23:00"
  },
  "sameAs": [
    "https://www.facebook.com/Phase3Kicking",
    "https://twitter.com/Phase3Kicking",
    "https://www.instagram.com/Phase3Kicking",
    "https://www.youtube.com/channel/UCAUAVCBnwaJe1SYX7fMZNeA",
    "https://phase3kicking.com/"
  ] 
}
</script>
<?}elseif($segment == 'punter'){?>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "SportsClub",
  "name": "Phase 3 Kicking",
  "image": "https://phase3kicking.com/assets/uploads/logo/logo123162465297771162465362240.png",
  "@id": "",
  "url": "https://phase3kicking.com/punters",
  "telephone": "(651) 353-2660",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "15696 Tarleton Crest N, Maple Grove, MN 55311",
    "addressLocality": "Maple Grove",
    "addressRegion": "MN",
    "postalCode": "55311",
    "addressCountry": "US"
  },
  "geo": {
    "@type": "GeoCoordinates",
    "latitude": 45.1082251,
    "longitude": -93.4796083
  },
  "openingHoursSpecification": {
    "@type": "OpeningHoursSpecification",
    "dayOfWeek": [
      "Monday",
      "Tuesday",
      "Wednesday",
      "Thursday",
      "Friday",
      "Saturday",
      "Sunday"
    ],
    "opens": "08:00",
    "closes": "23:00"
  },
  "sameAs": [
    "https://www.facebook.com/Phase3Kicking",
    "https://twitter.com/Phase3Kicking",
    "https://www.instagram.com/Phase3Kicking",
    "https://www.youtube.com/channel/UCAUAVCBnwaJe1SYX7fMZNeA",
    "https://phase3kicking.com/"
  ] 
}
</script>
<?}elseif($segment == 'snapper'){?>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "SportsClub",
  "name": "Phase 3 Kicking",
  "image": "https://phase3kicking.com/assets/uploads/logo/logo123162465297771162465362240.png",
  "@id": "",
  "url": "https://phase3kicking.com/longsnappers",
  "telephone": "(651) 353-2660",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "15696 Tarleton Crest N, Maple Grove, MN 55311",
    "addressLocality": "Maple Grove",
    "addressRegion": "MN",
    "postalCode": "55311",
    "addressCountry": "US"
  },
  "geo": {
    "@type": "GeoCoordinates",
    "latitude": 45.1082251,
    "longitude": -93.4796083
  },
  "openingHoursSpecification": {
    "@type": "OpeningHoursSpecification",
    "dayOfWeek": [
      "Monday",
      "Tuesday",
      "Wednesday",
      "Thursday",
      "Friday",
      "Saturday",
      "Sunday"
    ],
    "opens": "08:00",
    "closes": "23:00"
  },
  "sameAs": [
    "https://www.facebook.com/Phase3Kicking",
    "https://twitter.com/Phase3Kicking",
    "https://www.instagram.com/Phase3Kicking",
    "https://www.youtube.com/channel/UCAUAVCBnwaJe1SYX7fMZNeA",
    "https://phase3kicking.com/"
  ] 
}
</script>
<?}elseif($segment == 'team'){?>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "SportsClub",
  "name": "Phase 3 Kicking",
  "image": "https://phase3kicking.com/assets/uploads/logo/logo123162465297771162465362240.png",
  "@id": "",
  "url": "https://phase3kicking.com/evaluationteam",
  "telephone": "(651) 353-2660",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "15696 Tarleton Crest N, Maple Grove, MN 55311",
    "addressLocality": "Maple Grove",
    "addressRegion": "MN",
    "postalCode": "55311",
    "addressCountry": "US"
  },
  "geo": {
    "@type": "GeoCoordinates",
    "latitude": 45.1082251,
    "longitude": -93.4796083
  },
  "openingHoursSpecification": {
    "@type": "OpeningHoursSpecification",
    "dayOfWeek": [
      "Monday",
      "Tuesday",
      "Wednesday",
      "Thursday",
      "Friday",
      "Saturday",
      "Sunday"
    ],
    "opens": "08:00",
    "closes": "23:00"
  },
  "sameAs": [
    "https://www.facebook.com/Phase3Kicking",
    "https://twitter.com/Phase3Kicking",
    "https://www.instagram.com/Phase3Kicking",
    "https://www.youtube.com/channel/UCAUAVCBnwaJe1SYX7fMZNeA",
    "https://phase3kicking.com/"
  ] 
}
</script>
<?}elseif($segment == 'blog'){?>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "SportsClub",
  "name": "Phase 3 Kicking",
  "image": "https://phase3kicking.com/assets/uploads/logo/logo123162465297771162465362240.png",
  "@id": "",
  "url": "https://phase3kicking.com/media",
  "telephone": "(651) 353-2660",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "15696 Tarleton Crest N, Maple Grove, MN 55311",
    "addressLocality": "Maple Grove",
    "addressRegion": "MN",
    "postalCode": "55311",
    "addressCountry": "US"
  },
  "geo": {
    "@type": "GeoCoordinates",
    "latitude": 45.1082251,
    "longitude": -93.4796083
  },
  "openingHoursSpecification": {
    "@type": "OpeningHoursSpecification",
    "dayOfWeek": [
      "Monday",
      "Tuesday",
      "Wednesday",
      "Thursday",
      "Friday",
      "Saturday",
      "Sunday"
    ],
    "opens": "08:00",
    "closes": "23:00"
  },
  "sameAs": [
    "https://www.facebook.com/Phase3Kicking",
    "https://twitter.com/Phase3Kicking",
    "https://www.instagram.com/Phase3Kicking",
    "https://www.youtube.com/channel/UCAUAVCBnwaJe1SYX7fMZNeA",
    "https://phase3kicking.com/"
  ] 
}
</script>
<?}elseif($segment == 'contact_us'){?>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "SportsClub",
  "name": "Phase 3 Kicking",
  "image": "https://phase3kicking.com/assets/uploads/logo/logo123162465297771162465362240.png",
  "@id": "",
  "url": "https://phase3kicking.com/contact-us",
  "telephone": "(651) 353-2660",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "15696 Tarleton Crest N, Maple Grove, MN 55311",
    "addressLocality": "Maple Grove",
    "addressRegion": "MN",
    "postalCode": "55311",
    "addressCountry": "US"
  },
  "geo": {
    "@type": "GeoCoordinates",
    "latitude": 45.1082251,
    "longitude": -93.4796083
  },
  "openingHoursSpecification": {
    "@type": "OpeningHoursSpecification",
    "dayOfWeek": [
      "Monday",
      "Tuesday",
      "Wednesday",
      "Thursday",
      "Friday",
      "Saturday",
      "Sunday"
    ],
    "opens": "08:00",
    "closes": "23:00"
  },
  "sameAs": [
    "https://www.facebook.com/Phase3Kicking",
    "https://twitter.com/Phase3Kicking",
    "https://www.instagram.com/Phase3Kicking",
    "https://www.youtube.com/channel/UCAUAVCBnwaJe1SYX7fMZNeA",
    "https://phase3kicking.com/"
  ] 
}
</script>
<?}?>
</head>

<body class="">
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KQBJH7M"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div id="preloader" style="display:none;">  
    <div class="loading">
        <!--<span>Loading...</span>-->
    </div>
</div>

<!-- PRE LOADER start-->
<div id="st-preloader">
    <div id="pre-status">
        <div class="preload-placeholder"></div>
    </div>
</div>
<!-- PRE LOADER end-->

<!-- PRE LOADER start-->
<!-- <div id="st-preloader">
    <div id="pre-status">
        <div class="preload-placeholder"></div>
    </div>
</div> -->
<!-- PRE LOADER end-->

<!-- Wrapper Start -->
<?$this->load->view("_layout/header");
// Page content Start
echo $content_block;
// Page content End
$this->load->view("_layout/footer");
// Search
//$this->load->view("_layout/search");
// Wrapper End

// Load modal

// Load js files
foreach ($js_files as $js) { ?>
    <script src="<?= g('js_root') . $js ?>"></script>
<?
}
?>

<script>
    $(document).ready(function(){
        <?if((isset($_GET['msgtype'])) && ($_GET['msgtype']) && ($_GET['msg'])){?>
        AdminToastr.<?=$_GET['msgtype']?>("<?=$_GET['msg']?>", "<?=$_GET['msgtype']?>" , {positionClass:"toast-top-full-width"} );
        <?}?>

    });
</script>
<!-- owl -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js" integrity="sha512-gY25nC63ddE0LcLPhxUJGFxa2GoIyA5FLym4UJqHDEMHjp8RET6Zn/SHo1sltt3WuVtqfyxECP38/daUc/WVEA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $('.homecarousal').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        dots:false,
        autoplay:false,
        autoplayTimeout:3000,
        smartSpeed:450,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:3
            }
        }
    })

    $('.testert').owlCarousel({
    loop:false,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:3
        }
    }
})
    $('.owl-carousel258').owlCarousel({

        loop:true,
        margin:10,
        autoplay:true,
        autoplayTimeout:3000,
        autoplayHoverPause:true,
        nav:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:3
            }
        }
    })
</script>
 </body>
 
</html>