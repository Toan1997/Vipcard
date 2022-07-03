<?php
namespace VipCard\ConnectApi\Api;

interface UserInterface
{
    /**
     * Returns greeting message to user
     *
     * @api
     * @param string $id Users id.
     * @return string Greeting message with users name.
     */
    public function user($id);
}