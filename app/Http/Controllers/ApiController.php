<?php

namespace App\Http\Controllers;

use App\Contracts\BlogInterface;
use App\Http\Resources\BlogResource;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    private $_blogService;

    public function __construct(BlogInterface $blogService)
    {
        $this->_blogService = $blogService;
    }

    public function getAllBlogEntriesWithUser(Request $request)
    {
        return BlogResource::collection($this->_blogService->getAllBlogEntries());
    }
}
