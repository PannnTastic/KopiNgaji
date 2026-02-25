<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $subtotal = fake()->randomFloat(2, 50000, 1000000);
        $discount = fake()->randomFloat(2, 0, $subtotal * 0.2);
        $platformFee = fake()->randomFloat(2, 0, $subtotal * 0.1);
        $totalPrice = $subtotal - $discount;
        $netAmount = $subtotal - $discount - $platformFee;

        return [
            'buyer_id' => \App\Models\User::factory(),
            'umkm_id' => \App\Models\Umkm::factory(),
            'status' => fake()->randomElement(['PENDING', 'PAID', 'CANCELLED', 'COMPLETED']),
            'payment_method' => fake()->randomElement(['CASH', 'NON_CASH']),
            'total_price' => $totalPrice,
            'subtotal_amount' => $subtotal,
            'discount_amount' => $discount,
            'platform_fee_amount' => $platformFee,
            'net_amount' => $netAmount,
            'whatsapp' => fake()->phoneNumber(),
            'qr_code' => fake()->uuid(),
            'is_scanned' => fake()->boolean(),
        ];
    }
}
