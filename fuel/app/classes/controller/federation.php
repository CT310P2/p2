<?php
use Model\Dest;
use Model\User;
use Model\Comments;
use Model\Cart;
class Controller_Federation extends Controller{
  public function get_status(){
    $array = array('status' => 'closed');
    $response = Response::forge(json_encode($array));
    $response->set_header('Content-Type', 'application/json');
    return $response;
  }
  public function action_allstatus(){

    //start of everything for the view
    $session = Session::instance();
    $layout = View::forge('federation/allstatus');
    $nav = View::forge('federation/nav');
    $dests = Dest::find('all');
    $nav->set_safe('dests',$dests);

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
    {"team":"16","nameShort":"","nameLong":"","eid":""},
    {"team":"17","nameShort":"MTD","nameLong":"Montana Travel Destinations","eid":"msfales"},
    {"team":"17","nameShort":"","nameLong":"","eid":""},
    {"team":"18","nameShort":"MEMN","nameLong":"MaineMinnesota","eid":"bomarrit"},
    {"team":"18","nameShort":"MEMN","nameLong":"MaineMinnesota","eid":"wjntx"},
    {"team":"19","nameShort":"Travel","nameLong":"US Travel Center","eid":"condesce"},
    {"team":"19","nameShort":"","nameLong":"","eid":""},
    {"team":"20","nameShort":"TAD","nameLong":"TourAdvisor","eid":"novus"},
    {"team":"20","nameShort":"TAD","nameLong":"TourAdvisor","eid":"mirrorad"},
    {"team":"21","nameShort":"A&J travels","nameLong":"A&J traveling through America","eid":"jwelch31"},
    {"team":"21","nameShort":"A&J travels","nameLong":"A&J traveling through America","eid":"abchawla"},
    {"team":"22","nameShort":"PCA","nameLong":"People’s Choice Attractions","eid":"sbhuju"},
    {"team":"22","nameShort":"PCA","nameLong":"People’s Choice Attractions","eid":"jewett"}]';

    //create $allData - array with all json, passed to view
    $js = (Format::forge($json_string, 'json')->to_array());
    $allData = array();
    foreach($js as $singleLine){
      $allData[] = $singleLine;
    }
    $layout->set_safe('allData', $allData);

    $username = $session->get('username');
    $admin = $session->get('admin');
    if(isset($username)){
      $nav->set_safe('username',$username);
      if(isset($admin)){
        $nav->set_safe('admin', $admin);
      }
    }

    $footer = View::forge('federation/footer');
    $layout->nav = Response::forge($nav);
    $layout->footer = Response::forge($footer);
    return $layout;

  }
  public function action_listing(){

    //start of everything for the view
    $session = Session::instance();
    $layout = View::forge('federation/listing');
    $nav = View::forge('federation/nav');
    $dests = Dest::find('all');
    $nav->set_safe('dests',$dests);
    $listdest = array();
    foreach($dests as $des):
      $attraction = array(
        'id' => $des->id ,
        'name' => $des->name ,
        'state' => 'NE'
        );
      array_push($listdest, $attraction);
        endforeach;
    
    $response = Response::forge(json_encode($listdest));
    $response->set_header('Content-Type', 'application/json');
    return $response;
  }
  public function action_attraction(){
    $session = Session::instance();
    $layout = View::forge('federation/attraction');
    $nav = View::forge('federation/nav');
    $dests = Dest::find('all');
    $nav->set_safe('dests',$dests);
    $listdest = array();
    //get id url
    $uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
    $lastUriSegment = array_pop($uriSegments);
    //loop through db destinations
    foreach($dests as $des):
    //check last segment in url
      if($lastUriSegment==($des->id)){
        $attractionid = array(
        'id' => $des->id ,
        'name' => $des->name,
        'desc' => $des->overview,
        'state' => 'NE'
        );
    //return attraction by id
        $response = Response::forge(json_encode($attractionid));
        $response->set_header('Content-Type', 'application/json');
        return $response;
      }
      $attraction = array(
        'id' => $des->id ,
        'name' => $des->name ,
        'desc' => $des->overview,
        'state' => 'NE'
        );
      array_push($listdest, $attraction);
        endforeach;
    //return all attractions on $listdest
    $response = Response::forge(json_encode($listdest));
    $response->set_header('Content-Type', 'application/json');
    return $response;
  }
}
