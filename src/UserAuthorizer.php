<?php namespace BapCat\Auth;

use BapCat\Values\Email;
use BapCat\Values\Password;

interface UserAuthorizer extends Authorizer {
  public function login(Email $email, Password $password);
  public function logout();
}
