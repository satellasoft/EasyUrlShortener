# EasyUrlShortener
EASY URL SHORTENER

# About

**Easy Url Shortener** is an application developed in PHP, which is responsible for generating a new compressed URL, as well as monitoring accesses through this new address.

This is a simple project to use, just download, tweak the configuration file and you're done.

# Usability

Easy URL Shortener is a simple and functional application that requires no connection to the database or server settings.
Just extract the files to a folder on your server, and that's it, it's working, but you need to change a few lines in the App / config.php file to customize your information.

# config.php

```
<?php
  define("USERKEY", "a12345z");
  define("URLLENGTH", 5);
  define("SITEURL", "http://localhost/url?u=");
  define("PATH", "data");
?>
```
