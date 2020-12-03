<?php

namespace App\Containers;

use App\Blog;
use App\Contracts\BlogInterface;
use App\Contracts\UserInterface;

class BlogContainer implements BlogInterface
{

    private $_userService;

    public function __construct(UserInterface $userService)
    {
        $this->_userService = $userService;
    }

    public function getUserForBlog(Blog $blog)
    {
        return $this->_userService->getUserById($blog->user_id);
    }

    public function updateBlog(Blog $blog)
    {
    }



    public function getAllBlogEntries()
    {
        return Blog::all();
    }

    public function getAllBlogEntriesForUser(int $userId)
    {
        return Blog::whereUserId($userId)->get();
    }

    public function getBlogById(int $id)
    {
        return Blog::whereId($id)->get();
    }
}
