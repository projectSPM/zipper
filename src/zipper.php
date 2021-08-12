<?php

namespace Spm\Zipper;

use ZipArchive;

class Zipper extends ZipArchive{

    protected $zip_file_name, $folders_to_zip, $path_to_zipFile, $path_to_unZip;

    public function setZipFileName($zip_file_name){
        $this->zip_file_name = $zip_file_name;
    }

    public function setFoldersToZip($folders_to_zip){
        $this->folders_to_zip = $folders_to_zip;
    }

    public function setPathToZipFile($path_to_zipFile){
        $this->path_to_zipFile = $path_to_zipFile;
    }

    public function setPathToUnzip($path_to_unZip){
        $this->path_to_unZip = $path_to_unZip;
    }

    public function makeZip(){

        $res = $this->open($this->zip_file_name, ZipArchive::CREATE);

        if($res === TRUE) 
        {   
            foreach ($this->folders_to_zip as $folder) {
                $this->addDir($folder, basename($folder));
            }
            
            $this->close();

            return true;
        }
        else{
            return false;
        }
    }

    public function unZipFile(){
        $comprimido = $this->open($this->path_to_zipFile);

        if($comprimido == true){
            $this->extractTo($this->path_to_zipFile);
            $this->close();
        }else{
            return false;
        }
    }

    private function addDir($location, $name) 
    {
        $this->addEmptyDir($name);
        $this->addDirDo($location, $name);
    } 

    private function addDirDo($location, $name) 
    {
        $name .= '/';
        $location .= '/';
        $dir = opendir ($location);
        while ($file = readdir($dir))
        {
            if ($file == '.' || $file == '..') continue;
            $do = (filetype( $location . $file) == 'dir') ? 'addDir' : 'addFile';
            $this->$do($location . $file, $name . $file);
        }
    } 

}