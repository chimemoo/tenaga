<?php
namespace Tenaga\Handlers;

use Tenaga\Handler;
use Tenaga\Models\WelcomeModel;

class Welcome extends Handler {

    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $data = $this->cookie->build('aaaa','aaaa');
        $data = [
            'name' => $this->request->get('name'),
            'user' => WelcomeModel::all()
        ];
        return $this->view->render('Hello',$data);
        // $template->render($data);
    }

}
