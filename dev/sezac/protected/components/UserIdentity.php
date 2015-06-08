<?php

class UserIdentity extends CUserIdentity
{

	public function authenticate()
	{
            $record=Usuarios::model()->findByAttributes(
                array(
                    'usuario'=>$this->username
                )
            );
            if($record===null)
                $this->errorCode=self::ERROR_USERNAME_INVALID;                    
            else if (!password_verify($this->password, $record->password))
                $this->errorCode=self::ERROR_PASSWORD_INVALID;
            else {                    
                $this->setState('tipo',$record->tipo);
                $this->setState('idUsuario',$record->id);
                $this->errorCode=self::ERROR_NONE;                
            }
            return !$this->errorCode;
	}
}