<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CaseInsensitiveIn implements Rule
{
    protected $values;

    public function __construct(array $values)
    {
        // Tambahkan jenis donasi baru ke array
        $values[] = 'jenisdonasibaru';

        // Convert all values to lowercase for case-insensitive comparison
        $this->values = array_map('strtolower', $values);
    }

    public function passes($attribute, $value)
    {
        // Check if the provided value exists in the values array (case-insensitive)
        return in_array(strtolower($value), $this->values);
    }

    public function message()
    {
        return 'The selected :attribute is invalid.';
    }
}

