<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Auth\DefaultPasswordHasher;


class UsersController extends AppController{

   public function initialize(){
     parent::initialize();
     $this->viewBuilder()->setLayout('AuthenticationLayout');
     $this->Auth->allow('signup');

   }

   public function login(){
     if ($this->request->is('post')) {
          $user=$this->Auth->identify();
          if ($user) {
                  $this->Auth->setUser($user);
                  $session = $this->request->getSession();
                  $session->write('user',$user);
                  $this->Flash->success(__('Successfully Logged In'));
                  return $this->redirect($this->Auth->redirectUrl());
          }
           $this->Flash->error(__('Invalid username or password, try again'));
        }



   }

   public function signup(){
    if($this->request->is('post')){

     $password=$this->request->data['password'];
     $confirmpassword=$this->request->data['confirmpassword'];
     if($password===$confirmpassword){
      /*
       $hashed=new DefaultPasswordHasher();
       $hashedPassword=$hashed->hash($password);
       $this->request->data['password']=$hashedPassword;
       */
       $user=$this->Users->newEntity();
       $user=$this->Users->patchEntity($user,$this->request->data);

       if($this->Users->save($user)){
         $this->Flash->success("Successfully Registered");
         return $this->redirect(['controller'=>'Users','action'=>'login']);
       }else{
         $this->Flash->success("Error While Signup");
       }

     }else{

       $this->Flash->error("Passwords not matching");
     }

   }
 }

   public function signout(){
    $session = $this->request->getSession();
    $session->destroy();
 		return $this->redirect($this->Auth->logout());


 	}

  


}


?>
