<?php

use BapCat\Auth\UserAuthorizer;
use BapCat\Session\SessionManager;
use BapCat\Values\Email;
use BapCat\Values\Password;

class DoItUserAuthorizer implements UserAuthorizer {
  const SESSION_AUTH_KEY = '__bap__auth_id';
  
  private $session;
  
  public function __construct(SessionManager $session) {
    $this->session = $session;
  }
  
  public function isAuthed() {
    return $this->session->has(self::SESSION_AUTH_KEY);
  }
  
  public function login(Email $email, Password $password) {
    $this->session->set(self::SESSION_AUTH_KEY, 1);
  }
  
  public function logout() {
    $this->session->remove(self::SESSION_AUTH_KEY);
  }
}
