<?php
namespace App\View\Helper;

use Cake\View\Helper;
use Cake\View\Helper\SessionHelper;
use Cake\View\View;
use Cake\Log\Log;


/**
 * Logo helper
 */
class LogoHelper extends Helper
{
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];
    public $helpers = ['HTML', 'Flash'];

    public function logoUrl(){
        $username = $this->getView()->getRequest()->getSession()->read('username');
//        $name = View::getRequest()->getSession()->read('username');
//        Log::write('debug', $name);
        Log::write('debug', $username);
        if($username == null){
            $link = ['controller' => 'Pages', 'action' => 'home'];
//            $this->Flash->error(__('Try logging in first:)'));

        }else{
            $link = ['controller' => 'Plants', 'action' => 'index'];

        }

        return $link;
    }

}
