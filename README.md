# SPM Zipper

ZPM Zipper is a laravel package.
 
Its main function are:
 1 -  recursively zip files from a folder and its subfolders. The structure of the zip will coincide with that of the route sent to the package.

 2 - Unzip a zip file to a specific path

## Installation

Use composer to install ZPM Zipper.

```bash
composer require spm/zipper
```

## Usage

```php

# Providers to add

Spm\Zipper\ZipperServiceProvider:class

#Facade to add

'Zipper' => Spm\Zipper\Facades\Zipper::class

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

# Set path to the zip file to unzip

$path_to_zipFile = $request->file('excel-file')->path();

Zipper::setPathToZipFile($path_to_zipFile)

# Set path to the unzipped file result

$path_to_unZip = public_path('storage\import');

Zipper::setPathToUnzip($path_to_unZip)

# Make de unzip file

Zipper::unZipFile()
```

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

## License
[MIT](./LICENSE.md)
