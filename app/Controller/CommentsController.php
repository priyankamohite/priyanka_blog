<?php
class CommentsController extends AppController {
    public $helpers = array('Html', 'Form');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add');
    }

    public function index() {
        $this->set('comments', $this->Comment->find('all'));
    }

    public function add() {
        $this->log($this->request->data);
        if ($this->request->is('post')) {
//            pr($_POST);die;
            $this->request->data['Comment']['comment']=$_POST['editor'];
//            pr($this->request->data);die;
            $this->Comment->create();
            if ($this->Comment->save($this->request->data)) {
                if ($this->__sendRegistrationEmail()) {

                    $this->Session->setFlash(__('Mail has been sent to you on your email-id'));
                } else {
                    $this->Session->setFlash(__('There may be some error, please try again'));
                }
                $this->Session->setFlash('Your Comment has been saved.');
                $this->redirect(array('controller'=>'posts','action' => 'index'));
            } else {
                $this->Session->setFlash('Unable to add your post.');
            }
        }
    }


    public function __sendRegistrationEmail()
    {

        if ($this->request->is('post') && !empty($this->request->data)) {
            $data['from'] = $this->request->data['Comment']['username'];
            $data['fromName'] = $this->request->data['Comment']['name'];
//            $data['to'] = 'priyankamohite@yopmail.com';
            $data['to'] = 'mohitepriya19@gmail.com';
            $data['toName'] = 'Admin';
            $data['template'] = 'verify_email'; // this the ctp which goes into your View/Emails/html/verify_email.ctp
            $data['subject'] = 'Comments';
            $this->sendSmtpMail($data);
        }
        return true;
    }

    public function update($id = null) {
        $this->autoRender=false;
        $this->Comment->id = $id;
        $this->request->data=$this->Comment->find('first',array('conditions'=>array('Comment.id'=>$id)));
        $this->request->data['Comment']['is_approve']=1;
            if ($this->Comment->save($this->request->data)) {
                $this->Session->setFlash('Comment has been approved.');
                $this->redirect(array('controller'=>'posts','action' => 'index'));
            } else {
                $this->Session->setFlash('Unable to approve comment.');
            }
        }

}
?>
