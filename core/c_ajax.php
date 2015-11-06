<?php
class C_Ajax extends C_Base{
	protected function OnInput(){
        parent::OnInput();

        return $this->GeneratePage($this);
    }
 


} 


