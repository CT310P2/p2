<?php
use Model\Dest;
use Model\User;
use Model\Comments;
class Controller_Nebraska extends Controller
{
    public function action_index() {

        $session = Session::instance();
        $layout = View::forge('nebraska/index');
        $nav = View::forge('nebraska/nav');
        $dests = Dest::find('all');
        $nav->set_safe('dests',$dests);
        $username = $session->get('username');
        $admin = $session->get('admin');
        if(isset($username)){
          $nav->set_safe('username',$username);
          if(isset($admin)){
            $nav->set_safe('admin', $admin);
          }
        }
        $carosel = View::forge('nebraska/carosel');
        $places = View::forge('nebraska/places');
        $footer = View::forge('nebraska/footer');
        $layout->nav = Response::forge($nav);
        $layout->carosel = Response::forge($carosel);
        $layout->places = Response::forge($places);
        $layout->footer = Response::forge($footer);
        return $layout;
    }
    public function action_about()
    {
        $session = Session::instance();
        $layout = View::forge('nebraska/about');
        $nav = View::forge('nebraska/nav');
        $dests = Dest::find('all');
        $nav->set_safe('dests',$dests);
        $username = $session->get('username');
        $admin = $session->get('admin');
        if(isset($username)){
          $nav->set_safe('admin', $admin);
          $nav->set_safe('username',$username);
        }
        $footer = View::forge('nebraska/footer');
        $layout->nav = Response::forge($nav);
        $layout->footer = Response::forge($footer);
        return $layout;
    }
    public function action_credits()
    {
        $session = Session::instance();
        $layout = View::forge('nebraska/credits');
        $nav = View::forge('nebraska/nav');

        $dests = Dest::find('all');
        $nav->set_safe('dests',$dests);

        $username = $session->get('username');
        $admin = $session->get('admin');
        if(isset($username)){
          $nav->set_safe('admin', $admin);
          $nav->set_safe('username',$username);
        }
        $footer = View::forge('nebraska/footer');
        $layout->nav = Response::forge($nav);
        $layout->footer = Response::forge($footer);
        return $layout;
    }

    public function action_view($id)
{
      $session = Session::instance();
      $layout = View::forge('nebraska/layoutfull');
      $nav = View::forge('nebraska/nav');
      $comment = View::forge('nebraska/comment');

      $dests = Dest::find('all');
      $nav->set_safe('dests',$dests);

      $dest = Dest::find($id);
      $layout->set_safe('dest', $dest);
  
      //contains all comments for this dest
      $com = Comments::find('all', array('where' => array(array('dId',$id))));
      $comment->set_safe('comment', $com);
      
      $username = $session->get('username');
      $admin = $session->get('admin');
      if(isset($username)){
        $nav->set_safe('admin', $admin);
        $layout->set_safe('username',$username);
        $nav->set_safe('username',$username);
        $comment->set_safe('username',$username);
      }
      $footer = View::forge('nebraska/footer');
      $layout->nav = Response::forge($nav);
      $layout->comment = Response::forge($comment);
      $layout->footer = Response::forge($footer);
      return $layout;
}

    public function action_allDest(){
      $session = Session::instance();
      $layout = View::forge('nebraska/allDest');
      $nav = View::forge('nebraska/nav');

      $destss = View::forge('nebraska/dests');
      $dests = Dest::find('all');

      $destss->set_safe('destss', $dests);
      $nav->set_safe('dests',$dests);
      $username = $session->get('username');
      $admin = $session->get('admin');
      if(isset($username)){
        $nav->set_safe('admin', $admin);
        $nav->set_safe('username',$username);
        $destss->set_safe('admin', $admin);
        $destss->set_safe('username',$username);
        $layout->set_safe('username',$username);
      }
      $footer = View::forge('nebraska/footer');
      $layout->nav = Response::forge($nav);
      $layout->destss = Response::forge($destss);
      $layout->footer = Response::forge($footer);
      return $layout;
    }

