<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;

class AuthenticationTest extends TestCase
{
    use DatabaseMigrations;

    public function testTokenCreation()
    {
        $user = factory(App\User::class)->make();
        $user->save();

        $req = $this->post('/api/v1/authenticate', [
            'email' => $user->email,
            'password' => 'das password aus der factory'
        ]);

        $req->seeJson([
            'token' => JWTAuth::fromUser($user)
        ]);
    }

    public function testFailedTokenCreation() {
        $req = $this->post('/api/v1/authenticate', [
            'email' => "doesnotexist@fake.com",
            'password' => 'admin01'
        ]);

        $req->assertResponseStatus(401);
        $req->seeJson([
            'error' => "INVALID_CREDENTIALS"
        ]);
    }
}