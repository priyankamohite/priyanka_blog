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
            $this->Comment->create();
            if ($this->Comment->save($this->request->data)) {


                if ($this->__sendRegistrationEmail()) {
//                    pr($this->request->data);die;
                    $this->Session->setFlash(__('Mail has been sent to you on your email-id'));

                } else {
                    $this->Session->setFlash(__('There may be some error, please try again'));
                }


                $this->Session->setFlash('Your post has been saved.');
                $this->redirect(array('controller'=>'posts','action' => 'index'));
            } else {
                $this->Session->setFlash('Unable to add your post.');
            }
        }
    }


    public function __sendRegistrationEmail()
    {
//                pr($this->request->data);die;

        if ($this->request->is('post') && !empty($this->request->data)) {
            $data['from'] = $this->request->data['Comment']['username'];
            $data['fromName'] = $this->request->data['Comment']['name'];
            $data['to'] = 'priyankamohite@yopmail.com';
            $data['toName'] = 'Admin';
            $data['template'] = 'verify_email'; // this the ctp which goes into your View/Emails/html/verify_email.ctp
            $data['subject'] = 'Comments';
//            pr($data);die;
            $this->sendSmtpMail($data);
        }
        return true;
    }
}
?>