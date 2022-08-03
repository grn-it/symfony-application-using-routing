<?php

namespace App\Controller\Catalog;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class CatalogController extends AbstractController
{
    /**
     * Return list of products by category
     */
    #[Route(
        '/{category}',
        'category_products_list',
        requirements: ['category' => '.+'],
        methods: ['GET']
    )]
    public function list(string $category): JsonResponse
    {
        // make find request to Product repository by category
        // if there are no products then empty array will be return
        // return HTTP 200 (OK)
        
        return $this->json([]);
    }
}
