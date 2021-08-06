# SPM Zipper

ZPM Zipper is a laravel package.
 
Its main function is to recursively zip files from a folder and its subfolders.

The structure of the zip will coincide with that of the route sent to the package.

## Installation

Use composer to install ZPM Zipper.

```bash
composer require spm/zipper
```

## Usage

```php

# Set the path and name of the new zip file

$zip_file_name = public_path() . '\exports\file_name.zip';

Zipper::setFileName($zip_file_name)

# Add all folders to zip file
# They can be in different locations as long as they are indicated in the array

$folders_to_zip = [
   public_path() . '\storage\general',
   public_path() . '\storage\home',
];

Zipper::setFoldersToZip($folders_to_zip)

# Make the zip file

Zipper::makeZip();

```

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

## License
[MIT](./LICENSE.md)