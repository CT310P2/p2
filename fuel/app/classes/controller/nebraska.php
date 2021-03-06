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
      $ads = User::find_by('admin', 1);
      $adUsers = array();
      foreach($ads as $a){
        array_push($adUsers, $a->email);
      }
      $layout->set_safe('adUsers',$adUsers);
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
        $admins = Input::post('admins');
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

      $json_string = '[{"team":"1","nameShort":"rft","nameLong":"Roam Free Travel","eid":"smbrels"},
{"team":"2","nameShort":"Pinon","nameLong":"Pinon Mountain Ventures","eid":"chapmanc"},
{"team":"2","nameShort":"Pinon","nameLong":"Pinon Mountain Ventures","eid":"trohnke"},
{"team":"3","nameShort":"Bond ","nameLong":"James Bond","eid":"crgold"},
{"team":"3","nameShort":"Bond ","nameLong":"James Bond","eid":"myou"},
{"team":"4","nameShort":"KLICK","nameLong":"Kenny & Logan Interstate Commuting Kings","eid":"lvreed"},
{"team":"4","nameShort":"KLICK","nameLong":"Kenny & Logan Interstate Commuting Kings","eid":"nguyenkd"},
{"team":"5","nameShort":"Canoe","nameLong":"Definitely Not Kayak.com LLC","eid":"jsearl"},
{"team":"5","nameShort":"Canoe","nameLong":"Definitely Not Kayak.com LLC","eid":"isaach"},
{"team":"6","nameShort":"Y&L Travel Co.","nameLong":"Yasmin&Lettia Travel Company","eid":"lwilson1"},
{"team":"6","nameShort":"Y&L Travel Co.","nameLong":"Yasmin&Lettia Travel Company","eid":"yalshafa"},
{"team":"7","nameShort":"NKTA","nameLong":"North Korea Travel Agency","eid":"tsciano"},
{"team":"7","nameShort":"NKTA","nameLong":"North Korea Travel Agency","eid":"tjkinsey"},
{"team":"8","nameShort":"travelinc","nameLong":"Travelling trips Incorporated","eid":"sionf"},
{"team":"8","nameShort":"travelinc","nameLong":"Travelling trips Incorporated","eid":"brandok"},
{"team":"9","nameShort":"HPTS","nameLong":"Han Paczosa Travel Solutions","eid":"mpaczosa"},
{"team":"9","nameShort":"","nameLong":"","eid":""},
{"team":"10","nameShort":"Explore","nameLong":"Explore The States","eid":"sabrinaw"},
{"team":"10","nameShort":"Explore","nameLong":"Explore The States","eid":"acastain"},
{"team":"10","nameShort":"Explore","nameLong":"Explore The States","eid":"stefanou"},
{"team":"11","nameShort":"Aggies","nameLong":"Old Aggies","eid":"ewanlp"},
{"team":"11","nameShort":"Aggies","nameLong":"Old Aggies","eid":"zachrule"},
{"team":"12","nameShort":"CT-PO","nameLong":"Adventures of CT-PO","eid":"nbarouxi"},
{"team":"12","nameShort":"CT-PO","nameLong":"Adventures of CT-PO","eid":"gaddvi"},
{"team":"13","nameShort":"Bubba","nameLong":"Bubba’s Roadtrip Co.","eid":"char8330"},
{"team":"13","nameShort":"Bubba","nameLong":"Bubba’s Roadtrip Co.","eid":"anthos"},
{"team":"14","nameShort":"Traveler2","nameLong":"Traveler CT3102","eid":"jtperea"},
{"team":"14","nameShort":"Traveler3","nameLong":"Traveler CT3103","eid":"ehharris"},
{"team":"15","nameShort":"ncState","nameLong":"NorthCarolinaState","eid":"bhoyt"},
{"team":"15","nameShort":"ncState","nameLong":"NorthCarolinaState","eid":"royerj"},
{"team":"16","nameShort":"Travel Website","nameLong":"Courtney and Jon’s Travel Website","eid":"cntorres"},
{"team":"16","nameShort":"Travel Website","nameLong":"Courtney and Jon’s Travel Website","eid":"jonhunt"},
{"team":"17","nameShort":"MTD","nameLong":"Montana Travel Destinations","eid":"msfales"},
{"team":"17","nameShort":"MTD","nameLong":"Montana Travel Destination","eid":"johnylam"},
{"team":"18","nameShort":"MEMN","nameLong":"MaineMinnesota","eid":"bommarit"},
{"team":"18","nameShort":"MEMN","nameLong":"MaineMinnesota","eid":"wjntx"},
{"team":"19","nameShort":"Travel","nameLong":"US Travel Center","eid":"condesce"},
{"team":"19","nameShort":"Travel","nameLong":"US Travel Center","eid":"whiteaj"},
{"team":"20","nameShort":"TAD","nameLong":"TourAdvisor","eid":"novus"},
{"team":"20","nameShort":"TAD","nameLong":"TourAdvisor","eid":"mirrorad"},
{"team":"21","nameShort":"A&J travels","nameLong":"A&J traveling through America","eid":"jwelch31"},
{"team":"21","nameShort":"A&J travels","nameLong":"A&J traveling through America","eid":"abchawla"},
{"team":"22","nameShort":"PCA","nameLong":"People’s Choice Attractions","eid":"sbhuju"},
{"team":"22","nameShort":"PCA","nameLong":"People’s Choice Attractions","eid":"jewett"}]';

      $js = (Format::forge($json_string, 'json')->to_array());
      $allData = array();
      foreach($js as $singleLine){
        $allData[] = $singleLine;
      }



      $session = Session::instance();
      $layout = View::forge('nebraska/allDest');
      $nav = View::forge('nebraska/nav');

      $layout->set_safe('allData', $allData);
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
  
  public function action_all($eid, $id){
    $json_string = '[{"team":"1","nameShort":"rft","nameLong":"Roam Free Travel","eid":"smbrels"},
{"team":"2","nameShort":"Pinon","nameLong":"Pinon Mountain Ventures","eid":"chapmanc"},
{"team":"2","nameShort":"Pinon","nameLong":"Pinon Mountain Ventures","eid":"trohnke"},
{"team":"3","nameShort":"Bond ","nameLong":"James Bond","eid":"crgold"},
{"team":"3","nameShort":"Bond ","nameLong":"James Bond","eid":"myou"},
{"team":"4","nameShort":"KLICK","nameLong":"Kenny & Logan Interstate Commuting Kings","eid":"lvreed"},
{"team":"4","nameShort":"KLICK","nameLong":"Kenny & Logan Interstate Commuting Kings","eid":"nguyenkd"},
{"team":"5","nameShort":"Canoe","nameLong":"Definitely Not Kayak.com LLC","eid":"jsearl"},
{"team":"5","nameShort":"Canoe","nameLong":"Definitely Not Kayak.com LLC","eid":"isaach"},
{"team":"6","nameShort":"Y&L Travel Co.","nameLong":"Yasmin&Lettia Travel Company","eid":"lwilson1"},
{"team":"6","nameShort":"Y&L Travel Co.","nameLong":"Yasmin&Lettia Travel Company","eid":"yalshafa"},
{"team":"7","nameShort":"NKTA","nameLong":"North Korea Travel Agency","eid":"tsciano"},
{"team":"7","nameShort":"NKTA","nameLong":"North Korea Travel Agency","eid":"tjkinsey"},
{"team":"8","nameShort":"travelinc","nameLong":"Travelling trips Incorporated","eid":"sionf"},
{"team":"8","nameShort":"travelinc","nameLong":"Travelling trips Incorporated","eid":"brandok"},
{"team":"9","nameShort":"HPTS","nameLong":"Han Paczosa Travel Solutions","eid":"mpaczosa"},
{"team":"9","nameShort":"","nameLong":"","eid":""},
{"team":"10","nameShort":"Explore","nameLong":"Explore The States","eid":"sabrinaw"},
{"team":"10","nameShort":"Explore","nameLong":"Explore The States","eid":"acastain"},
{"team":"10","nameShort":"Explore","nameLong":"Explore The States","eid":"stefanou"},
{"team":"11","nameShort":"Aggies","nameLong":"Old Aggies","eid":"ewanlp"},
{"team":"11","nameShort":"Aggies","nameLong":"Old Aggies","eid":"zachrule"},
{"team":"12","nameShort":"CT-PO","nameLong":"Adventures of CT-PO","eid":"nbarouxi"},
{"team":"12","nameShort":"CT-PO","nameLong":"Adventures of CT-PO","eid":"gaddvi"},
{"team":"13","nameShort":"Bubba","nameLong":"Bubba’s Roadtrip Co.","eid":"char8330"},
{"team":"13","nameShort":"Bubba","nameLong":"Bubba’s Roadtrip Co.","eid":"anthos"},
{"team":"14","nameShort":"Traveler2","nameLong":"Traveler CT3102","eid":"jtperea"},
{"team":"14","nameShort":"Traveler3","nameLong":"Traveler CT3103","eid":"ehharris"},
{"team":"15","nameShort":"ncState","nameLong":"NorthCarolinaState","eid":"bhoyt"},
{"team":"15","nameShort":"ncState","nameLong":"NorthCarolinaState","eid":"royerj"},
{"team":"16","nameShort":"Travel Website","nameLong":"Courtney and Jon’s Travel Website","eid":"cntorres"},
{"team":"16","nameShort":"Travel Website","nameLong":"Courtney and Jon’s Travel Website","eid":"jonhunt"},
{"team":"17","nameShort":"MTD","nameLong":"Montana Travel Destinations","eid":"msfales"},
{"team":"17","nameShort":"MTD","nameLong":"Montana Travel Destination","eid":"johnylam"},
{"team":"18","nameShort":"MEMN","nameLong":"MaineMinnesota","eid":"bommarit"},
{"team":"18","nameShort":"MEMN","nameLong":"MaineMinnesota","eid":"wjntx"},
{"team":"19","nameShort":"Travel","nameLong":"US Travel Center","eid":"condesce"},
{"team":"19","nameShort":"Travel","nameLong":"US Travel Center","eid":"whiteaj"},
{"team":"20","nameShort":"TAD","nameLong":"TourAdvisor","eid":"novus"},
{"team":"20","nameShort":"TAD","nameLong":"TourAdvisor","eid":"mirrorad"},
{"team":"21","nameShort":"A&J travels","nameLong":"A&J traveling through America","eid":"jwelch31"},
{"team":"21","nameShort":"A&J travels","nameLong":"A&J traveling through America","eid":"abchawla"},
{"team":"22","nameShort":"PCA","nameLong":"People’s Choice Attractions","eid":"sbhuju"},
{"team":"22","nameShort":"PCA","nameLong":"People’s Choice Attractions","eid":"jewett"}]';
    $js = (Format::forge($json_string, 'json')->to_array());
    $allData = array();
    foreach($js as $singleLine){
      $allData[] = $singleLine;
    }
    
    
    
    $session = Session::instance();
    $layout = View::forge('nebraska/all');
    $nav = View::forge('nebraska/nav');
    $layout->set_safe('allData', $allData);
    $destss = View::forge('nebraska/dests');
    $dests = Dest::find('all');
    $destination = Dest::find($id);
  
    $layout->set_safe('id', $id);
    $layout->set_safe('eid', $eid);
    
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
      $session = Session::instance();
      $layout = View::forge('nebraska/addDest');
      $nav = View::forge('nebraska/nav');

      $destss = View::forge('nebraska/dests');
      $dests = Dest::find('all');

      $destss->set_safe('destss', $dests);
      $nav->set_safe('dests',$dests);
      $footer = View::forge('nebraska/footer');
      $layout->nav = Response::forge($nav);
      $layout->footer = Response::forge($footer);
      if(Input::post('name') && Input::post('imageName') && $overview = Input::post('overview') && $history = Input::post('history') && $facts = Input::post('facts')){
        $name = Input::post('name');
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
        $dest->image = $imagepath;
        $dest->imageName = $imageName;
        $dest->overview = $overview;
        $dest->history = $history;
        $dest->facts = $facts;

        $dest->save();
        $content = View::forge('nebraska/success');
        $status = 'success';
        $content -> set_safe('status',$status);
        return $content;}
        return $layout;
        }


    public function action_newUser(){
      $session = Session::instance();
      $layout = View::forge('nebraska/newUser');
      $nav = View::forge('nebraska/nav');

      $destss = View::forge('nebraska/dests');
      $dests = Dest::find('all');

      $destss->set_safe('destss', $dests);
      $nav->set_safe('dests',$dests);
      $footer = View::forge('nebraska/footer');
      $layout->nav = Response::forge($nav);
      $layout->footer = Response::forge($footer);
      if(Input::post('user') && Input::post('pass') && Input::post('email')){
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
      return $layout;
    }

    public function action_changePass(){
      $session = Session::instance();
      $layout = View::forge('nebraska/changePass');
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
        }
      $footer = View::forge('nebraska/footer');
      $layout->nav = Response::forge($nav);
      $layout->footer = Response::forge($footer);
      if(Input::post('oldPass') && Input::post('pass')){
        $old_password = Input::post('oldPass');
        $newPass = Input::post('pass');
        $user = User::query()->where('userName', '=', $username)->get_one();

        if((isset($username) && isset($old_password)) && (($username === $user->userName) && md5($old_password) === $user->userPass)){

        $user->userPass = md5($newPass);
        $user->save();

        }

      $content = View::forge('nebraska/success');
      $status = 'success';
      $content -> set_safe('status',$status);
      return $content;
      }
      return $layout;
    }

    public function action_forgotpass(){
      $emailName = Input::post('email');

      $entry = User::query()->where('email', '=', $emailName)->get_one();

      $new_password = Str::random('alpha', 10);

      $email = Email::forge();
      $email->from('sabrinaw@rams.colostate.edu', 'Sabrina White');
      $email->to($entry->email, $entry->userName);
      $email->subject('New Password');
      $email->body('Your new temporary password is '. $new_password. '. When you log back in, make sure to change your password');
      $email->send();

      $pass = md5($new_password);
      $entry->userPass = $pass;
      $entry->save();

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
