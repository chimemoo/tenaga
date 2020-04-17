<?php
namespace Tenaga\Handlers;
use Http\Request;
use Http\Response;
class Welcome {
    
    public $request;
    public $response;

    public function __construct(Request $request, Response $response){
        $this->request = $request;
        $this->response = $response;
    }

    public function index(){
        $content = '<h1>Hello World</h1>';
        $content .= 'Hello ' . $this->request->getParameter('name', 'stranger');
        $this->response->setContent($content);
        echo $this->response->getContent();
    }

}