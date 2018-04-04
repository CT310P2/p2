<?php
use Model\Nebraska;
use Model\Dest;
class Controller_Nebraska extends Controller
{
    public function action_index() {

        $session = Session::instance();
        $layout = View::forge('nebraska/index');
        $nav = View::forge('nebraska/nav');
        $dests = Dest::find('all');
    		$destString;
    		foreach($dests as $key=>$dest){
    			$destString[$key] = $dest['id']." ".$dest['name']." ".$dest['image']." ".$dest['imageName']." ".$dest['overview']." ".$dest['history']." ".$dest['facts'];
    		}
    		$nav->set_safe('dests', $destString);
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
    		$destString;
    		foreach($dests as $key=>$dest){
    			$destString[$key] = $dest['id']." ".$dest['name']." ".$dest['image']." ".$dest['imageName']." ".$dest['overview']." ".$dest['history']." ".$dest['facts'];
    		}
    		$nav->set_safe('dests', $destString);
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
    		$destString;
    		foreach($dests as $key=>$dest){
    			$destString[$key] = $dest['id']." ".$dest['name']." ".$dest['image']." ".$dest['imageName']." ".$dest['overview']." ".$dest['history']." ".$dest['facts'];
    		}
    		$nav->set_safe('dests', $destString);
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
        $dests = Dest::find('all');
    		$destString;
    		foreach($dests as $key=>$dest){
    			$destString[$key] = $dest['id']." ".$dest['name']." ".$dest['image']." ".$dest['imageName']." ".$dest['overview']." ".$dest['history']." ".$dest['facts'];
    		}
    		$nav->set_safe('dests', $destString);
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


    	public function action_view($name)
	{
        $session = Session::instance();
        $layout = View::forge('nebraska/layoutfull');
        $nav = View::forge('nebraska/nav');
        $dests = Dest::find('all');
    		$destString;
    		foreach($dests as $key=>$dest){
    			$destString[$key] = $dest['id']." ".$dest['name']." ".$dest['image']." ".$dest['imageName']." ".$dest['overview']." ".$dest['history']." ".$dest['facts'];
    		}
    		$nav->set_safe('dests', $destString);
        $comment = View::forge('nebraska/comment');
        $dest = Dest::find($name);
        $layout->set_safe('dest', $dest);
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
        $dests = Dest::find('all');
    		$destString;
    		foreach($dests as $key=>$dest){
    			$destString[$key] = $dest['id']." ".$dest['name']." ".$dest['image']." ".$dest['imageName']." ".$dest['overview']." ".$dest['history']." ".$dest['facts'];
    		}
    		$nav->set_safe('dests', $destString);
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
        $dests = Dest::find('all');
    		$destString;
    		foreach($dests as $key=>$dest){
    			$destString[$key] = $dest['id']." ".$dest['name']." ".$dest['image']." ".$dest['imageName']." ".$dest['overview']." ".$dest['history']." ".$dest['facts'];
    		}
    		$nav->set_safe('dests', $destString);
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
      $dests = Dest::find('all');
      $destString;
      foreach($dests as $key=>$dest){
        $destString[$key] = $dest['id']." ".$dest['name']." ".$dest['image']." ".$dest['imageName']." ".$dest['overview']." ".$dest['history']." ".$dest['facts'];
      }
      $nav->set_safe('dests', $destString);
      $dests = View::forge('nebraska/dests');
      $dest = Dest::find('all');
      $dests->set_safe('dest', $dest);
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
        $dests = Dest::find('all');
    		$destString;
    		foreach($dests as $key=>$dest){
    			$destString[$key] = $dest['id']." ".$dest['name']." ".$dest['image']." ".$dest['imageName']." ".$dest['overview']." ".$dest['history']." ".$dest['facts'];
    		}
    		$nav->set_safe('dests', $destString);
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

        $dest = new Dest();

        $dest->name = $name;
        $dest->image = $image;
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
      $query = DB::query("INSERT INTO users (userName,admin,userPass,email) VALUES  (:name, :admin, :pass, :email)");
      $query->parameters(array('name' => $name, 'admin' => $admin, 'pass' => $pass, 'email' => $email))->execute();
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
