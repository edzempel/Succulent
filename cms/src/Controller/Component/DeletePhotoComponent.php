<?php
namespace App\Controller\Component;

use App\Model\Entity\Photo;
use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\Filesystem\File;
use Cake\Filesystem\Folder;

/**
 * DeletePhoto component
 */
class DeletePhotoComponent extends Component
{
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    /**
     * Deletes file with matching ->photo property
     * @param Photon $photo
     * @return bool Success
     */
    public function deletePhoto(Photo $photo)
    {
        // https://book.cakephp.org/3.0/en/core-libraries/file-folder.html
        // remove the file from the directory
        $dir = new Folder($photo->dir);
        $files = $dir->find($photo->photo);
        $success = false;
        foreach ($files as $file) {
            $file = new File($dir->pwd() . DS . $file);
//                $contents = $file->read();
            // $file->write('I am overwriting the contents of this file');
            // $file->append('I am adding to the bottom of this file.');
            $success = $file->delete(); // I am deleting this file
//                $file->close(); // Be sure to close the file when you're done
        }
        return $success;
    }
}
