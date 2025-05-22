<?php
// database/seeders/ProductSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // 商品 + 季節のデータ
        $products = [
            [
                'name' => 'キウイ',
                'price' => 800,
                'description' => 'キウイは甘みと酸味のバランスが絶妙なフルーツです...',
                'seasons' => [3, 4], // 秋、冬
            ],
            [
                'name' => 'ストロベリー',
                'price' => 1200,
                'description' => '大人から子供まで大人気のストロベリー...',
                'seasons' => [1], // 春
            ],
            [
                'name' => 'オレンジ',
                'price' => 850,
                'description' => '酸味と甘みのバランスが抜群のネーブルオレンジ...',
                'seasons' => [4], // 冬
            ],
            [
                'name' => 'スイカ',
                'price' => 700,
                'description' => '甘くてシャリシャリ食感が魅力のスイカ...',
                'seasons' => [2], // 夏
            ],
            [
                'name' => 'ピーチ',
                'price' => 1000,
                'description' => 'とろけるような甘さが魅力のピーチ...',
                'seasons' => [2], // 夏
            ],
            [
                'name' => 'シャインマスカット',
                'price' => 1400,
                'description' => '上品な甘みが特長のシャインマスカット...',
                'seasons' => [2, 3], // 夏、秋
            ],
            [
                'name' => 'パイナップル',
                'price' => 800,
                'description' => '甘酸っぱさと香りが特徴のパイナップル...',
                'seasons' => [1, 2], // 春、夏
            ],
            [
                'name' => 'ブドウ',
                'price' => 1100,
                'description' => '国産「巨峰」を使用しています...',
                'seasons' => [2, 3], // 夏、秋
            ],
            [
                'name' => 'バナナ',
                'price' => 600,
                'description' => '低カロリーで栄養満点のバナナ...',
                'seasons' => [2], // 夏
            ],
            [
                'name' => 'メロン',
                'price' => 900,
                'description' => '香りがよくジューシーなメロンスムージー...',
                'seasons' => [1, 2], // 春、夏
            ],
        ];

        foreach ($products as $data) {
            $product = Product::create([
                'name' => $data['name'],
                'price' => $data['price'],
                'description' => $data['description'],
            ]);

            // 季節の関連付け
            $product->seasons()->attach($data['seasons']);
        }
    }
}
