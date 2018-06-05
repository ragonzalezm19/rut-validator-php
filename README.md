## Installar

```
composer require ragonzalezm19/rut-validator
```

## ¿Como usar?

```php
<?php

include './vendor/autoload.php';

use Ragonzalezm19\RutValidator\RutValidator;

if(RutValidator::validate('RUT'))
{
  echo 'Rut Valido';
}
else
{
  echo 'Rut no Valido';
}
```

*See ya!*

