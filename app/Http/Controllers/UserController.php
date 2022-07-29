<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index(User $user)
    {
    return view('User/profile')->with(['own_posts' => $user->getOwnPaginateByLimit()]);
    }
    /**
     * プロフィール編集画面表示
     * @return View プロフィール編集画面
     */
    public function show()
    {
        $user = Auth::user();
        return view('posts/profile')->with(["user"=>$user]);
    }

    /**
     * プロフィール編集機能（ユーザー名、メールアドレス）
     * @param Request $request
     * @return Redirect 一覧ページ-メッセージ（プロフィール更新完了）
     */
    public function profileUpdate(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore(Auth::id())],
        ]);

        try {
            $user = Auth::user();
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->save();

        } catch (\Exception $e) {
            return back()->with('msg_error', 'プロフィールの更新に失敗しました')->withInput();
        }

        return redirect()->route('articles_index')->with('msg_success', 'プロフィールの更新が完了しました');
    }

    /**
     * パスワード編集機能
     * @param
     * @return Redirect 一覧ページ-メッセージ（パスワード更新完了）
     */
     public function passwordUpdate(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:6|confirmed',
        ]);

        try {
            $user = Auth::user();
            $user->password = bcrypt($request->input('password'));
            $user->save();

        } catch (\Exception $e) {
            return back()->with('msg_error', 'パスワードの更新に失敗しました')->withInput();
        }

        return redirect()->route('articles_index')->with('msg_success', 'パスワードの更新が完了しました');
    }
    public function delete(Tweet $tweets)
    {
    $tweets->delete();
    return redirect('/');
    }
}