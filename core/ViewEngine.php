<?php namespace Tenaga;


class ViewEngine
{
    /**
    *
    * Register engine for Twig
    * @var object
    *
    */
    private $engine;

    /**
    *
    * Register template for twig template
    * @var object
    *
    */
    private $template;

    /**
    *
    * Initalization Twig\Loader && Twig\Environtment
    *
    */
    public function __construct(){
        $loader =  new \Twig\Loader\FilesystemLoader(ROOT . DS . 'app' . DS . 'Views' . DS);
        $this->engine = new \Twig\Environment($loader, ['debug' => true]);
    }

    /**
    *
    * Creating Template
    * @param String $template
    * @return Void
    *
    */
    public function template($template){
        $this->template = $this->engine->load($template.'.tenaga.php');
    }

    /**
    *
    * Do Render view
    * @param String $template
    * @param Array $data
    * @return Void
    *
    */
    public function render($template, $data = []){
        echo $this->engine->render($template.'.tenaga.php',$data);
    }

    /**
    *
    * Render the template, must define the template before using
    * this
    * @param Array $data
    * @return Void
    *
    */
    public function renderTemplate($data){
        echo $this->template->render($data);
    }

    /**
    *
    * Render the block, before using this must define the template
    * @param String name
    * @param Array data
    * @return Void
    *
    */
    public function renderBlock($name, $data = []){
        echo $this->template->renderBlock($name, $data);
    }


}