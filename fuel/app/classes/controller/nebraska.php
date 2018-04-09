<?php
use Model\Dest;
use Model\User;
use Model\Comments;
use Model\Cart;
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

    public function action_cart($username){
      $session = Session::instance();
      $layout = View::forge('nebraska/cart');
      $nav = View::forge('nebraska/nav');
      $layout->set_safe('username',$username);
      $entry = User::query()->where('username', '=', $username)->get_one()->to_array();
      $email = $entry['email'];
      $layout->set_safe('email',$email);
      $dests = Dest::find('all');
      //returns an object with all usernames
      $carts = Cart::find_by('userName',$username);
      $dId = array(); //array with all dId's that need to be printed
      $dNames = array(); //array with all the destination names that need to be printed
      foreach ($carts as $c){
        array_push($dId, $c->dId);
      }
      foreach ($dId as $d){ //store all destinations
        $query = Dest::find_by('id', $d);
        foreach($query as $q){
          array_push($dNames, $q->name);
        }
      }
      $layout->set_safe('dNames',$dNames);

      $nav->set_safe('dests',$dests);
      $layout->set_safe('dests',$dests);
      $layout->set_safe('carts',$carts);

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

      $desT = Dest::find('all');
      $nav->set_safe('dests',$desT);

      $destination = Dest::find($id);
      $layout->set_safe('destination', $destination);

      //contains all comments for this dest
      $com = Comments::find('all', array('where' => array(array('dId',$id))));
      $layout->set_safe('comment', $com);

      $username = $session->get('username');
      $query = "SELECT * FROM users where userName = :username";
      $result = DB::query($query)->bind('username', $username)->execute();
      $result->as_array();
      $user = $result[0];
      $uId = $user['id'];

      $layout->set_safe('user', $user);

      $admin = $session->get('admin');
      if(isset($username)){
        $nav->set_safe('admin', $admin);
        $layout->set_safe('username',$username);
        $nav->set_safe('username',$username);
      }
      $footer = View::forge('nebraska/footer');
      $layout->nav = Response::forge($nav);
      $layout->footer = Response::forge($footer);

      if (isset($_POST['cSub'])){
        //start of user table info

        //start of destination table info
        $destID = Input::post('destId');
        $destName = Input::post('destName');

        //start of comment table info
        $deleted = 0; //default 0 (false, meaning it should be displayed(has not been deleted))
        $commentText = Input::post('commentText');

        $comment = new Comments();

        $comment->userId= $uId;
        $comment->userName = $username;
        $comment->destName = $destName;
        $comment->commentText = $commentText;
        $comment->deleted = $deleted; //if the comment has been deleted by an admin, should not be dsiplayed if 1
        $comment->postTime = date('Y-m-d H:i:s');
        $comment->dId = $destID;

        $comment->save();
        $content = View::forge('nebraska/success');
        $status = 'success';
        $content -> set_safe('status',$status);
        return $content;
      }
      if(isset($_POST['addDestt'])){
        $destID = Input::post('destId');
        $cart = new Cart();
        $cart->dId = $destID;
        $cart->uId = $uId;
        $cart->userName = $username;
        $cart->save();
        $content = View::forge('nebraska/success');
        $status = 'success';
        $content -> set_safe('status',$status);
        return $content;
      }
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
