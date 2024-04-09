<?php

  function get_files_as_array($traditional = false)
  {
    $files = [];
    if ($directory = opendir(dirname(dirname(__FILE__)) . '/items')) {
      while($file = readdir($directory)) {
        if ($file != '.' && $file != '..') {
          $files[] = $file;
        }
      }
      //natsort($files);
      asort($files);
      if ($traditional) $files = array_reverse($files);
    }
    return $files;
  }

  function get_items_as_array($traditional = false, $education = false)
  {
    $items = [];
    if ($files = get_files_as_array($traditional)) {
      foreach ($files as $file) {
        if ($traditional) {
          if (!$education && substr_count($file, 'education')) continue;
          if ($education && !substr_count($file, 'education')) continue;
          if (substr_count($file, 'narrative')) continue;
        } else {
          if (substr_count($file, 'traditional')) continue;
        }
        $items[] = file_get_contents(dirname(dirname(__FILE__)) . '/items/' . $file);
      }
    }
    return $items;
  }
