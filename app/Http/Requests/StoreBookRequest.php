<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
{
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [

            "title_ar" => "required",
            "title_en" => "required",
            'description_ar' => 'required',
            'description_en' => 'required',
            "author" => "required",
            "images" => "required|array",
            "images.*" => "required|image",
            'isbn' => 'required|unique:books|integer',
            'tags' => 'required|array',
            'tags.*' => 'required|exists:tags,id',
        ];
    }

    public function messages()
    {
        return [
            "title_ar.required" => __("message.title_ar_required"),
            "description_ar.required" => __("message.description_ar_required"),
            "title_en.required" => __("message.title_en_required"),
            "description_en.required" => __("message.description_en_required"),
            "author.required" => __("message.author_required"),
            "images.required" => __("message.images_required"),
            "images.array" => __("message.images_array"),
            "images.*.required" => __("message.images_required"),
            "images.*.image" => __("message.images_image"),
            "isbn.required" => __("message.isbn_required"),
            "isbn.unique" => __("message.isbn_unique"),
            "tags.required" => __("message.tags_required"),
            "tags.array" => __("message.tags_array"),
            "tags.*.required" => __("message.tags_required"),
            "tags.*.exists" => __("message.tags_exists"),
        ];
    }
}
