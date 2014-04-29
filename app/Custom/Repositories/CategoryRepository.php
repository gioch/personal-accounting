<?php namespace Custom\Repositories;

use Category;
use Custom\Interfaces\CategoryInterface;

class CategoryRepository implements CategoryInterface {
 
	public function getList()
	{ 
		return Category::lists('name_en', 'id');
	}
}