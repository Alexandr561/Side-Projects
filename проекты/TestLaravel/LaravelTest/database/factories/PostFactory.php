<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // Генерирует предложение из 3 слов для заголовка
            'title' => $this->faker->sentence(3),
            // Создает текст контента из 3 параграфов (объединенных в одну строку)
            'content' => $this->faker->paragraphs(3, true),
            // Генерирует URL изображения с указанными размерами
            'image' => $this->faker->imageUrl(640, 480),
            // Устанавливает случайное количество лайков в диапазоне 0-1000
            'likes' => $this->faker->numberBetween(0, 1000),
            // Определяет статус публикации с 80% вероятностью true
            'is_published' => $this->faker->boolean(80),
            // Создает связанную категорию через фабрику Category
            'category_id' => Category::inRandomOrder()->first()->id
        ];
    }
}

