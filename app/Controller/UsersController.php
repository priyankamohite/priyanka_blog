<?php
class UsersController extends AppController{


    public function login() {
        $this->autoRender=false;

            if ($this->request->is('post')) {
                if ($this->Auth->login()) {
                    $this->redirect($this->Auth->redirect());
                } else {
                    $this->Session->setFlash(__('Invalid username or password, try again'));
                    $this->redirect(array('controller'=>'posts','action' => 'index'));
                }
            }
        }



    public function logout() {
        $this->redirect($this->Auth->logout());
    }


}

?>