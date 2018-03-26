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
        if(isset($username)){
          $nav->set_safe('username',$username);
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
        if(isset($username)){
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
        if(isset($username)){
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
        if(isset($username)){
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
        if(isset($username)){
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
        if(isset($username)){
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
    public function action_login(){
        $session = Session::instance();
        $layout = View::forge('nebraska/login');
        $nav = View::forge('nebraska/nav');
        $username = $session->get('username');
        if(isset($username) && isset($password)){
          $nav->set_safe('username',$username);
          $layout->set_safe('username',$username);
          $layout->set_safe('password',$password);
        }
        $footer = View::forge('nebraska/footer');

        $layout->nav = Response::forge($nav);
        $layout->footer = Response::forge($footer);

        return $layout;
    }
    public function action_check(){
      require_once 'user.php';
      $user_login = new USER();

        $username = Input::post('username');
        $password = Input::post('password');
        //userName and userPass are col names in db
        if($user_login->login($username,$password)) { //tries to sign the user in, and send them to home page
            Session::create();
            Session::set('username', $username);
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
