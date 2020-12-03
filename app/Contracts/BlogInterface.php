<?php

namespace App\Contracts;

use App\Blog;

interface BlogInterface
{
    public function getAllBlogEntries();
    public function getAllBlogEntriesForUser(int $userId);
    public function getBlogById(int $id);
    public function updateBlog(Blog $blog);
    public function getUserForBlog(Blog $blog);
}
