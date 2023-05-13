<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Mockery\Matcher\Closure;

class IndexController extends Controller
{
    public function rub()
    {
        $rubrics = News::selectRaw('MIN(id), rubric')->groupBy('rubric')->get();
        return $rubrics;
    }

    public function Index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $news = News::all();
        return view('index')->with('rubrics', $this->rub())->with('news', $news);
    }

    public function Pattern()
    {
        return view('index')->with('rubrics', $this->rub());
    }

    public function Rubric($rubric): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $news = News::select('id','title', 'rubric', 'image')->where('rubric', '=', $rubric)->get();
        return view('rubrika')->with('news', $news)->with('rubrics', $this->rub());
    }

    public function Statya($statya): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $news = News::all()->where('id', '=', $statya);
        return view('statya')->with('news', $news)->with('rubrics', $this->rub());
    }

    public function Delete(News $id)
    {
        $id->delete();
        return redirect('/main')->with('rubrics', $this->rub());
    }

    public function View_Add(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $this->authorize('police');
        $news = News::select('rubric')->distinct()->get();
        return view('view_add')->with('rubrics', $this->rub())->with('news', $news);
    }

    public function Form_Add(Request $request)
    {
        $this->validate
        (
            $request,
            [
                'title' => 'required',
                'lid' => 'required',
                'content' => 'required',
                'rubric' => 'required',
                'image' => 'required'
            ]
        );



            $data = $request->all();
            $all = News::where('title', $request->input('title'))->exists();
                if(!$all)
                {
                    $person = new News;
                    $person->fill($data);
                    $person->save();
                    return redirect('/main');
                }

                else
                {
                    return redirect('/main/warning');
                }
    }

    public function Warning()
    {
        return view('warning')->with('rubrics', $this->rub());
    }

    public function View_Update($i): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $up = News::where('id', $i)->get();
        $sel = News::all();
        return view('update')->with('up', $up)->with('sel', $sel)->with('rubrics', $this->rub());
    }

    public function Form_Update(Request $request): \Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        $this->validate
        (
            $request,
            [
                'id' => 'required',
                'title' => 'required',
                'lid' => 'required',
                'content' => 'required',
                'rubric' => 'required',
                'image' => 'required'
            ]
        );

        $all = News::where('id', '<>', $request->input('id'))->where('title', $request->input('title'))->exists();
        if(!$all)
        {
            $inv = News::findOrFail($request->input('id'));
            $inv->title = $request->input('title');
            $inv->lid = $request->input('lid');
            $inv->content = $request->input('content');
            $inv->rubric = $request->input('rubric');
            $inv->image = $request->input('image');
            $inv->save();
            return redirect('/main');
        }

        else
        {
            return redirect('/main/warning');
        }

    }

}
