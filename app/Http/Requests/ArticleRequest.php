<?php

namespace App\Http\Requests;

/**
 * Class ArticleRequest.
 */
class ArticleRequest extends Request
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
     * @return array
     */
    public function createRules()
    {
        return [];
    }
}
