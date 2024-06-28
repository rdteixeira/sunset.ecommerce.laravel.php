<?php
namespace App\Http\Requests\Product;

use App\Http\Requests\FormRequest;
use Illuminate\Contracts\Validation\ValidationRule;

class StoreRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     *
     * @noinspection PhpDocSignatureInspection
     * @noinspection PhpPluralMixedCanBeReplacedWithArrayInspection
     */
    public function rules(): array {
        return [
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000'
        ];
    }

}
