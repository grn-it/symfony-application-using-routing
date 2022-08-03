<?php

namespace App\Controller\Catalog;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Requirement\Requirement;

#[Route('/products')]
class ProductController extends AbstractController
{
    /**
     * Return list of products
     */
    #[Route(
        '/',
        'products_list',
        methods: ['GET'],
        priority: 1
    )]
    public function list(): JsonResponse
    {
        // make request to Product repository
        // if products is empty return empty array
        // return HTTP 200 (OK)

        return $this->json([]);
    }

    /**
     * Search Product by all categories in Catalog
     */
    #[Route(
        '/',
        'products_search',
        methods: ['GET'],
        condition: 'request.query.get("search") !== ""'
    )]
    public function search(Request $request): JsonResponse
    {
        // make search request to Product repository
        // if products not found empty array will be return
        // return HTTP 200 (OK)
        
        return $this->json([]);
    }

    /**
     * Return single Product
     */
    #[Route(
        '/{uuid}',
        'products_item',
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
     */
    #[Route(
        '/',
        'products_add',
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
     */
    #[Route(
        '/{uuid}',
        'products_edit',
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
     */
    #[Route(
        '/{uuid}',
        'products_delete',
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
