<?php

namespace App\Rules;

use App\Http\Repositories\UserRepository;
use Illuminate\Contracts\Validation\Rule;

class UniqueUserName implements Rule
{

    public $repository;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->repository = new UserRepository;
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
        return !$this->repository->find($value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Username already exists.';
    }
}
