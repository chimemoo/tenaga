<?php
namespace Tenaga\Handlers;

use Tenaga\Handler;

class Welcome extends Handler {
    
    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $data = [
            'name' => $this->request->getParameter('name', 'stranger'),
        ];
        $this->view->template('Hello');
        $this->view->renderTemplate($data);
    }

}