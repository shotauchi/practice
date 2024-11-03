<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Profile;

class ProfileController extends Controller
{
    public function add()
    {
        return view('admin.profile.create');
    }
    public function create(Request $request)
    {
        return redirect('admin/profile/create');
    }
    public function edit(Request $request)
    {
        return view('admin.profile.edit');
    }
    public function update(REquest $request)
    {
        // Validationを行う
        $this->validate($request, News::$rules);

        $profile = new Profile;
        $form = $request->all();

        // フォームから画像が送信されてきたら、保存して、$news->image_path に画像のパスを保存する
        if (isset($form['/admin/profile/create'])) {
            $path = $request->file('/admin/profile/create')->store('public/admin/profile/create');
            $profile->image_path = basename($path);
        } else {
            $profile->image_path = null;
        }

        // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        // フォームから送信されてきたimageを削除する
        unset($form['image']);

        // データベースに保存する
        $profile->fill($form);
        $profile->save();
        return redirect('admin/profile/edit');
    }
}
