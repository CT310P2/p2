<?php

use Model\Nebraska;


class Controller_Nebraska extends Controller
{

    public function action_index()
    {
        $session = Session::instance();
        $layout = View::forge('nebraska/index');
        $nav = View::forge('nebraska/nav');
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
    public function action_carhenge(){
        $session = Session::instance();
        $layout = View::forge('nebraska/carhenge');
        $nav = View::forge('nebraska/nav');
        $comment = View::forge('nebraska/comment');
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
    public function action_zooAqua(){
        $session = Session::instance();
        $layout = View::forge('nebraska/zooAqua');
        $nav = View::forge('nebraska/nav');
        $comment = View::forge('nebraska/comment');
        $username = $session->get('username');
        $admin = $session->get('admin');
        if(isset($username)){
          $nav->set_safe('admin', $admin);
          $layout->set_safe('username',$username);
          $comment->set_safe('username',$username);
          $nav->set_safe('username',$username);
        }
        $footer = View::forge('nebraska/footer');

        $layout->nav = Response::forge($nav);
        $layout->comment = Response::forge($comment);
        $layout->footer = Response::forge($footer);
        return $layout;
    }
    public function action_chimney(){
        $session = Session::instance();
        $layout = View::forge('nebraska/chimney');
        $nav = View::forge('nebraska/nav');
        $comment = View::forge('nebraska/comment');
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
      $dests = View::forge('nebraska/dests');
      $username = $session->get('username');
      $admin = $session->get('admin');
      if(isset($username)){
        $nav->set_safe('admin', $admin);
        $nav->set_safe('username',$username);
        $dests->set_safe('admin', $admin);
        $dests->set_safe('username',$username);
        $layout->set_safe('username',$username);
      }
      $footer = View::forge('nebraska/footer');

      $layout->nav = Response::forge($nav);
      $layout->dests = Response::forge($dests);
      $layout->footer = Response::forge($footer);

      return $layout;
    }
    public function action_login(){
        $session = Session::instance();
        $layout = View::forge('nebraska/login');
        $nav = View::forge('nebraska/nav');
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

    public function action_addDest(){

          $name = Input::post('name');
          $image = Input::post('image');
          $imageName = Input::post('imageName');
          $overview = Input::post('overview');
          $history = Input::post('history');
          $facts = Input::post('facts');

          $query = DB::query("INSERT INTO destinations (name, image, imageName, overview, history, facts) VALUES (:name, :image, :imageName, :overview, :history, :facts)");
          $query->parameters(array('name' => $name, 'image' => $image, 'imageName' => $imageName, 'overview' => $overview, 'history' => $history, 'facts' => $facts))->execute();

          $content = View::forge('nebraska/success');
          $status = 'success';
          $content -> set_safe('status',$status);
          return $content;
    }

    public function action_order(){
    
      $session = Session::instance();
      $layout = View::forge('nebraska/order');
      $nav = View::forge('nebraska/nav');
      $dests = View::forge('nebraska/dests');
      $username = $session->get('username');
      $admin = $session->get('admin');
      if(isset($username)){
        $nav->set_safe('admin', $admin);
        $nav->set_safe('username',$username);
        $dests->set_safe('admin', $admin);
        $dests->set_safe('username',$username);
        $layout->set_safe('username',$username);
      }
      $footer = View::forge('nebraska/footer');

      $layout->nav = Response::forge($nav);
      $layout->dests = Response::forge($dests);
      $layout->footer = Response::forge($footer);

      return $layout;
    }

    public function action_nUser(){

      $name = Input::post('user');
      if (Input::post('admin')){ $admin = 1; }else {$admin = 0;}
      $pass = md5(Input::post('pass'));

      $query = DB::query("INSERT INTO users (userName,admin,userPass) VALUES  (:name, :admin, :pass)");
      $query->parameters(array('name' => $name, 'admin' => $admin, 'pass' => $pass))->execute();

      $content = View::forge('nebraska/success');
      $status = 'success';
      $content -> set_safe('status',$status);
      return $content;
    }

    public function action_check(){

        $username = Input::post('username');
        $password = Input::post('password');
        $query = "SELECT * FROM users where userName = :username";
        $result = DB::query($query)->bind('username', $username)->execute();
        $result->as_array();
        $user = $result[0];
        $admin = $user['admin'];
        if((isset($username) && isset($password)) && ($username === $user['userName'] && md5($password) === $user['userPass'])) { //tries to sign the user in, and send them to home page
            Session::create();
            Session::set('username', $username);
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
