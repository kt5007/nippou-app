<?php

namespace App\Http\Requests;

use App\Rules\DuplicateDate;
use Illuminate\Foundation\Http\FormRequest;
use DB;
use Illuminate\Support\Facades\Auth;

class ArticlePostRequest extends FormRequest
{
    public function withValidator($validator)
    {
        $auth_user_id = Auth::id();
        $record_count = DB::table('articles')
            ->where('user_id', '=', $auth_user_id)
            ->where('post_date', '=', $this->post_date)
            ->count();
        if ($record_count > 0) {
            $validator->errors()->add('投稿日', '日付が重複しています');
        }
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'title'  => 'required|max:100',
            'post_date' => ['required', new DuplicateDate],
            'feeling_before' => 'required',
            'feeling_after' => 'required',
            'post_content' => 'required',
        ];
    }

    public function messages()
    {
        return [
            //
            'required' => ':attributeは必須です',
            'title.max'  => '100字以下でお願いします',
        ];
    }
    public function attributes()
    {
        return [
            //
            'title'  => 'タイトル',
            'post_date' => '投稿日',
            'feeling_before' => '出勤前のモチベーション点数',
            'feeling_after' => '出勤後のモチベーション点数',
            'post_content' => '投稿内容',
        ];
    }
}
