<?php
namespace App\Controller;
use App;
use App\Model;

class FrontEndController
{
	public static function viewHome()
	{
		require 'view/home.php';
	}

	public static function viewBiography()
	{
		require 'view/biography.php';
	}

	public static function viewChapter()
	{
		require 'view/chapter.php';
	}

	public static function viewError()
	{
		require 'view/error.php';
	}

	public static function viewPost()
	{
		if ($_POST)
		{
			$valid = true;

			if (empty($_POST['pseudo']) || empty($_POST['message']))
			{
				$valid = false;
			}

			if (strlen($_POST['pseudo']) >= 20)
			{
				$valid = false;
			}

			if (strlen($_POST['message']) >= 500)
			{
				$valid = false;
			}

			if ($valid)
			{
				$comment = new App\Model\Comment([
					'pseudo' => $_POST['pseudo'],
					'content' => $_POST['message'],
					'id_post' => $_GET['id']
				]);
				App\Model\CommentManager::add($comment);
			}
			else
			{
				//ERREUR
			}
		}


		require 'view/post.php';

		

	}
}