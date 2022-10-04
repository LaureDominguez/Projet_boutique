<?php
namespace MyApp\Services;
use \Exception;
/**
 * Class View
 * @package MyApp\Services
 */
    class View {
        private const LAYOUT_PATH = "./views/layout.phtml";
        /** @var string $templatePath */
        private string $templatePath;
        /** @var array $data */
        private array $data;
        /**
         * View constructor.
         * 
         * @param string $templatePath
         * @param array $data
         * 
         * @throws Exception
         */

        public function __construct(string $templatePath, array $data = []) {
            if (!file_exists(self::LAYOUT_PATH)){
                throw new Exception("./views/layout.phtml is needed with \$templatePath.");
            }
            if (!file_exists($templatePath)){
                throw new Exception("Can't find template $templatePath.");
            }
            
            $this->templatePath = $templatePath;
            $this->data = $data;

            /**
             * Call everything a want for my views here ... 
             *
             */
        }
        /**
         * @return void
         */
        public function display():void {
            $data = $this->data;
            ob_start();
            include $this->templatePath;
            $content = ob_get_clean();
            include self::LAYOUT_PATH;
        }
    }