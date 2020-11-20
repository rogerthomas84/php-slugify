Slugify
===========

Generate a URL safe slugs from strings...

## Usage:

#### Convert a string to a slug:

```php
<?php
$string = 'The quick brown fox jumped over the lazy dog.';
$slug = \Slugify\Slugify::get($string);
// $slug = string(44) "the-quick-brown-fox-jumped-over-the-lazy-dog"

// Slugify also removes any special (non alphanumeric) characters...

$string2 = 'The "quick" brown fox jumped (OVER) the lazy dog!';
$slug2 = \Slugify\Slugify::get($string2);
// $slug2 = string(44) "the-quick-brown-fox-jumped-over-the-lazy-dog"
```
