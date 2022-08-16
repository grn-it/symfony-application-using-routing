<?php

namespace App\Controller\Catalog;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Requirement\Requirement;

#[Route('/reviews', 'reviews_')]
class ReviewController extends AbstractController
{
    /**
     * Return list of review
     * 
     * Matches method and path: GET /catalog/reviews
     * 
     * Returns a list of reviews for the product with UUID "cdedec98-d702-422d-9e34-dc624990331c"
     * Matches method and path: GET /catalog/reviews?product=cdedec98-d702-422d-9e34-dc624990331c
     */
    #[Route(
        '',
        'list',
        methods: ['GET']
    )]
    public function list(): JsonResponse
    {
        // make get/filter request to Review repository
        // if reviews is empty return empty array
        // return HTTP 200 (OK)

        return $this->json([]);
    }

    /**
     * Return single Review
     * 
     * Matches method and path: GET /catalog/reviews/71ca5f0a-7e45-44e5-85fe-252d25ffb45e
     */
    #[Route(
        '/{uuid}',
        'item',
        requirements: ['uuid' => Requirement::UUID],
        methods: ['GET']
    )]
    public function item(string $uuid): JsonResponse
    {
        // make find request to Review repository
        // if Review not found return HTTP 404 (Not Found)
        // return HTTP 200 (OK)

        return $this->json([]);
    }

    /**
     * Add new Review
     * 
     * Matches method and path: POST /catalog/reviews
     */
    #[Route(
        '',
        'add',
        methods: ['POST'],
        condition: "service('app.routing.condition.checker').isRequestBodyNotEmpty(request)"
    )]
    public function add(Request $request): JsonResponse
    {
        // deserialize data from Request to Review object
        // validate Review object data (if validation fail return error message with status HTTP 400 (Bad Request))
        // persist to database
        // return HTTP 201 (Created)

        return $this->json([]);
    }

    /**
     * Edit Review
     * 
     * Matches method and path: PUT /catalog/reviews/6300fae7-645f-4f1a-a558-fb68f7a00ec2
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
        // make find request to Review repository
        // if Review not found return HTTP 404 (Not Found)
        // deserialize data from Request and populate to exist Review object
        // validate Review object data (if validation fail return error message with status HTTP 400 (Bad Request))
        // persist edited Review object to database
        // return HTTP 200 (OK)

        return $this->json([]);
    }

    /**
     * Delete Review
     * 
     * Matches method and path: DELETE /catalog/reviews/ebd7b29c-d900-4f70-a5e1-0dc8e547bc0d
     */
    #[Route(
        '/{uuid}',
        'delete',
        requirements: ['uuid' => Requirement::UUID],
        methods: ['DELETE']
    )]
    public function delete(string $uuid): JsonResponse
    {
        // make find request to Review repository
        // if Review not found return HTTP 404 (Not Found)
        // delete Review from database
        // return HTTP 200 (OK)

        return $this->json([]);
    }
}
