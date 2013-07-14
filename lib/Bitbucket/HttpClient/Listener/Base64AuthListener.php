<?php
namespace Bitbucket\HttpClient\Listener;

use Buzz\Listener;

/**
 * 認証
 * @author polidog
 */
class Base64AuthListener implements ListenerInterface
{
    private $baseHash;

    public function __construct($baseHash)
    {
        $this->baseHash = $baseHash;
    }

    public function preSend(RequestInterface $request)
    {
        $request->addHeader('Authorization: Basic '.$this->baseHash);
    }

    public function postSend(RequestInterface $request, MessageInterface $response)
    {
    }
}
