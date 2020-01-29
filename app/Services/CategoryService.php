<?php


namespace App\Services;


use App\Models\Category;

class CategoryService
{

    private $categories;

    public function __construct()
    {
        $fields = [
            'id',
            'name',
        ];
        $this->categories = Category::query()->select($fields)->toBase()->get();
    }

    public function getForSidebar(string $side)
    {
        $half = ceil($this->categories->count() / 2);
        $chunks = $this->categories->chunk($half);;
        return $side == 'L' ? $chunks[0] : $chunks[1];
    }


    public function getForPostEdit()
    {
        return $this->categories;
    }
}
