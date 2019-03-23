Unicode utilities
=================

Utilities for work with unicode characters

Installation
------------

Add AppleApnPush in your composer.json:

```js
{
    "require": {
        "ideea/unicode": "~1.0"
    }
}
```

Now tell composer to download the library by running the command:

``` bash
$ php composer.phar update "ideea/unicode"
```

Work with util
--------------

Get char code:

```php
<?php

use Ideea\Unicode\Unicode;

$char = 'a'; // Or another char

$charCode = Unicode::ord($char);
```

Get char codes from string:

```php
<?php

use Ideea\Unicode\Unicode;

$string = 'foo-bar';

$charCodes = Unicode::ordStr($string);
```

> *Attention:* the chars must be encoding in UTF-8!

License
-------

This library is under the MIT license. See the complete license in library

```
LICENSE
```

Reporting an issue or a feature request
---------------------------------------

Issues and feature requests are tracked in the [GitHub issue tracker](https://github.com/ZhukV/Unicode/issues)