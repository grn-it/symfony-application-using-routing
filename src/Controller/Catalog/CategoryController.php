<?php

namespace App\Controller\Catalog;

use App\Repository\CategoryRepository;
use App\Service\Category\Persister\CategoryPersister;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Requirement\Requirement;

#[Route('/categories')]
class CategoryController extends AbstractController
{
    /**
     * Return list of categories
     */
    #[Route(
        '/',
        'categories_list',
        methods: ['GET'],
        priority: 1
    )]
    public function list(): JsonResponse
    {
        // make request to Category repository
        // if categories is empty return empty array
        // return HTTP 200 (OK)
        
        return $this->json([]);
    }

    /**
     * Return single Category
     */
    #[Route(
        '/{uuid}',
        'categories_item',
        requirements: ['uuid' => Requirement::UUID],
        methods: ['GET']
    )]
    public function item(string $uuid): JsonResponse
    {
        // make find request to Category repository
        // if category not found return HTTP 404 (Not Found)
        // return HTTP 200 (OK)
        
        return $this->json([]);
    }

    /**
     * Add new Category
     */
    #[Route(
        '/',
        'categories_add',
        methods: ['POST'],
        condition: "service('app.routing.condition.checker').isRequestBodyNotEmpty(request)"
    )]
    public function add(Request $request): JsonResponse
    {
        // deserialize data from Request to Category object
        // validate Category object data (if validation fail return error message with status HTTP 400 (Bad Request))
        // persist to database
        // return HTTP 201 (Created)
        
        return $this->json([]);
    }

    /**
     * Edit Category
     */
    #[Route(
        '/{uuid}',
        'categories_edit',
        requirements: ['uuid' => Requirement::UUID],
        methods: ['PUT'],
        condition: "service('app.routing.condition.checker').isRequestBodyNotEmpty(request)"
    )]
    public function edit(string $uuid, Request $request): JsonResponse
    {
        // make find request to Category repository
        // if category not found return HTTP 404 (Not Found)
        // deserialize data from Request and populate to exist Category object
        // validate Category object data (if validation fail return error message with status HTTP 400 (Bad Request))
        // persist edited Category object to database
        // return HTTP 200 (OK)
        
        return $this->json([]);
    }

    /**
     * Delete Category
     */
    #[Route(
        '/{uuid}',
        'categories_delete',
        requirements: ['uuid' => Requirement::UUID],
        methods: ['DELETE']
    )]
    public function delete(string $uuid): JsonResponse
    {
        // make find request to Category repository
        // if category not found return HTTP 404 (Not Found)
        // delete Category from database
        // return HTTP 200 (OK)
        
        return $this->json([]);
    }
}