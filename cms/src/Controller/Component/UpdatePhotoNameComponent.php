<?php
namespace App\Controller\Component;

use App\Model\Entity\Photo;
use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\Log\Log;
use Cake\ORM\TableRegistry;

/**
 * UpdatePhotoName component
 */
class UpdatePhotoNameComponent extends Component
{
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];
    public function updatePhotoName(Photo $photo){
        $newName = $photo->id . '-' . $photo->photo;
        // rename file in file system
        rename($photo->dir . $photo->photo, $photo->dir . $newName);
        // update photo entry with new filename
        // https://book.cakephp.org/3.0/en/orm/query-builder.html#updating-data
        $photos = TableRegistry::getTableLocator()->get('Photos');
        $query = $photos->query();
        $errorCode = $query->update()
            ->set(['photo' => $newName])
            ->where(['id' => $photo->id])
            ->execute();

        Log::write('debug', $errorCode->errorCode());
        return $errorCode->errorCode();

    }
}
