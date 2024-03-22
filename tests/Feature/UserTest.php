<?php
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function Pest\Laravel\{
    getJson,
    postJson,
    putJson,
    deleteJson,
    withToken
};
use function Pest\Faker\fake;

uses(RefreshDatabase::class);

it('list users', function () {
    // Arrange
    $users = User::factory($users_count = 5)->create();

    // Act && Assert
    withToken(bearer($users->first()))->getJson(route('user.list'))->assertOk()->assertSee([
        ...$users->pluck('name')->toArray(),
        ...$users->pluck('email')->toArray(),
        ...paginationSignature()
    ],false)->assertJsonFragment(paginationTotal($users_count));
});

it('create user', function () {
    // Arrange
    $data = [
        'name' => fake()->name,
        'email' => fake()->email,
        'password' => fake()->password(8).random_int(0,9)
    ];

    // Act && Assert
    withToken(bearer())->postJson(route('user.store'),$data)->assertStatus(201);
    unset($data['password']);
    $user_expect = expect(User::whereEmail($data['email'])->first());
    foreach($data as $key => $value){
        $user_expect->{$key}->toBe($value);
    }
});

it('reject invalid user data', function () {
    // Arrange
    $data = [
        'name' => 42,
        'email' => 42,
        'password' => 42
    ];

    // Act && Assert
    withToken(bearer())->postJson(route('user.store'),$data)
        ->assertStatus(422)
        ->assertSee(array_keys($data));

    withToken(bearer())->postJson(route('user.store'),[])
        ->assertStatus(422)
        ->assertSee(array_keys($data));
});


it('find user', function () {
    // Arrange
    $user = User::factory()->create();

    // Act && Assert
    withToken(bearer($user))->getJson(route('user.show',$user->id))
        ->assertOk()
        ->assertSee([$user->name,$user->email]);
});


it('not find user', function () {
    // Arrange
    $user = User::factory()->create();

    // Act && Assert
    withToken(bearer($user))->getJson(route('user.show',$user->id+1))
        ->assertStatus(404);
});


it('update user', function () {
    // Arrange
    $user = User::factory()->create();
    $data = [
        'name' => fake()->name,
        'email' => fake()->email,
        'password' => fake()->password(8).random_int(0,9).'@'
    ];

    // Act && Assert
    withToken(bearer($user))
        ->putJson(route('user.update',$user->id),$data)
        ->assertStatus(202);
    unset($data['password']);
    $user_expect = expect(User::first());
    foreach($data as $key => $value){
        $user_expect->{$key}->toBe($value);
    }
});

it('cant update user because not find him', function () {
    // Arrange
    $user = User::factory()->create();
    $data = [
        'name' => fake()->name,
        'email' => fake()->email,
        'password' => fake()->password(8).random_int(0,9).'@'
    ];

    // Act && Assert
    withToken(bearer($user))->putJson(route('user.update',$user->id+1),$data)->assertStatus(404);
});

it('cant update user because the data was wrong',function(){
    // Arrange
    $user = User::factory()->create();
    $data = [
        'name' => 42,
        'email' => 42,
        'password' => 42
    ];

    // Act && Assert
    withToken(bearer($user))
        ->putJson(route('user.update',$user->id),$data)
        ->assertStatus(422)
        ->assertSee(array_keys($data));
});

it('delete user', function () {
    // Arrange
    $user = User::factory()->create();

    // Act && Assert
    withToken(bearer($user))
        ->deleteJson(route('user.delete',$user->id))
        ->assertStatus(200);
    expect(User::first())->toBe(null);
});


it('cant delete user because not find him', function () {
    // Act && Assert
    $user = User::factory()->create();

    // Act && Assert
    withToken(bearer($user))
        ->deleteJson(route('user.delete',$user->id+1))
        ->assertStatus(404);

    expect(User::first())->id->toBe($user->id);
});