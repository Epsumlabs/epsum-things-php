# PHP SDK for EpsumThings
EpsumThings php sdk for developers and hobbyists alike for using EpsumThings IoT platform.

# Installation
You can install the package using the composer package manager using the following command.
```
composer require epsumlabs/epsumthings-php
```

# Example Code 

```php
<?php
require("./vendor/epsumlabs/epsumthings-php/epsum_things.php");
$obj=new account("user@domain.com","access_token","app_id");
$things=new epsumthings();
echo($things->user_profile($obj));
?>
```

# About
EpsumThings is an IoT platform developed at **Epsum Labs Private Limited** for people like you to taste the sweetness of IoT with minimal effort.
