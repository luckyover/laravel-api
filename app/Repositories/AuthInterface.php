<?php
namespace App\Repositories;
interface AuthInterface
{

    /**
     * find Email
     *
     * @param  string $email
     * @return Collect
     */
    public function findEmail($email);


     /**
     * delete token
     *
     * @param  string token
     * @return Collect
     */
    public function deleteToken($user);


}
