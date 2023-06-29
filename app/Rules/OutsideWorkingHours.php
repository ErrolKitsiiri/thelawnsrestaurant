<?php

namespace App\Rules;

use Carbon\Carbon;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class OutsideWorkingHours implements ValidationRule
{

    public function passes($attribute, $value)
    {
        $workingHoursStart = '09:00:00';
        $workingHoursEnd = '17:00:00';

        $inputTime = \DateTime::createFromFormat('H:i:s', $value);
        $workingHoursStart = \DateTime::createFromFormat('H:i:s', $workingHoursStart);
        $workingHoursEnd = \DateTime::createFromFormat('H:i:s', $workingHoursEnd);

        return $inputTime < $workingHoursStart || $inputTime > $workingHoursEnd;
    }

    public function message()
    {
        return 'The :attribute must be outside working hours.';
    }
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        //
    }
}
