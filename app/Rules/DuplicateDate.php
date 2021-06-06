<?php

namespace App\Rules;

use DB;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class DuplicateDate implements Rule
{
    private $error_message = ''; // エラーメッセージを可変にするためのメンバ変数
    private $user;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        //
        $auth_user_id = Auth::id();
        $record_count = DB::table('articles')
            ->where('user_id', '=', $auth_user_id)
            ->where('post_date', '=', $value)
            ->count();
        return $record_count === 0;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return '重複した日付では投稿できません。';
    }
}
