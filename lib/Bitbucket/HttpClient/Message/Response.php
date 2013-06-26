<?php
namespace Bitbucket\HttpClient\Message;
use Buzz\Message\Response as CoreResponse;

class Response extends CoreResponse
{
	/**
	 * @return array
	 */
	public function getContent() {
		$response = parent::getContent();
		$content  = json_decode($response, true);
		if (JSON_ERROR_NONE !== json_last_error()) {
			return $response;
		}
		return $content;
	}
}