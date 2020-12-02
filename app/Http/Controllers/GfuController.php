<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Contracts\BlogInterface;
use Illuminate\Http\Request;

class GfuController extends Controller
{

    /**
     *
     * @var App\Http\Controllers\BlogInterface
     */
    private $_blogService;

    public function __construct(BlogInterface $blogService)
    {
        $this->_blogService = $blogService;
    }

    public function index(Request $request)
    {
        return view('gfu.welcome');
    }

    public function apiReponse(Request $request)
    {
        return response()->json(['test' => 'Hallo zusammen'], 403);
    }

    public function getUserForBlog(Request $request, Blog $blog)
    {
        return response()->json(['username' => $this->_blogService->getUserForBlog($blog)]);
    }
}
