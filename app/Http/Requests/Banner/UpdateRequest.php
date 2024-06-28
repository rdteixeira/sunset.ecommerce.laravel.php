<?php
namespace App\Http\Requests\Banner;

use App\Http\Requests\FormRequest;
use Illuminate\Contracts\Validation\ValidationRule;

class UpdateRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool {
        return false;
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
            'title' => 'required|string|max:255',
            'path' => 'required|string|max:255'
        ];
    }

}
