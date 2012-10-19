<?php
class UsersController extends AppController{


    public function login() {
        $this->autoRender=false;
        $username=$this->request->data['User']['username'];
        $password=$this->request->data['User']['password'];
        if(!empty($username) && !empty($password))
        {
            if ($this->request->is('post')) {
                if ($this->Auth->login()) {
                    $this->redirect($this->Auth->redirect());
                } else {
                    $this->Session->setFlash(__('Invalid username or password, try again'));
                }
            }
        }
        else
        {
            $this->Session->setFlash(__('Enter username and password'));
        }
    }

    public function logout() {
        $this->redirect($this->Auth->logout());
    }


}

?>