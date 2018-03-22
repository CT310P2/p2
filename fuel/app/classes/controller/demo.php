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
		$layout = View::forge('demo/layoutfull');//loads template for page

		$content = View::forge('demo/index');//view folder, demo, view called index, loaded into memory

		$demos = Demo::getAll();//model getting data for us, returns it back to controller

		$content->set_safe('demos', $demos);//saving demo into content, with index (this is data)

		$layout->content = Response::forge($content);//view is being executed

		return $layout;//sent to the user
	}

	//View a specific demo item
	public function action_view($id)
	{
		$layout = View::forge('demo/layoutfull');

		$content = View::forge('demo/view');

		$demo = new Demo($id);//retrieving data from model!

		$content->set_safe('demo', $demo);

		$layout->content = Response::forge($content);

		return $layout;
	}

	//
	public function get_addEdit($id = null)
	{
		$layout = View::forge('demo/layoutfull');

		$content = View::forge('demo/addEdit');

		$demo = new Demo($id);

		$content->set_safe('demo', $demo);

		$layout->content = Response::forge($content);

		return $layout;
	}

	public function post_addEdit($id = null)
	{
		$demo = new Demo($id);
		$demo->id = $_POST['id'];
		$demo->name = $_POST['name'];
		$demo->save();
		Response::redirect('index.php/demo/index');
	}

	public function action_delete($id)
	{
		$demo = new Demo($id);
		$demo->delete();
		Response::redirect('index.php/demo/index');
	}

	public function action_404()
	{
		return Response::forge(Presenter::forge('welcome/404'), 404);
	}
}
