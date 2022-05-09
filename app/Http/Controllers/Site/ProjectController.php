<?php

namespace App\Http\Controllers\Site;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Project;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;


class ProjectController extends Controller
{
    public function index()
    {
        SEOTools::setTitle('جامعه توسعه دهنگان لاراول ایران');
        SEOTools::setDescription('جامعه توسعه دهنگان لاراول ایران');
        OpenGraph::addProperty('type', 'website');
        JsonLd::addImage(asset("/statics/shared/images/logo.png"));
        OpenGraph::addImage(asset("/statics/shared/images/logo.png"));
        TwitterCard::setImage(asset("/statics/shared/images/logo.png"));

        $projects = Project::active()->orderBy('order')->get();

        return view('site.users.account.projects.index', compact('projects'));
    }

    public function edit(Project $project)
    {
        SEOTools::setTitle($project->title);
        SEOTools::setDescription($project->title);
        OpenGraph::addProperty('type', 'website');
        JsonLd::addImage(asset("/statics/shared/images/logo.png"));
        OpenGraph::addImage(asset("/statics/shared/images/logo.png"));
        TwitterCard::setImage(asset("/statics/shared/images/logo.png"));

        return view('site.users.account.projects.edit', compact('project'));
    }

    public function show(Project $project)
    {
        SEOTools::setTitle($project->title);
        SEOTools::setDescription($project->title);
        OpenGraph::addProperty('type', 'website');
        JsonLd::addImage(asset("/statics/shared/images/logo.png"));
        OpenGraph::addImage(asset("/statics/shared/images/logo.png"));
        TwitterCard::setImage(asset("/statics/shared/images/logo.png"));

        return view('site.users.account.projects.show', compact('project'));
    }
}
