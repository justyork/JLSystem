<?php
/**
 * Created by PhpStorm.
 * User: York
 * Date: 06.11.2015
 * Time: 11:25
 */

class C_Admin_Index extends C_Admin_Base{
    protected function OnInput(){
        parent::OnInput();
        return $this->GeneratePage($this);
    }


    protected function OnOutput(){
        $vars = array( 'data' => $this->data );
        $this->content = $this->Template( $this->tpl, $vars);

        parent::OnOutput();
    }


    public function actionIndex(){

        $this->tpl = 'admin/index/index';
    }

    public function actionLogout(){
        Auth::Logout('c_admin_index');
        JL::redirect('/');
    }

} 