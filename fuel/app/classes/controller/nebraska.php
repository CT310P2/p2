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
    public function action_carhenge(){
        $session = Session::instance();
        $layout = View::forge('nebraska/carhenge');
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
    public function action_zooAqua(){
        $session = Session::instance();
        $layout = View::forge('nebraska/zooAqua');
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
    public function action_chimney(){
        $session = Session::instance();
        $layout = View::forge('nebraska/chimney');
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
    public function action_login(){
        $session = Session::instance();
        $layout = View::forge('nebraska/login');
        $nav = View::forge('nebraska/nav');
        $username = $session->get('username');
        if(isset($username)){
          $nav->set_safe('username',$username);
          $layout->set_safe('username',$username);
        }
        $footer = View::forge('nebraska/footer');

        $layout->nav = Response::forge($nav);
        $layout->footer = Response::forge($footer);

        return $layout;
    }
    public function action_check(){

        $username = Input::post('username');
        $password = Input::post('password');
        if(($username === 'ct310' && md5($password) === '48f2f942692b08ec9de1ef9ada5230a3') ||
            ($username === 'Luke' && $password === 'Ewan')) {
            Session::create();
            Session::set('username', $username);
            Session::set('userid', 12345);
            $content = View::forge('nebraska/success');

            $status = 'success';
            $content -> set_safe('status',$status);
            return $content;
        } else {
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
    }
    public function action_aboutus(){
    	$layout = View::forge('nebraska/about');
        $nav = View::forge('nebraska/nav');
        $footer = View::forge('nebraska/footer');

        $layout->nav = Response::forge($nav);
        $layout->footer = Response::forge($footer);
        return $layout;
	}
}


      return $content;
    }
}