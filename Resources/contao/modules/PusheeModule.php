<?php


namespace Home\PusheeBundle\Resources\contao\modules;


use Contao\Module;

class PusheeModule extends Module
{
    /**
     * @var string
     */
    protected $strTemplate = 'mod_pushee';

    /**
     * Do not display the module if there are no menu items
     *
     * @return string
     */
    public function generate()
    {

        return parent::generate();
    }

    /**
     * Generate module
     */
    protected function compile()
    {
        if (TL_MODE == 'BE') {
            $this->generateBackend();
        } else {
            $this->generateFrontend();
        }
    }

    /**
     * generate backend for module
     */
    private function generateBackend()
    {
        $this->strTemplate          = 'be_wildcard';
        $this->Template             = new \BackendTemplate($this->strTemplate);
        $this->Template->wildcard   = "Pushee FCM";
    }

    private function generateFrontend()
    {
        $GLOBALS['TL_CSS'][] = '/bundles/homepushee/snackbar.css';

        $dir = \System::getContainer()->getParameter('contao.web_dir');
        $swPath = $dir . '/bundles/homepushee/';
        $swFile = $swPath . 'firebase-messaging-sw.js';
        $swNewFile = $swPath . $this->projectId . '-sw.js';

        if(!file_exists($swNewFile) && file_exists($swFile)){
            $swJs = file_get_contents($swFile);
            str_replace('{{apiKey}}', $this->apiKey, $swJs);
            str_replace('{{authDomain}}', $this->authDomain, $swJs);
            str_replace('{{databaseURL}}', $this->databaseURL, $swJs);
            str_replace('{{projectId}}', $this->projectId, $swJs);
            str_replace('{{storageBucket}}', $this->storageBucket, $swJs);
            str_replace('{{messagingSenderId}}', $this->messagingSenderId, $swJs);
            str_replace('{{appId}}', $this->appId, $swJs);
            str_replace('{{measurementId}}', $this->measurementId, $swJs);
            file_put_contents($swNewFile, $swJs);
        }

        $this->Template->pusheeConfig = [
            'apiKey' => $this->apiKey,
            'authDomain' => $this->authDomain,
            'databaseURL' => $this->databaseURL,
            'projectId' => $this->projectId,
            'storageBucket' => $this->storageBucket,
            'messagingSenderId' => $this->messagingSenderId,
            'appId' => $this->appId,
            'measurementId' => $this->measurementId
        ];
    }
}
