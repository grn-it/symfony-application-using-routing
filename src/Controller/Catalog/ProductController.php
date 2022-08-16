<?php

namespace App\Controller\Catalog;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Requirement\Requirement;

#[Route('/products', 'products_')]
class ProductController extends AbstractController
{
    /**
     * Return list of products
     * 
     * Matches method and path: GET /catalog/products
     * 
     * Returns a list of filtered products by "jeans" category
     * Matches method and path: GET /catalog/products?categories[]=jeans
     * 
     * Returns a list of found products by word "nike" in the title, description or characteristic of the product
     * Matches method and path: GET /catalog/products?search=nike
     */
    #[Route(
        '',
        'list',
        methods: ['GET']
    )]
    public function list(Request $request): JsonResponse
    {
        // make get/filter/search request to Product repository
        // if products is empty return empty array
        // return HTTP 200 (OK)

        return $this->json([]);
    }

    /**
     * Return single Product
     * 
     * Matches method and path: GET /catalog/products/756ab18c-31a1-4981-b8d0-67eb8f195e80
     */
    #[Route(
        '/{uuid}',
        'item',
        requirements: ['uuid' => Requirement::UUID],
        methods: ['GET']
    )]
    public function item(string $uuid): JsonResponse
    {
        // make find request to Product repository
        // if Product not found return HTTP 404 (Not Found)
        // return HTTP 200 (OK)

        return $this->json([]);
    }

    /**
     * Add new Product
     * 
     * Matches method and path: POST /catalog/products
     */
    #[Route(
        '',
        'add',
        methods: ['POST'],
        condition: "service('app.routing.condition.checker').isRequestBodyNotEmpty(request)"
    )]
    public function add(Request $request): JsonResponse
    {
        // deserialize data from Request to Product object
        // validate Product object data (if validation fail return error message with status HTTP 400 (Bad Request))
        // persist to database
        // return HTTP 201 (Created)

        return $this->json([]);
    }

    /**
     * Edit Product
     * 
     * Matches method and path: PUT /catalog/products/3f3652c1-990a-4b5c-bb36-0222df2b09e1
     */
    #[Route(
        '/{uuid}',
        'edit',
        requirements: ['uuid' => Requirement::UUID],
        methods: ['PUT'],
        condition: "service('app.routing.condition.checker').isRequestBodyNotEmpty(request)"
    )]
    public function edit(string $uuid, Request $request): JsonResponse
    {
        // make find request to Product repository
        // if Product not found return HTTP 404 (Not Found)
        // deserialize data from Request and populate to exist Product object
        // validate Product object data (if validation fail return error message with status HTTP 400 (Bad Request))
        // persist edited Product object to database
        // return HTTP 200 (OK)

        return $this->json([]);
    }

    /**
     * Delete Product
     * 
     * Matches method and path: DELETE /catalog/products/a3494f19-5079-4841-854e-63416dd54de5
     */
    #[Route(
        '/{uuid}',
        'delete',
        requirements: ['uuid' => Requirement::UUID],
        methods: ['DELETE']
    )]
    public function delete(string $uuid): JsonResponse
    {
        // make find request to Product repository
        // if Product not found return HTTP 404 (Not Found)
        // delete Product from database
        // return HTTP 200 (OK)

        return $this->json([]);
    }
}
