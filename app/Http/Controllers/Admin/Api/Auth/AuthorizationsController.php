<?php

namespace App\Http\Controllers\Admin\Api\Auth;

use Illuminate\Http\Request;

use Zend\Diactoros\Response as Psr7Response;
use Psr\Http\Message\ServerRequestInterface;
use League\OAuth2\Server\AuthorizationServer;
use App\Http\Controllers\Admin\Api\Controller;
use League\OAuth2\Server\Exception\OAuthServerException;
use League\OAuth2\Server\RequestTypes\AuthorizationRequest;

class AuthorizationsController extends Controller
{
    /**
     * 登录授权
     * @param AuthorizationRequest $originRequest
     * @param AuthorizationServer $server
     * @param ServerRequestInterface $serverRequest
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function store(AuthorizationRequest $originRequest, AuthorizationServer $server, ServerRequestInterface $serverRequest)
    {
        try {
            return $server->respondToAccessTokenRequest($serverRequest, new Psr7Response)->withStatus(201);
        } catch(OAuthServerException $e) {
            return $this->response->errorUnauthorized($e->getMessage());
        }
    }

    /**
     * 刷新token
     * @param AuthorizationServer $server
     * @param ServerRequestInterface $serverRequest
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function update(AuthorizationServer $server, ServerRequestInterface $serverRequest)
    {
        try {
            return $server->respondToAccessTokenRequest($serverRequest, new Psr7Response);
        } catch(OAuthServerException $e) {
            return $this->response->errorUnauthorized($e->getMessage());
        }
    }

    /**
     * @return \Dingo\Api\Http\Response|void
     */
    public function destroy()
    {
        if (!empty($this->user())) {
            $this->user()->token()->revoke();
            return $this->response->noContent();
        } else {
            return $this->response->errorUnauthorized('The token is invalid.');
        }
    }

    public function test()
    {
        echo 1;
    }
}
