<?php

namespace App\Http\Controllers\Webmaster\Miscellaneous\ContentFormat;

use App\Models\ContentFormat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Scopes\ActiveScope;
use Illuminate\Http\Response;

// use App\Repositories\ContentFormat\ContentFormatEloquentRepositoryInterface;

class ContentFormatController extends Controller
{

    // private $formatRepo;

    // public function __construct(ContentFormatEloquentRepositoryInterface $formatRepo)
    // {
    //     $this->formatRepo = $formatRepo;
    // }

    public function index()
    {
        $this->seo()->setTitle('فرمت محتوا با ما ها');
        // $formats = $this->formatRepo->all();
        $formats = ContentFormat::withoutGlobalScope(ActiveScope::class)->latest()->get();

        return view('webmaster.contents.formats.all', compact('formats'));
    }

    public function create()
    {
        $this->seo()->setTitle('ثبت فرمت محتوا با ما جدید');

        return view('webmaster.contents.formats.create');
    }

    public function store(Request $request)
    {
        $active = false;
        if ($request->boolean('active')) {
            $active = true;
        }
        $format = ContentFormat::create([
            'title' => $request->title,
            'active' => $active
        ]);

        return redirect()->route('webmaster.format.index')->with('success', 'فرمت محتوا با ما مورد نظر با موفقیت ایجاد شد.');
    }

    public function show(ContentFormat $format)
    {
        return view('webmaster.contents.formats.show', compact('format'));
    }

    public function edit(ContentFormat $format)
    {
        $this->seo()->setTitle('ویرایش فرمت محتوا با ما');

        return view('webmaster.contents.formats.edit', compact('format'));
    }

    public function update(Request $request, ContentFormat $format)
    {
        $active = false;
        if ($request->boolean('active')) {
            $active = true;
        }
        $format->update([
            'title'  => $request->title,
            'slug'   => $request->slug,
            'active' => $active
        ]);
        return redirect()->route('webmaster.format.index')->with('success', 'فرمت محتوا با ما مورد نظر با موفقیت ویرایش شد.');
    }

    public function destroy(ContentFormat $format)
    {
        $format->delete();
        return response()->json([
            'message' => 'عملیات موفقیت آمیز بود'
        ], Response::HTTP_OK);
    }
}
