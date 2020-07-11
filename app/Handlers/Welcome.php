<?php
namespace Tenaga\Handlers;

use Tenaga\Handler;
use Tenaga\Models\WelcomeModel;

class Welcome extends Handler {

    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $data = [
            'name' => $this->request->get('name'),
            'user' => WelcomeModel::where('name','christmemory')->get()
        ];
        return $this->view->render('Hello',$data);
    }

}
