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
	
	public function action_404()
	{
		return Response::forge(Presenter::forge('welcome/404'), 404);
	}
}
