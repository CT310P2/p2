<?php
/**
 * Dest for CT310
 */
use Model\Dest;

/**
 * The Dest Controller.
 *
 * A basic MVC example using the classic view/addEdit/delete pattern
 */
class Controller_Dest extends Controller
{
	/**
	 * Shows a list of all Dest items
	 */
	public function action_index()
	{
		$layout = View::forge('Dest/layoutfull');

		$content = View::forge('Dest/index');
        
		$Dests = Dest::find('all');

		$content->set_safe('Dests', $Dests);

		$layout->content = Response::forge($content);

		return $layout;
	}

	//View a specific Dest item
	public function action_view($id)
	{
		$layout = View::forge('Dest/layoutfull');

		$content = View::forge('Dest/view');

		$Dest = Dest::find($id);

		$content->set_safe('Dest', $Dest);

		$layout->content = Response::forge($content);

		return $layout;
	}

	//
	public function get_addEdit($id = null)
	{
		$layout = View::forge('Dest/layoutfull');

		$content = View::forge('Dest/addEdit');

		$Dest = Dest::find($id);

		$content->set_safe('Dest', $Dest);
		$content->set_safe('valid', true);

		$layout->content = Response::forge($content);

		return $layout;
	}

	public function post_addEdit($id = null)
	{
		$Dest = Dest::find($id);
		if(is_object($Dest))
			$addEdit = 'Edit';
		else
		{
			$Dest = new Dest();
			$addEdit = 'Add';
		}

		//$Dest->id = $_POST['id'];
		//$Dest->name = $_POST['name'];
		$Dest->setAll($_POST);

		$valid = $Dest->simpleValidate();
		if($valid)
		{
			$Dest->save();
			Session::set_flash('flash', array('msg' => "Successfully $addEdit"."ed Dest!", 'type' => 'success'));
			Response::redirect('Dest/index');
		}
		else
		{
			$layout = View::forge('Dest/layoutfull');

			$content = View::forge('Dest/addEdit');

			$content->set_safe('Dest', $Dest);
			$content->set_safe('valid', $valid);
			$content->set_safe('errors', $Dest->betterValidate());

			$layout->content = Response::forge($content);

			return $layout;
		}

	}

	public function action_delete($id)
	{
		$Dest = Dest::find($id);
		$gone = $Dest->__toString();
		$Dest->delete();
		Session::set_flash('flash', array('msg' => "Dest $gone Deleted!", 'type' => 'success'));
		Response::redirect('Dest/index');
	}

	public function action_404()
	{
		return Response::forge(Presenter::forge('welcome/404'), 404);
	}
}
