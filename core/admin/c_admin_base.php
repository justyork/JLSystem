<?php
include_once('./config.php');
include_once('./core/Controller.php');

// Ѕазовый контроллер сайта.
abstract class C_Admin_Base extends Controller {

    protected $title;
    protected $content;
    protected $tpl;
    protected $page_id = 0;
    protected $data = array();
    protected $errors = array();
    protected $menu;


    // Виртуальный обработчик запроса
    protected function OnInput(){

        //$this->menu = $this->GenerateMenuAdmin();
    }

    //
    // Виртуальный генератор HTML.
    //
    protected function OnOutput() {
        $vars = array(
            'title' => $this->title,
            'content' => $this->content,
            'menu' => $this->menu,
            'errors' => $this->errors,
            'data' => $this->data,
        );

        $page = $this->Template( 'admin', $vars );
        if(JL::ex('ajax', 1))
            $page = '';
        echo $page;
    }

    protected function GeneratePage($th){
        if(isset($_GET['id']))
            $this->page_id = (int)$_GET['id'];
        if(empty($_GET['action']))
            return $th->actionIndex();
        $action = 'action'.ucfirst($_GET['action']);

        if(!method_exists($th, $action))
            return;

        return $th->$action();
    }
    private function GenerateMenuAdmin(){
        Auth::PrepareAuth();
        $menu = array();
        if(Auth::Can( 'ADMIN_PANEL' ))$menu['Home'] = array( 'admin', 'icon-home');
        if(Auth::Can( 'USER_VIEW' ))$menu['Users'] = array( 'admin/users', 'icon-user');
        if(Auth::Can( 'GROUP_VIEW' ))$menu['Group'] = array( 'admin/group', 'icon-group');
        if(Auth::Can( 'CATEGORY_VIEW' ))$menu['Categories'] = array( 'admin/category', 'icon-list');
        if(Auth::Can( 'AREA_VIEW' ))$menu['City'] = array( 'admin/city', 'icon-globe');
        if(Auth::Can( 'AREA_VIEW' ))$menu['Area'] = array( 'admin/area', 'icon-home');
        if(Auth::Can( 'MODER_PANEL' ))$menu['Adversment Moderate'] = array( 'admin/adv', 'icon-ok');
        if(Auth::Can( 'TEXT' ))$menu['Text blocks'] = array( 'admin/text', 'icon-note');
        return $menu;
    }
}