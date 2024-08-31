<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|max:255',
            'date_product' => 'required',
            'url' => 'required',
            'videoId' => 'required',
            'image' =>  'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Tên sản phẩm không được để trống.',
            'title.max' => 'Tên sản phẩm không được vượt quá :max ký tự.',
            'date_product.required' => 'Ngày tạo không được để trống.',
            'url.required' => 'Link youtube không được để trống.',
            'videoId.required' => 'Video ID không được để trống.',
            'image.nullable' => 'Ảnh không được để trống.',
            'image.max' => 'Kích thước hình ảnh không được vượt quá 2048 KB.',
            'image.mimes' => 'Ảnh không đúng định dạng, chỉ chấp nhận các định dạng jpeg, png, jpg, gif.',
            'image.image' => 'Tệp tải lên phải là một hình ảnh.',
        ];
    }
}
