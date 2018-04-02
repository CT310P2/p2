<?php
/**
 * Demo for CT310
 */
use Model\Demo;

/**
 * The Demo Controller.
 *
 * A basic MVC example using the classic view/addEdit/delete pattern
 */
class Controller_Demo extends Controller
{
	/**
	 * Shows a list of all demo items
	 */
	public function action_index()
	{
		$layout = View::forge('demo/layoutfull');

		$content = View::forge('demo/index');
        
		$demos = Demo::find('all');

		$content->set_safe('demos', $demos);

		$layout->content = Response::forge($content);

		return $layout;
	}

	//View a specific demo item
	public function action_view($id)
	{
		$layout = View::forge('demo/layoutfull');

		$content = View::forge('demo/view');

		$demo = Demo::find($id);

		$content->set_safe('demo', $demo);

		$layout->content = Response::forge($content);

		return $layout;
	}

	//
	public function get_addEdit($id = null)
	{
		$layout = View::forge('demo/layoutfull');

		$content = View::forge('demo/addEdit');

		$demo = Demo::find($id);

		$content->set_safe('demo', $demo);
		$content->set_safe('valid', true);

		$layout->content = Response::forge($content);

		return $layout;
	}

	public function post_addEdit($id = null)
	{
		$demo = Demo::find($id);
		if(is_object($demo))
			$addEdit = 'Edit';
		else
		{
			$demo = new Demo();
			$addEdit = 'Add';
		}

		//$demo->id = $_POST['id'];
		//$demo->name = $_POST['name'];
		$demo->setAll($_POST);

		$valid = $demo->simpleValidate();
		if($valid)
		{
			$demo->save();
			Session::set_flash('flash', array('msg' => "Successfully $addEdit"."ed Demo!", 'type' => 'success'));
			Response::redirect('demo/index');
		}
		else
		{
			$layout = View::forge('demo/layoutfull');

			$content = View::forge('demo/addEdit');

			$content->set_safe('demo', $demo);
			$content->set_safe('valid', $valid);
			$content->set_safe('errors', $demo->betterValidate());

			$layout->content = Response::forge($content);

			return $layout;
		}

	}

	public function action_delete($id)
	{
		$demo = Demo::find($id);
		$gone = $demo->__toString();
		$demo->delete();
		Session::set_flash('flash', array('msg' => "Demo $gone Deleted!", 'type' => 'success'));
		Response::redirect('demo/index');
	}

	public function action_404()
	{
		return Response::forge(Presenter::forge('welcome/404'), 404);
	}
}
