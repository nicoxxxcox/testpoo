<?php

    namespace App\Router;

    class Router
    {
        /**
         * @var string
         */
        private $view_path;

        /**
         * @var string
         */
        private $base_path;

        /**
         * @var \AltoRouter
         */
        private $router;

        public function __construct($view_path , $base_path = null){
            $this->view_path = $view_path;
            $this->base_path = $base_path;
            $this->router = new \AltoRouter();
            $this->router->setBasePath($this->base_path);
        }

        public function get($url , $view , $name = null)
        {
            $this->router->map('GET' , $url , $view , $name);
            return $this;
        }

        public function run()
        {
            $match = $this->router->match();
            $view = $match['target'];
            ob_start();
            require $this->view_path . DIRECTORY_SEPARATOR . $view . 'php';
            $content = ob_get_clean();
            require $this->view_path . DIRECTORY_SEPARATOR . 'default.php';

            return $this;
        }
    }