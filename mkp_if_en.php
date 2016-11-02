// TXP 4.6 tag registration
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

	if ($parts[1] == 'en') {

		// the variable target_section will return the section specified in the url

		if (isset($parts[2])) { $variable['target_section'] = $parts[2]; }

		// the variable target_article will return the article id specified in the url

		if (isset($parts[3])) { $variable['target_article'] = (is_numeric($parts[3])) ? $parts[3] : null; }

		return parse(EvalElse($thing, true));

} else {

		return parse(EvalElse($thing, false));
}


}
