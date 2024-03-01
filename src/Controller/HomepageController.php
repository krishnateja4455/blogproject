<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Utility\Text;
use Cake\Datasource\ConnectionManager;

class HomepageController extends AppController{


    public function initialize(){
        parent::initialize();
        $this->viewBuilder()->setLayout('HomepageLayout');
        $this->Auth->allow('index');
    }


    public function index(){
            $session=$this->request->getSession();
            $user=$session->read('user');
            $posts=$this->BlogPosts->find('all')->order(['id'=>'DESC'])->limit(2)->toArray();

            $sql="select * from blog_posts inner join profile_detailes on
             blog_posts.user_id=profile_detailes.user_id where blog_posts.category_id=
             1 order by blog_posts.id desc  limit 9";
             $con=ConnectionManager::get('default');
             $stmt=$con->execute($sql);
             $politicalPosts=$stmt->fetchAll('assoc');

            $userProfile=$this->ProfileDetailes->find('all')->where(['user_id'=>$user['id']])->first();
            //echo "<pre>";print_r($politicalPosts);exit;
            $this->set(compact('posts'));
            $this->set(compact('userProfile'));
            $this->set(compact('politicalPosts'));


    }

    public function upload(){
          $Categories=$this->Categories->find('all')->toArray();
          $this->set(compact('Categories'));
          $session=$this->request->getSession();
          $user=$session->read('user');

       if($this->request->is('post')){

         $name=$this->request->data['image']['name'];
         $extension=pathinfo($name,PATHINFO_EXTENSION);
         $uniqueName=Text::uuid().".".$extension;
        $tmpname=$this->request->data['image']['tmp_name'];
        $destinationpath=WWW_ROOT."images/".$uniqueName;
        move_uploaded_file($tmpname,$destinationpath);

        $detailes=array(
          "heading"=>$this->request->data['heading'],
          "content"=>$this->request->data['content'],
          "image"=>$uniqueName,
          "user_id"=>$user['id'],
          "date_time"=>date("Y-m-d H:i:s"),
          "category_id"=>$this->request->data['category']
        );
        $blog=$this->BlogPosts->newEntity();
        $blog=$this->BlogPosts->patchEntity($blog,$detailes);
         if($this->BlogPosts->save($blog)){
           $this->Flash->success("Blog Uploaded Successfully");
           return $this->redirect(['action'=>'index']);
         }

       }
    }

    public function profile(){

      $session=$this->request->getSession();
      $user=$session->read('user');
      $userProfile=$this->ProfileDetailes->find('all')->where(['user_id'=>$user['id']])->first();
      //print_r($userProfile);
      //exit;
      $this->set(compact('userProfile'));
           if($this->request->is('post')){

             $name=$this->request->data['photo']['name'];
             $extension=pathinfo($name,PATHINFO_EXTENSION);
             $uniqueName=Text::uuid().".".$extension;
            $tmpname=$this->request->data['photo']['tmp_name'];
            $destinationpath=WWW_ROOT."images/".$uniqueName;
            move_uploaded_file($tmpname,$destinationpath);

            $detailes=array(
              "name"=>$this->request->data['name'],
              "about"=>$this->request->data['about'],
              "image_name"=>$uniqueName,
              "user_id"=>$user['id']
            );
            $profile=$this->ProfileDetailes->newEntity();
            $profile=$this->ProfileDetailes->patchEntity($profile,$detailes);
             if($this->ProfileDetailes->save($profile)){
               $this->Flash->success("Profiles Detailes Added Successfully");
               return $this->redirect(['action'=>'profile']);
             }
           }

    }

    public function profileedit(){

       if(!empty($_GET['id'])){
          $id=$_GET['id'];
          $detailes=$this->ProfileDetailes->get($id);
          $this->set(compact('detailes'));
          //echo "<pre>";print_r($detailes);exit;
       }

    }

    public function profileupdate(){

      if($this->request->is('post')){
        $data=$this->request->data;
        $tempname=$data['photo']['tmp_name'];
         if(empty($tempname)){
           $this->ProfileDetailes->updateAll(['name'=>$data['name'],'about'=>$data['about']],['id'=>$data['id']]);
           $this->Flash->success("Profile Detailes Updated Successfully");
           return $this->redirect(['action'=>'profile']);
         }else{

           $name=$data['photo']['name'];
           $extension=pathinfo($name,PATHINFO_EXTENSION);
           $uniqueName=Text::uuid().".".$extension;
          $destinationpath=WWW_ROOT."images/".$uniqueName;
          move_uploaded_file($tempname,$destinationpath);
          $this->ProfileDetailes->updateAll(['name'=>$data['name'],'about'=>$data['about'],'image_name'=>$uniqueName],['id'=>$data['id']]);
             $this->Flash->success("Profile Detailes Updated Successfully");
             return $this->redirect(['action'=>'profile']);
         }



      }
    }


  /*
    public function sample(){
      $this->loadModel('Users');
      $data=array('username'=>'krishna','password'=>'123456');
      $user=$this->Users->newEntity();
      $user=$this->Users->patchEntity($user,$data);
      $this->Users->save($user);
      exit;

    }
*/

}

?>
