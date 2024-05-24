<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\Artisan;
use App\Models\User; 

class UserTest extends TestCase
{
    use RefreshDatabase; 
    
    public function test_register(): void
    {
        
        Artisan::call('migrate');
        $load = $this->get(route('register'));
        $load->assertStatus(200)->assertSee('Register');

        
        $incorrectRegister = $this->post(route('register'), [
            'email' => 'aaaa',
            'password' => '1234', 
            'password_confirmation' => '1234' 
        ]);
        $incorrectRegister->assertStatus(302)
                          ->assertRedirect(route('register'))
                          ->assertSessionHasErrors(['email', 'password']);

        
        $correctRegister = $this->post(route('register'), [
            'email' => 'testing@gmail.com',
            'password' => 'ThisIsAgoodPassword1234*',
            'password_confirmation' => 'ThisIsAgoodPassword1234*', 
            'name' => 'name'
        ]);
        $correctRegister->assertStatus(302)
                        ->assertRedirect('/') 
                        ->assertSessionHasNoErrors();
                        $this->assertDatabaseHas('users', ['email'=> 'testing@gmail.com']);
    }


    public function test_login(): void
    {
        Artisan::call('migrate');

        
        $user = User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password123')
        ]);

        
        $load = $this->get(route('login'));
        $load->assertStatus(200)->assertSee('Login');

        
        $incorrectLogin = $this->post(route('login'), [
            'email' => 'test@example.com',
            'password' => 'wrongpassword'
        ]);
        $incorrectLogin->assertStatus(302)
                       ->assertRedirect(route('login'))
                       ->assertSessionHasErrors(['email']);

        
        $correctLogin = $this->post(route('login'), [
            'email' => 'test@example.com',
            'password' => 'password123'
        ]);
        $correctLogin->assertStatus(302)
                     ->assertRedirect('/')
                     ->assertSessionHasNoErrors();
    }

}
