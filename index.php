<?php

  // If the "traditional" URL parameter is set, we'll display in a traditional, 
  // reverse-chronological order. But by default, we'll tell my work history
  // chronologically, which makes more sense as a story.
  $traditional = !empty($_GET['traditional']);

  require_once 'lib/items.php';

  $items = get_items_as_array($traditional);

?>
<!doctype html>
<html>
  <head>
    <title>
      Ben Werdmuller - Resumé
    </title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="initial-scale=1">
    <meta name="description" content="Ben Werdmuller's full narrative resumé." />
    <link rel="icon" type="image/x-icon" href="/main.500.jpg" />
    <link rel="canonical" href="https://resume.werd.io" />
    <link rel="image_src" href="/main.1500.jpg" />
    <link rel="feed" type="application/rss+xml" title="Werd I/O" href="https://werd.io/feed" />
    <link rel="alternate feed" type="application/rss+xml" title="Werd I/O: links" href="https://werd.io/content/bookmarkedpages?_t=rss" />
    <meta property="og:site_name" content="Ben Werdmuller" />
    <meta property="og:title" content="Resumé" />
    <meta property="og:url" content="https://resume.werd.io" />
    <meta property="og:type" content="website" />
    <meta property="og:description" content="Ben Werdmuller's full narrative resumé." />
    <meta property="og:image" content="/main.1500.jpg" />
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="1200" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@300;400;700" rel="stylesheet">
    <script type="application/ld+json">
        {
          "@context": "http://schema.org",
          "@type": "WebSite",
          "url": "https://resume.werd.io",
          "name": "Resumé",
          "description": "Ben Werdmuller's full narrative resumé.",
          "publisher": "Ben Werdmuller",
          "author": {
              "@type": "Person",
              "name": "Ben Werdmuller"
          }
        }    
    </script>
    <link rel="stylesheet" href="/css/main.css?2024040902">
    <style>
<?php

  if ($traditional) { 
?>
      .narrative {
        display: none;
      }
      a {
        text-decoration: none;
        color: #333;
      }
<?php
  } else {
?>
      .traditional {
        display: none;
      }
<?php
  }

?>
    </style>
  </head>
  <body class="h-resume">
    <div class="site-header h-card">
      <h1 class="p-name">Ben Werdmuller</h1>
      <h2>
        Technical leader, founder, and open web advocate
<?php

  if ($traditional) {

?>
<br><br>
<span class="p-tel">+1 (510) 283-3321</span> &middot;
<a href="mailto:ben@benwerd.com" class="u-email">ben@benwerd.com</a>
<?php

  }

?>
      </h2>
    </div>
    <div class="main-content">
<?php
  if (!$traditional) {
?>
      <h2>
        Narrative Resumé
      </h2>
      <p>Unlike most resumés, this version tells my work history in chronological order, with more detail than would normally be included in a resumé (including non-employment projects that have informed my career). An abridged version is also available in <a href="/?traditional=1">traditional, reverse-chronological order</a>.</p>
      <div class="p-summary">
        <p>I’m a technology leader, open source startup founder, software developer, and open web advocate. My mission is to work on technology projects in the public interest that have the potential to make the world more informed and equal.</p>
        <p>This is the story of how I got there.</p>
      </div>
<?php

  } else {

?>
      <h2>
        Summary
      </h2>
      <p class="p-summary">
        Ben Werdmuller is a technology leader, open source startup founder, software developer, and open web advocate. His mission is to work on technology projects in the public interest that have the potential to make the world more informed and equal.
      </p>
      <h2>
        Work Experience
      </h2>
<?php

  }

  foreach($items as $item) {
    echo '<div class="item p-experience h-event">' . $item . '</div>';
  }
  if ($traditional) {
    $education = get_items_as_array(true, true);

?>
  <h2 class="education">Education</h2>
<?php

    foreach($education as $edu) {
      echo '<div class="item education p-education h-event">' . $edu . '</div>';
    }
  }

?>
    </div>
  </body>
</html>
