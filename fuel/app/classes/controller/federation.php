<?php
use Model\Dest;
use Model\User;
use Model\Comments;
use Model\Cart;
class Controller_Federation extends Controller {

  public function action_index(){
    //make session
    $session = Session::instance();
    //create the entire layout for page
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
  public function action_status(){
    $session = Session::instance();
    //create the entire layout for page
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
}
