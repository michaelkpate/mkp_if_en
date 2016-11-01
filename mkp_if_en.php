n// TXP 4.6 tag registration
if (class_exists('\Textpattern\Tag\Registry')) {
Txp::get('\Textpattern\Tag\Registry')
->register('mkp_if_en')
;
}

function mkp_if_en($atts, $thing='')
{

	global $variable;

	// preg_replace("|^https?://[^/]+|i", "", serverSet('REQUEST_URI')) was copied from the function preText in publish.php

	$parts = explode('/', preg_replace("|^https?://[^/]+|i", "", serverSet('REQUEST_URI')), 5);

	// if the url begins with 'en' this will return true; otherwise false
	 
	return ($parts[1]) == 'en') ? parse(EvalElse($thing, true)) : parse(EvalElse($thing, false));
}

