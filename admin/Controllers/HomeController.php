<?php
class HomeController extends BaseController
{
	private $categoryModel;
	private $postModel;
	public function __construct()
	{
		$this->loadModelFrontEnd('CategoryModel');
		$this->categoryModel = new CategoryModel;

		$this->loadModelFrontEnd('PostModel');
		$this->postModel = new PostModel;
	}


	public function index()
	{
		if(isset($_GET['q'])){
			$search = $_GET['q'];

			$category = $this->categoryModel->getAllCategory(CategoryModel::TABLE);

			$listSearchPost = $this->postModel->getSearchPost($search,PostModel::TABLE);

			return $this->viewFrontEnd('frontEnd.home', [
				'category' => $category,
				'listSearchPost' => $listSearchPost
			]);

		}else{

			$category = $this->categoryModel->getAllCategory(CategoryModel::TABLE);

			$postFeatured = $this->postModel->postFeatured(PostModel::TABLE);

			$total_records = $this->postModel->getRowPost(PostModel::TABLE);

			isset($_GET['page']) ? $current_page = $_GET['page'] : $current_page = 1;

			$limit = 15;

			$start = ($current_page - 1) * $limit;

			$post = $this->postModel->getAllPostLimit(PostModel::TABLE,$start, $limit);

			$total_page = ceil($total_records[0] / $limit);

			if($current_page > $total_page){
				$current_page = $total_page;
			}
			
			return $this->viewFrontEnd('frontEnd.home', [
				'category' => $category,
				'postFeatured' => $postFeatured,
				'post' => $post,
				'current_page' => $current_page,
				'total_page' => $total_page,
			]);
		}
	}
	public function postDetail()
	{
		$id = $_GET['id'];
		$category = $this->categoryModel->getAllCategory(CategoryModel::TABLE);
		$onePost = $this->postModel->getOnePost($id, PostModel::TABLE);
		$listSimilarPost = $this->postModel->postSimilar($id,PostModel::TABLE);
		return $this->viewFrontEnd('frontEnd.postDetail', [
			'onePost' => $onePost,
			'category' => $category,
			'listSimilarPost' => $listSimilarPost
		]);
	}
	public function listPostCategory()
	{
		$id = $_GET['id'];
		$category = $this->categoryModel->getAllCategory(CategoryModel::TABLE);
		$oneCategory = $this->categoryModel->getOneCategory($id,CategoryModel::TABLE);
		$postCategory = $this->postModel->PostCategory($id, PostModel::TABLE);
		return $this->viewFrontEnd('frontEnd.listPostCategory', [
			'postCategory' => $postCategory,
			'category' => $category,
			'oneCategory' => $oneCategory
		]);
	}
}
