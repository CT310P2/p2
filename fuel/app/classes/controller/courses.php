<?php

use Model\Ormcourses;

class Controller_Orm extends Controller
{
	/**
	 * Shows a list of all Courses
	 */
	public function action_index()
	{
		//load the layout
		$layout = View::forge('ormcourses/layoutfull');

		//load the view
		$content = View::forge('ormcourses/index');

		//get all courses using the ORM object
		$courses = Ormcourses::find('all');

		$CoursesString;

		//this loop converts all courses to a single string and stores them in $CoursesString
		foreach($courses as $key=>$course)
		{
			$CoursesString[$key] = $course['courseID']." ".$course['courseName']." ".$course['courseNumber']." ".$course['numOfAssignments'];
		}

		//set the courses to the view for printing
		$content->set_safe('demos', $CoursesString);

		//forge inner view
		$layout->content = Response::forge($content);

		return $layout;
	}

	public function get_add()
	{
		//load the layout
		$layout = View::forge('ormcourses/layoutfull');

		//load the view
		$content = View::forge('ormcourses/add');

		//forge inner view
		$layout->content = Response::forge($content);

		return $layout;
	}

	public function post_add()
	{
		//extract course name, number and assignments from the input parameters
		$name = $_POST['name'];
		$number = $_POST['number'];
		$assignments = $_POST['assignments'];

		//create a new ORM object and populate it
		$new = new Ormcourses();
		$new->courseName = $name;
		$new->courseNumber = $number;
		$new->numOfAssignments = $assignments;

		//save the ORM object
		$new->save();

		//reload the index page with the newly saved view
		Response::redirect('index.php/orm');
	}

}
