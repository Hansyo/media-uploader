<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SettingsController extends Controller
{

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = Auth::user();
        $request = "";
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request)
    {
        // ユーザのモデル取得
        try {
            $user = User::find(Auth::id());
        } catch (Exception $e) {
            Session::flash('error_message', 'Server error.');
            return view('settings', compact('user'));
        }
        // データを更新
        $user->name = $request->name;
        if ($user->email !== $request->input('email')) { // メールの再認証を行わせる。(今回はそこまで厳密にやってないのでいらないかも)
            $user->email_verified_at = null;
        }
        $user->email = $request->email;
        $user->self_info = $request->self_info;

        // 保存処理
        try {
            $user->save();
            Session::flash('flash_message', 'Successful update.');
        } catch (Exception $e) {
            Session::flash('error_message', 'Server error.');
        }
        return redirect(route('user.edit'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \Illuminate\Hrrp\Request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $reqeust)
    {
        try {
            $user = User::find(Auth::id());
            $user->delete();
        } catch (Exception $e) {
            Session::flash('error_message', 'Server error.');
        }
        return redirect(route('home'));
    }
}
