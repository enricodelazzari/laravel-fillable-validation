<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\ValidationException;
use Maize\FillableValidation\Tests\Support\Models\ArticleArray;
use Maize\FillableValidation\Tests\Support\Models\ArticleString;

it('can create a model', function (string $model, array $values) {
    expect(
        $model::create($values)
    )->toBeInstanceOf($model);
})->with([
    ['model' => ArticleArray::class, 'values' => ['title' => 'test title']],
    ['model' => ArticleString::class, 'values' => ['title' => 'test title']],
]);

it('can fail when create a model', function (string $model) {
    expect(
        fn () => $model::create([])
    )->toThrow(ValidationException::class);
})->with([
    ['model' => ArticleArray::class],
    ['model' => ArticleString::class],
]);

it('can update a model', function (string $model, array $values) {

    Model::withoutEvents(
        fn () => $model::create(['title' => 'test title'])
    );

    expect(
        tap($model::first())->update($values)
    )->toBeInstanceOf($model);
})->with([
    ['model' => ArticleArray::class, 'values' => ['title' => 'test title']],
    ['model' => ArticleString::class, 'values' => ['title' => 'test title']],
]);

it('can fail when update a model', function (string $model) {

    Model::withoutEvents(
        fn () => $model::create(['title' => 'test title'])
    );

    expect(
        fn () => tap($model::first())->update(['title' => null])
    )->toThrow(ValidationException::class);
})->with([
    ['model' => ArticleArray::class],
    ['model' => ArticleString::class],
]);
