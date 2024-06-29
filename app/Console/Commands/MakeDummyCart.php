<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Services\{Cart\CartInterface, Products\ProductInterface};
use Illuminate\Console\Command;

class MakeDummyCart extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cart:make-dummy';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    private $cartInterface;
    private $productInterface;

    public function __construct(CartInterface $cartInterface, ProductInterface $productInterface)
    {
        parent::__construct();

        $this->cartInterface = $cartInterface;
        $this->productInterface = $productInterface;
    }
    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Dummy cart created successfully.');
        $products = $this->productInterface->getRandomProducts();

        $user = User::first();

        foreach ($products as $key => $product) {
            $this->cartInterface->store($user->id, [
                'referance' => $product->id,
                'product_quantity' => rand(1, 10),
            ]);
        }

    }
}