    public function action_login(){
        $session = Session::instance();
        $layout = View::forge('nebraska/login');
        $nav = View::forge('nebraska/nav');
        $dests = Dest::find('all');
        $nav->set_safe('dests',$dests);
        $username = $session->get('username');
        $admin = $session->get('admin');
        if(isset($username) && isset($password)){
          $nav->set_safe('admin', $admin);
          $nav->set_safe('username',$username);
          $layout->set_safe('username',$username);
          $layout->set_safe('password',$password);
        }
        $footer = View::forge('nebraska/footer');
        $layout->nav = Response::forge($nav);
        $layout->footer = Response::forge($footer);
        return $layout;
    }

    public function post_addComment($id){
      $session = Session::instance();
      if (isset($_POST['cEntry'])){
        //start of user table info
        $username = $session->get('username'); //name of current user adding comment
        $user = User::find($username); //has all user data!
        $uId = $user->id;
        
        //start of destination table info
        $dest = Dest::find($id); //the current destination, can access all dest info (name, image, etc.)
        $destID = $dest->id;
        $destName = $dest->name;
        
        //start of comment table info
        $deleted = 0; //default 0 (false, meaning it should be displayed(has not been deleted))
        $commentText = Input::post('commentText');
        
        $comment = new Comments();
        
        $comment->userId = $uId;
        $comment->userName = $username;
        $comment->destName = $destName;
        $comment->commentText = $commentText;
        $comment->postTime = date();
        $comment->deleted = $deleted; //if the comment has been deleted by an admin, should not be dsiplayed if 1
        $comment->postTime = $destID;
  
        $comment->save();
        $content = View::forge('nebraska/success');
        $status = 'success';
        $content -> set_safe('status',$status);
        return $content;
      }
    }

    public function action_addDest(){
        $name = Input::post('name');
//         $image = Input::post('image');
        $imageName = Input::post('imageName');
        $overview = Input::post('overview');
        $history = Input::post('history');
        $facts = Input::post('facts');

        $dest = new Dest();

    $config = array(
        'path' => DOCROOT.'assets/img',
        'randomize' => true,
        'ext_whitelist' => array('img', 'jpg', 'jpeg', 'gif', 'png'),
        );
        
        Upload::process($config);
        
        if (Upload::is_valid()){
            Upload::save();
            }

        $imagepath = Upload::get_files()[0]['saved_as'];
        
        $dest->name = $name;
//         $dest->image = $image;
        $dest->imageName = $imageName;
        $dest->overview = $overview;
        $dest->history = $history;
        $dest->facts = $facts;

        $dest->save();
        $content = View::forge('nebraska/success');
        $status = 'success';
        $content -> set_safe('status',$status);
        return $content;
        }


    public function action_nUser(){
      $name = Input::post('user');
      $email = Input::post('email');
      if (Input::post('admin')){ $admin = 1; }else {$admin = 0;}
      $pass = md5(Input::post('pass'));
      
      $user = new User();
      $user->userName = $name;
      $user->admin = $admin;
      $user->userPass = $pass;
      $user->email = $email;
      
      $user->save();
      
      $content = View::forge('nebraska/success');
      $status = 'success';
      $content -> set_safe('status',$status);
      return $content;
    }
    public function action_check(){
        $username = Input::post('username');
        $password = Input::post('password');
        $query = "SELECT * FROM users where userName = :username or email = :username";
        $result = DB::query($query)->bind('username', $username)->execute();
        $result->as_array();
        $user = $result[0];
        $admin = $user['admin'];
        if((isset($username) && isset($password)) && (($username === $user['userName'] || $username === $user['email']) && md5($password) === $user['userPass'])) { //tries to sign the user in, and send them to home page
            Session::create();
            Session::set('username', $user['userName']);
            
            Session::set('admin', $admin);
            Session::set('userid', 12345);
            $content = View::forge('nebraska/success');
            $status = 'success';
            $content -> set_safe('status',$status);
            return $content;
        }
        else {
            $content = View::forge('nebraska/loginError');
            $nav = View::forge('nebraska/nav');
            $footer = View::forge('nebraska/footer');
            $dests = Dest::find('all');
            $nav->set_safe('dests',$dests);
            $content->nav = Response::forge($nav);
            $content->footer = Response::forge($footer);
            $content->set_safe('status','error');
            return $content;
        }
    }
    public function action_logout()
    {
      $session = Session::instance();
      $session->destroy();
      $content = View::forge('nebraska/logout');
      return $content;
    }
}
