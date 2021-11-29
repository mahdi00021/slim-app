<?php
/**
 * Created by PhpStorm.
 * User: MAHDI
 * Date: 07/08/2021
 * Time: 00:11
 */

namespace App\Validation;

use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator as Respect;

class Validator
{

    protected $errors;

    public function validate($request, array $rules)
    {

        foreach ($rules as $field => $rule) {
            try {

                $rule->setName(ucfirst($field))->assert($request->getParam($field));

            } catch (NestedValidationException $e) {

                $this->errors[$field] = $e->getMessages();
            }
        }

        var_dump($this->errors);
    }

}