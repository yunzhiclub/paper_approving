<?php

namespace ReviewDetail\Logic;

use ReviewDetail\Model\ReviewDetailModel;

class ReviewDetailLogic extends ReviewDetailModel
{
	protected  $errors = array();

    public function getErrors()
	{
		return $this->errors;
	}
}