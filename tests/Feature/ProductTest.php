<?php
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function Pest\Laravel\{
    getJson,
    postJson,
    putJson,
    deleteJson
};
use function Pest\Faker\fake;

uses(RefreshDatabase::class);

it('list products', function () {
    // Arrange
    $products = Product::factory($products_count = 5)->create();

    // Act && Assert
    getJson(route('product.list'))->assertOk()->assertSee([
        ...$products->pluck('name')->toArray(),
        ...$products->pluck('description')->toArray(),
        ...paginationSignature()
    ],false)->assertJsonFragment(paginationTotal($products_count));
});

it('create product', function () {
    // Arrange
    $data = Product::factory()->definition();

    // Act && Assert
    postJson(route('product.store'),$data)->assertStatus(201);
    $product_expect = expect(Product::first());
    foreach($data as $key => $value){
        $product_expect->{$key}->toBe($value);
    }
});

it('reject invalid product data', function () {
    // Arrange
    $product = Product::factory()->definition();
    foreach($data as $key => &$value){
        $value = 42;
    }

    // Act && Assert
    postJson(route('product.store'),$data)
        ->assertStatus(422)
        ->assertSee(array_keys($data));

    postJson(route('product.store'),[])
        ->assertStatus(422)
        ->assertSee(array_keys($data));
});


it('find product', function () {
    // Arrange
    $product = Product::factory()->create();

    // Act && Assert
    getJson(route('product.show',$product->id))
        ->assertOk()
        ->assertSee([$product->name,$product->description]);
});


it('not find product', function () {
    // Arrange
    $product = Product::factory()->create();

    // Act && Assert
    getJson(route('product.show',$product->id+1))
        ->assertStatus(404);
});


it('update product', function () {
    // Arrange
    $product = Product::factory()->create();
    $data = Product::factory()->definition();

    // Act && Assert
    putJson(route('product.update',$product->id),$data)->assertStatus(202);
    $product_expect = expect(Product::first());
    foreach($data as $key => $value){
        $product_expect->{$key}->toBe($value);
    }
});

it('cant update product because not find him', function () {
    // Arrange
    $product = Product::factory()->create();
    $data = Product::factory()->definition();

    // Act && Assert
    putJson(route('product.update',$product->id+1),$data)->assertStatus(404);
});

it('cant update product because the data was wrong',function(){
    // Arrange
    $product = Product::factory()->create();
    $data = Product::factory()->definition();
    foreach($data as $key => &$value){
        $value = 42;
    }

    // Act && Assert
    putJson(route('product.update',$product->id),$data)
        ->assertStatus(422)
        ->assertSee(array_keys($data));

    putJson(route('product.update',$product->id),[])
        ->assertStatus(422)
        ->assertSee(array_keys($data));
});

it('delete product', function () {
    // Arrange
    $product = Product::factory()->create();

    // Act && Assert
    deleteJson(route('product.delete',$product->id))
        ->assertStatus(200);
    expect(Product::first())->toBe(null);
});


it('cant delete product because not find him', function () {
    // Act && Assert
    $product = Product::factory()->create();

    // Act && Assert
    deleteJson(route('product.delete',$product->id+1))
        ->assertStatus(404);

    expect(Product::first())->id->toBe($product->id);
});