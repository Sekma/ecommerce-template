<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        OrderItem::query()->delete();
        Order::query()->delete();

        $statuses = [
            'pending',
            'confirmed',
            'shipped',
            'delivered',
            'cancelled',
        ];

        $products = Product::all();

        if ($products->isEmpty()) {
            return;
        }

        foreach (Customer::all() as $customer) {

            for ($i = 1; $i <= 2; $i++) {

                $subtotal = 0;

                $order = Order::create([
                    'order_number' => 'CMD-' . now()->format('Y') . '-' . str_pad(rand(1, 99999), 5, '0', STR_PAD_LEFT),
                    'customer_id' => $customer->id,
                    'subtotal' => 0,
                    'shipping_cost' => 0,
                    'total' => 0,
                    'status' => $statuses[array_rand($statuses)],
                ]);

                $selectedProducts = $products->random(rand(1, 3));

                $shippingCost = $selectedProducts->contains(function ($product) {
                    return !$product->free_shipping;
                }) ? 8 : 0;

                foreach ($selectedProducts as $product) {

                    $qty = rand(1, 3);

                    $lineTotal = $product->price * $qty;

                    OrderItem::create([
                        'order_id' => $order->id,
                        'product_id' => $product->id,
                        'product_name' => $product->name,
                        'price' => $product->price,
                        'quantity' => $qty,
                        'total' => $lineTotal,
                    ]);

                    $subtotal += $lineTotal;
                }

                $order->update([
                    'shipping_cost' => $shippingCost,
                    'subtotal' => $subtotal,
                    'total' => $subtotal + $shippingCost,
                ]);
            }
        }
    }
}

