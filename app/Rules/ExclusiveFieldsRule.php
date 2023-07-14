<?php 
namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ExclusiveFieldsRule implements Rule
{
    protected $otherField;

    public function __construct($otherField)
    {
        $this->otherField = $otherField;
    }

    public function passes($attribute, $value)
    {
        $otherValue = request($this->otherField);
        if ((empty($value) && empty($otherValue)) ||  (!empty($value) && !empty($otherValue)) ){
            return false;
        }

        return empty($value) || empty($otherValue);
        // return (empty($value) && !empty($otherValue)) || (!empty($value) && empty($otherValue));

        // Perform your validation logic here
        // Compare $value with $otherValue and return true or false based on the validation result
    }

    public function message()
    {
        return 'The :attribute and ' . $this->otherField . ' fields must be exclusive.';
    }
}
