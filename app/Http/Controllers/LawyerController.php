<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePublication;
use App\Http\Requests\StoreReview;
use App\Models\Admin\Category;
use App\Models\Lawyer;
use App\Models\Publication;
use App\Models\Review;
use App\Models\User;
use App\Models\Variable;
use Illuminate\Http\Request;
use DB;
use Auth;
use Session;
use Validator;

class LawyerController extends Controller
{
    /**
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(User $user) {
        $reviews = Review::where('lawyer_id',$user->id)
                    ->orderBy('id', 'DESC')
                    ->take(4)
                    ->get();

        $reviewsNumber = Review::where('lawyer_id',$user->id)->get()->count();
        $publications = Publication::where('user_id', $user->id)->get();
        return view('lawyers.show', compact('user','reviews', 'reviewsNumber', 'publications'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getLawyersCategories() {
        $categories = Category::with('lawyers')->get();

        return view('categories.lawyers-categories', compact('categories'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getLawyersByCategory(Category $category = null, Request $request)
    {
        $search = $request->input('search');
        if ($category) {
            $lawyers = $category->lawyers()->found($search);
        } else {
            $lawyers = Lawyer::found($search);
        }

        $variables = $this->getVariablesData();

        return view('categories.lawyers-category', compact('category', 'lawyers', 'variables'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function searchLawyersByName(Request $request) {

        $name = $request->input('name');
        $city = $request->input('city');

        $request->validate([
            'name' => 'required|min:2|max:255',
            'city' => 'required|min:2|max:255'
        ]);


        $lawyers = Lawyer::join('users', 'lawyers.user_id', '=', 'users.id')
                    ->where('lawyers.city', 'like', "%$city%")
                    ->where(function ($query) use($name) {
                        $query->where('users.first_name', 'like',  "%$name%")
                            ->orWhere('users.last_name', 'like', "%$name%")
                            ->orWhereRaw("concat(users.first_name, ' ', users.last_name) like '%$name%' ");
                    })
                    ->orderBy('lawyers.rating', 'DESC')
                    ->get();

        $variables = $this->getVariablesData();

        return view('categories.lawyers-category', compact( 'lawyers', 'variables'));
    }

    public function getVariablesData()
    {
        $variables = [];
        $variableData = Variable::select('key', 'value')
            ->where('key', 'category-text')
            ->get();

        foreach($variableData as $data) {
            $variables[$data->key] = $data->value;
        }

        return $variables;
    }
}
