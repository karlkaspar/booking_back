<?php

namespace Tests\Helpers;

use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;

trait AuthenticationHelper
{

  public static function generateAuthToken(int $userId)
  {
    $user = User::findOrFail($userId);
    $token = JWTAuth::fromUser($user);
    return $token;
  }
}
