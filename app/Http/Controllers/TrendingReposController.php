<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Libraries\GithubTrendingRepos;

class TrendingReposController extends Controller
{
    /**
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response|\Laravel\Lumen\Http\ResponseFactory
     */
    public function trending()
    {
        $githubTrendingRepos = new GithubTrendingRepos();
        $languages = $githubTrendingRepos->getTrendingLanguages();
        if(!empty($languages)) {
            return response()->json($languages);
        }
        return response()->json("RETRY LATER");

    }
}
