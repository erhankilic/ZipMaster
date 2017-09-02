# ZipMaster
Create zips with php. You can create zip with folders or files.

We don't have to think about the folders anymore.

## Test Usage
```php
<?php

include 'ZipMaster.php';

$zip = new ZipMaster\ZipMaster('backup/test.zip', 'test_folder');
$zip->archive();
```

### License
ZipMaster is an open source project by [Erhan Kılıç](http://erhankilic.org) that is licensed under [MIT](http://opensource.org/licenses/MIT).

### Contribution
Contribution are always **welcome and recommended**! Here is how:

- Fork the repository ([here is the guide](https://help.github.com/articles/fork-a-repo/)).
- Clone to your machine ```git clone https://github.com/YOUR_USERNAME/zipMaster.git```
- Make your changes
- Create a pull request
